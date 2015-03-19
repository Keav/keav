<?php
/*
killboard.co.uk Killmail Involved Parties Parser

@author Geoff Wilson

In _ALL_ cases $KillArray[11] is the first involved party

    Name: Romano Solaris (laid the final blow)
    Security Status: -1.7
    Alliance: Unknown
    Corporation: The Mighty Kites
    Ship Type: Megathron
    Weapon Type: Neutron Blaster Cannon II

$InvolvedData[$i]['PlayerID']
$InvolvedData[$i]['CorpID']
$InvolvedData[$i]['ShipID']
$InvolvedData[$i]['ItemID']
$InvolvedData[$i]['FinalBlow']
*/

$masterCounter = $searchPosition;
$involvedCounter = 0;
$itemCounter = 0;

$foundInvolved = FALSE;
while ($foundInvolved == FALSE)
{
	if ($killArray[$masterCounter] == "Involved parties:")
	{
		$foundInvolved = TRUE;
		$masterCounter++;
	}
	$masterCounter++;
}

// Location of first involved party
$involvedSearchCounter = $masterCounter;
$itemSearchCounter = $invovledSearchCounter;

$foundItems = FALSE;
$noItems = FALSE;

while ($foundItems == FALSE)
{
	if ($killArray[$itemSearchCounter] == "Destroyed items:")
	{
		$foundItems = TRUE;
		$itemSearchCounter++;
	}
	if ($itemSearchCounter > count($killArray))
	{
		$noItems = TRUE;
		$foundItems = TRUE;
	}
	$itemSearchCounter++;
}

// Check each line of the array
for ($involvedSearchCounter; $involvedSearchCounter < $itemSearchCounter;)
{
	$killerName = explode(": ",$killArray[$involvedSearchCounter]);
	// we have an involved party
	if (ltrim($killerName[0]) == "Name")
	{
		// verify the involved party is not an NPC or POS
		if (ltrim($killArray[$involvedSearchCounter+1]) != "")
		{
			// was this the person who laid the final blow
			$killerName = explode(" (",$killerName[1]);
			if ($killerName[1] != "")
			{
				$involvedData[$involvedCounter]['FinalBlow'] = TRUE;
			}
			else
			{
				$involvedData[$involvedCounter]['FinalBlow'] = FALSE;
			}
			$involvedCorpID = explode(": ",$killArray[$involvedSearchCounter+3]);
			
			// Call the PlayerFunction to get the ID
			$involvedPlayerID = getPlayerID($killerName[0],$involvedCorpID[1],0);

			// Add New Invovled Party
			$involvedData[$involvedCounter]['PlayerID'] = $involvedPlayerID;

			// Get CorpID
			$involvedCorpID = getCorpID($involvedCorpID[1]);
			$involvedData[$involvedCounter]['CorpID'] = $involvedCorpID;
			
			// update players corp if it has changed
			updateCorp ($involvedPlayerID, $involvedCorpID);
					
			// Get ShipID
			$involvedShipID = explode(": ",$killArray[$involvedSearchCounter+4]);
			$involvedShipID = getShipID($involvedShipID[1]);
			$involvedData[$involvedCounter]['ShipID'] = $involvedShipID;
	
			// Get ItemID
			$involvedItemID = explode(": ",$killArray[$involvedSearchCounter+5]);
			$involvedItemID = getItemID($involvedItemID[1]);
			$involvedData[$involvedCounter]['ItemID'] = $involvedItemID;
			
			// increase the counter for the number of involved parties
			$involvedCounter++;
			// skip forward 7 lines in the killmail for next reading
			$involvedSearchCounter = $involvedSearchCounter + 7;
		}
		else
		{
			// skip forward a single line in the killmail for next reading
			$involvedSearchCounter++;
		}
	}
	else
	{
		// skip forward a single line in the killmail for next reading
		$involvedSearchCounter++;
	}
}

// get destroyed items RMR only!!!
if (($corp[0] == "Corp") && ($noItems == FALSE))
{
	for ($itemSearchCounter; $itemSearchCounter < count($killArray);)
	{
		if (ltrim($killArray[$itemSearchCounter] != ""))
		{
			$itemName = explode(" (",$killArray[$itemSearchCounter]);

			if ($itemName[1] == "Cargo)")	
			{
				$itemData[$itemCounter]['Fitted'] = 0;
			}
			else
			{
				$itemData[$itemCounter]['Fitted'] = 1;
			}
			
			// get Quantity
			$itemQuant =  explode (", Qty:", $itemName[0]);
			if (rtrim($itemQuant[1]) != "")
			{
				$itemData[$itemCounter]['Quantity'] = $itemQuant[1];
			}
			else
			{
				$itemData[$itemCounter]['Quantity'] = 1;
			}

			$itemID = getItemID($itemQuant[0]);
			$itemData[$itemCounter]['ItemID'] = $itemID;

			$itemCounter++;
		}
		$itemSearchCounter++;
	}
}

// make sure we have at least one involved party, otherwise
// the killmail is not valid
if ($involvedCounter > 0)
{
	$validKillMail = 1;
}

?>