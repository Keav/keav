<?php
/**
*killboard.co.uk Killmail Parser
*
*@author Geoff Wilson
*@version 2.1
*
**/

include "functions.php";

$killArray = explode("\r\n",$_POST['textarea']);

$searchPosition = 0;

$foundDate = FALSE;
$invalidMail = FALSE;

while ($foundDate == FALSE)
{
	$lineToCheck = substr($killArray[$searchPosition],0,4);
	if (($lineToCheck == "2006") || ($lineToCheck == "2005") || ($lineToCheck == "2004"))
	{
		$dateOfKill = explode(" ",$killArray[$searchPosition]);
		$searchPosition++;
		$foundDate = TRUE;
	}
	if ($searchPosition > count($killArray))
	{
		$foundDate = TRUE;
		$invalidMail = TRUE;
	}
	$searchPosition++;
}

if (!$invalidMail)
{

$victim = explode(": ",$killArray[$searchPosition]);
$searchPosition++;

$alliance =	explode(": ",$killArray[$searchPosition]);
$searchPosition++;

$corp =	explode(": ",$killArray[$searchPosition]);
$searchPosition++;

$shipLost = explode(": ",$killArray[$searchPosition]);
$searchPosition++;

$system = explode(": ",$killArray[$searchPosition]);
$searchPosition++;

$security = explode(": ",$killArray[$searchPosition]);
$searchPosition++;

}

