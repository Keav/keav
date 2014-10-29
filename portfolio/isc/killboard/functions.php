<?php
/**
*killboard.co.uk common functions for killmail parser
*
*@author Geoff Wilson
**/

/*
GetPlayerID returns a player ID for the player name passed into it, either an existing 
player or a new one is created
*/
function getPlayerID ($playerName) 
{
	// remove whitespace
	$playerName = rtrim($playerName);

	// Have we met this guy before?
	$sql = "SELECT * FROM Player WHERE (PlayerName = '$playerName')";
	$result = mysql_query($sql);
	if (mysql_num_rows ($result) < 1)
	{
		// Lets add the player to the database
		$sql = "INSERT INTO `Player` (`PlayerID`, `PlayerName`) VALUES ('', '$playerName')";
		$result = mysql_query($sql);
	}

	// Get player details
	$sql = "SELECT * FROM Player WHERE (PlayerName = '$playerName')";
	$result = mysql_query($sql);
	$playerDetails = mysql_fetch_row($result);
	return $playerDetails[0];
}

/*
GetCorpID returns a corp ID for the corporation name passed into it, either an existing corp ID or a 
new one is created
*/
function getCorpID ($corpName) 
{
	// Remove whitespace
	$corpName = rtrim($corpName);

	$sql = "SELECT * FROM `Corp` WHERE (CorpName = '$corpName')";
	$result = mysql_query($sql);

	if (mysql_num_rows($result) < 1)
	{
		//No record for this corp
		//Lets add the corp to the database
		$sql = "INSERT INTO `Corp` (`CorpID`, `CorpName`) VALUES ('', '$corpName')";
		$result = mysql_query($sql);
	}

	// Get player details
	$sql = "SELECT * FROM `Corp` WHERE (CorpName = '$corpName')";
	$result = mysql_query($sql);
	$corpDetails = mysql_fetch_row($result);
	return $corpDetails[0];
}

/*
Changes the players corp to their most recently submitted corp.
*/
function updateCorp ($playerID, $corpID)
{
	$sql = "UPDATE `Player` SET `CorpID` = '$corpID' WHERE (`PlayerID` = '$playerID')";
	$result = mysql_query($sql);
}

/*
Gets the ID of the requested ship, these are pre-defined so no need to check it exists, we just assume it 
to be true.
*/
function getShipID ($shipName)
{
	$shipName = rtrim($shipName);
	$sql = "SELECT * FROM `Ship` WHERE (ShipName = '$shipName')";
	$result = mysql_query($sql);
	$shipDetails = mysql_fetch_row($result);
	return $shipDetails[0];
}

function getItemID ($itemName) 
{
	$itemName = rtrim($itemName);
	$sql = "SELECT * FROM `Item` WHERE (ItemName = '$itemName')";
	$result = mysql_query($sql);

	if (mysql_num_rows($result) < 1)
	{
		$sql = "INSERT INTO `Item` (`ItemID`, `ItemName`) VALUES ('', '$itemName')";
		$result = mysql_query($sql);
	}

	$sql = "SELECT * FROM `Item` WHERE (ItemName = '$itemName')";
	$result = mysql_query($sql);
	$itemDetails = mysql_fetch_row($result);
	return $itemDetails[0];
}

function getSystemID ($systemName, $systemSecurity)
{
	$systemName = rtrim($systemName);
	$systemSecurity = rtrim($systemSecurity);
	
	// Get SystemID
	$sql = "SELECT * FROM System WHERE (SystemName = '$systemName')";
	$result = mysql_query($sql);

	if (mysql_num_rows($result) < 1) 
	{ 
		// System was not found, lets create it
		$sql = "INSERT INTO `System` (`SystemID`, `SystemName`, `SecStatus`) VALUES ('', '$systemName', '$systemSecurity')";
		$result = mysql_query($sql);
		// Lets pull our new SystemID
		$sql = "SELECT * FROM `System` WHERE (SystemName = '$systemName')";
		$result = mysql_query($sql);
	}
		
	// $SystemDetails[0] now holds our system id number
	$systemDetails = mysql_fetch_row($result);
	return $systemDetails[0];
}

?>