// Validate the killmail
if ((($victim[0] == "Victim") && ($alliance[0] == "Alliance") && ($corp[0] = "Corp") && ($shipLost[0] == "Destroyed") && ($system[0] == "System"))  ||
(($victim[0] == "Victim") && ($alliance[0] == "Alliance") && ($corp[0] = "Corporation") && ($shipLost[0] == "Destroyed Type") && ($system[0] == "Solar System")))
{
	$dupeMail = 0;
	
	// lets get a temp player ID
	$sql = "SELECT * FROM `Player` WHERE (PlayerName = '$victim[1]')";
	$result = mysql_query($sql);
	if (mysql_num_rows ($result) > 0)
	{
		// Check the killmail hasn't been added before
		$playerDetails = mysql_fetch_array($result);
		
		// get a temp ShipID
		$sql = "SELECT * FROM `Ship` WHERE (ShipName = '$shipLost[1]')";
		$result = mysql_query($sql);
		$tmpShipID = mysql_fetch_array($result);
			
		$sql = "SELECT * FROM `Kill` WHERE (PlayerID = '$playerDetails[0]') AND (ShipID = '$tmpShipID[0]') AND (KillTime = '$dateOfKill[1]') AND (KillDate = '$dateOfKill[0]')";
		$result = mysql_query($sql);
		if (mysql_num_rows ($result) > 0)
		{
			$dupeMail = 1;
		}	
	}
	
	if ($dupeMail == 0)
	{
		// Parse the Involved Partys and return the array of them, this is complex
		include "involved.php";
		
		if ($validKillMail == 1)
		{
			// Lets Validate the Victim
			
			$victimID = getPlayerID($victim[1], $corp[1]);
			
			$victimCorpID = getCorpID($corp[1]);
			
			updateCorp ($victimID, $victimCorpID);
					
			$victimSystemID = getSystemID($system[1],$security[1]);
			
			$victimShipID = getShipID($shipLost[1]);
						
			$parsedMail = $_POST['textarea'];
			
			// Create the SQL statement for the kill
			$sql = "INSERT INTO `Kill` (`KillID`, `PlayerID`, `CorpID`, `ShipID`, `SystemID`, `KillTime`, `KillDate`, `UserID`, `parsedMail`) VALUES ('', '$victimID', '$victimCorpID', '$victimShipID', '$victimSystemID', '$dateOfKill[1]', '$dateOfKill[0]', '$activeUserID', '$parsedMail')";
			$result = mysql_query($sql);
			
			// Lets Increase the victims Loss Total
			$sql = "SELECT * FROM `Ship` WHERE (`ShipID` = '$victimShipID')";
			$result = mysql_query($sql);
			$lossPoints = mysql_fetch_array($result);
			
			// Add Loss Points for the player
			$sql = "UPDATE `Player` SET `LossPoints` = `LossPoints` + '$lossPoints[3]', `NetPoints` = `NetPoints` - '$lossPoints[3]' WHERE (`PlayerID` = '$victimID')";
			$result = mysql_query($sql);
			
			// Add Loss Points for the corp
			$sql = "UPDATE `Corp` SET `LossPoints` = `LossPoints` + '$lossPoints[3]', `NetPoints` = `NetPoints` - '$lossPoints[3]' WHERE (`CorpID` = '$victimCorpID')";
			$result = mysql_query($sql);		
			
			// Lets check it was added correctly
			if ($result == 1)
			{
				//all is good so far, lets get the KillID and add the involved parties
				$sql = "SELECT * FROM `Kill` WHERE `UserID` = '$activeUserID' ORDER BY `KillID` DESC";
				$result = mysql_query($sql);
				$lastKillID = mysql_fetch_row($result);
														
				for ($x = 0; $x <= (count($involvedData)-1);$x++)
				{
					$tmpPlayerID = $involvedData[$x]['PlayerID'];
					$tmpCorpID = $involvedData[$x]['CorpID'];
					$tmpFinalBlow = $involvedData[$x]['FinalBlow'];
					$tmpShipID = $involvedData[$x]['ShipID'];
					$tmpItemID = $involvedData[$x]['ItemID'];
					$sql = "INSERT INTO `Involved` (`InvolvedID`, `KillID`, `PlayerID`, `CorpID`, `ShipID`, `ItemID`, `FinalBlow`, `InvolvedDate`, `InvolvedTime`) VALUES ('', '$lastKillID[0]', '$tmpPlayerID', '$tmpCorpID', '$tmpShipID', '$tmpItemID', '$tmpFinalBlow', '$dateOfKill[0]', '$dateOfKill[1]')";
					$result = mysql_query($sql);
					
					// Add Some Kill Points
					$sql = "UPDATE `Player` SET `KillPoints` = `KillPoints` + '$lossPoints[3]', `NetPoints` = `NetPoints` + '$lossPoints[3]' WHERE (`PlayerID` = '$tmpPlayerID')";
					$result = mysql_query($sql);
					
					$involvedCorps[$x] = $involvedData[$x]['CorpID'];
			
				}
				
				$involvedCorps = array_unique($involvedCorps);
								
				for ($y = 0; $y < count($involvedCorps); $y++)
				{
					// Lets add corp killpoints
					$sql = "UPDATE `Corp` SET `KillPoints` = `KillPoints` + '$lossPoints[3]', `NetPoints` = `NetPoints` + '$lossPoints[3]' WHERE (`CorpID` = '$involvedCorps[$y]')";
					$result = mysql_query($sql);
				}	
			
				// Lets add Destoryed Items
				
				for ($i = 0; $i < count($itemData); $i++)
				{
					$newItemID = $itemData[$i]['ItemID'];
					$newItemFitted = $itemData[$i]['Fitted'];
					$newItemQuant = $itemData[$i]['Quantity'];
					$sql = "INSERT INTO `Destroyed` (`destroyedID`, `killID`, `itemID`, `fitted`, `quantity`) VALUES ('', '$lastKillID[0]', '$newItemID', '$newItemFitted', '$newItemQuant')";
					$result = mysql_query($sql);
				}
				
				echo ("<p>Your Killmail has been added!</p>");
	
			}
			else
			{
				// All is not good
				printf ("<p>Error Adding Killmail</p>");			
			}
		}
		else
		{
			echo ("<p>No Valid Invovled Parties</p>");
		}
	} 
	else 
	{
		// this killmail is allready here
		printf ("<p>This Kill Already Exisits</p>");
	}
} 
else
{
	printf("<p>Killmail format is not valid</p>");
}

?>