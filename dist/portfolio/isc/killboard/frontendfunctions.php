<?php
/*
*killboard.co.uk Common functions for frontend.php
*
*@author Geoff Wilson
*/

function createKillTable($nextKill, $playerID, $corpID, $shipID, $mode, $numberToShow)
{

if ($mode == "loss") 
{
	if ($playerID != "")
	{
		$sql = "SELECT * FROM `Kill` WHERE (PlayerID = '$playerID') ORDER BY `KillDate` DESC, `KillTime` DESC LIMIT ". $nextKill . "," .$numberToShow;
	} 
	elseif ($corpID != "")
	{
		$sql = "SELECT * FROM `Kill` WHERE (CorpID = '$corpID') ORDER BY `KillDate` DESC, `KillTime` DESC LIMIT ". $nextKill . "," . $numberToShow;	
	}
	elseif ($shipID != "") 
	{
		$sql = "SELECT * FROM `Kill` WHERE (ShipID = '$shipID') ORDER BY `KillDate` DESC, `KillTime` DESC LIMIT ". $nextKill . "," . $numberToShow;			 
	} 
	else 
	{
		$sql = "SELECT * FROM `Kill` ORDER BY `KillDate` DESC, `KillTime` DESC LIMIT " . $nextKill . "," . $numberToShow;
	}
} 
else 
{
	if ($playerID != "") 
	{
		$sql = "SELECT * FROM `Involved` WHERE (PlayerID = '$playerID') ORDER BY `InvolvedDate` DESC, `InvolvedTime` DESC LIMIT " . $nextKill . "," . $numberToShow;
	} 
	else 
	{
		$sql = "SELECT * FROM `Involved` WHERE (CorpID = '$corpID') GROUP BY `KillID` ORDER BY `InvolvedDate` DESC, `InvolvedTime` DESC LIMIT " . $nextKill . "," . $numberToShow;
	}
}



print("<tr><td colspan=\"2\" style=\"width:100%\">");
$lastDateUsed = NULL;

$result = mysql_query($sql);

while ($kill = mysql_fetch_array($result)) 
{
	if ($mode == "kill") 
	{
		$sql = "SELECT * FROM `Kill` WHERE (KillID = $kill[1])";
		$result2 = mysql_query($sql);
		$kill2 = mysql_fetch_row($result2);
	}
	
	if ($mode == "kill") 
	{
		$sql = "SELECT * FROM `Player` WHERE (PlayerID = '$kill2[1]')";
	} 
	else
	{
		$sql = "SELECT * FROM `Player` WHERE (PlayerID = '$kill[1]')";
	}
	
	$result2 = mysql_query($sql);
	$lastKilled = mysql_fetch_row($result2);

	if ($mode == "kill")
	{
		$sql = "SELECT * FROM `Corp` WHERE (CorpID = '$kill2[2]')";
	}
	else
	{
		$sql = "SELECT * FROM `Corp` WHERE (CorpID = '$kill[2]')";
	}
	
	$result2 = mysql_query($sql);
	$lastKilledCorp = mysql_fetch_row($result2);
	
	if ($mode == "kill")
	{	
		$sql = "SELECT * FROM `System` WHERE (SystemID = '$kill2[4]')";
	}
	else
	{
		$sql = "SELECT * FROM `System` WHERE (SystemID = '$kill[4]')";
	}
	
	$result2 = mysql_query($sql);
	$lastKilledSystem = mysql_fetch_row($result2);
	
	if ($mode == "kill")
	{	
		$sql = "SELECT * FROM `Ship` WHERE (ShipID = '$kill2[3]')";
	}
	else
	{
		$sql = "SELECT * FROM `Ship` WHERE (ShipID = '$kill[3]')";
	}
	
	$result2 = mysql_query($sql);
	$lastKilledShip = mysql_fetch_row($result2);
	
	$sql = "SELECT * FROM `ShipClass` WHERE (ClassID = '$lastKilledShip[2]')";
	$result2 = mysql_query($sql);
	$lastKilledShipClass = mysql_fetch_row($result2);
	
	if (($lastKilledShipClass[0] == 1) || ($lastKilledShipClass[0] == 20))
	{
		$imageBorderColor = "FFCC00";
	}
	else
	{
		$imageBorderColor = "808080";
	}
	
	if ($mode == "kill") 
	{	
		$sql = "SELECT * FROM `Involved` WHERE (KillID = '$kill2[0]') AND (FinalBlow = '1')";
	}
	else 
	{
		$sql = "SELECT * FROM `Involved` WHERE (KillID = '$kill[0]') AND (FinalBlow = '1')";
	}
	
	$result2 = mysql_query($sql);
	$finalBlowID = mysql_fetch_row($result2);
	
	// fix for NPC final blow on loss mails
	if (mysql_num_rows($result2) > 0)
	{
		$sql = "SELECT * FROM `Player` WHERE (PlayerID = $finalBlowID[2])";
		$result2 = mysql_query($sql);
		$finalBlowName = mysql_fetch_row($result2);	
	
		$sql = "SELECT * FROM `Corp` WHERE (CorpID = $finalBlowID[3])";
		$result2 = mysql_query($sql);
		$finalBlowCorp = mysql_fetch_row($result2);
	}
	// end fix	

	$filename = "images/" . $lastKilledShip[0] . ".png";
	
	if (file_exists($filename))
	{
		$imageID = $lastKilledShip[0];
	}
	else
	{
		$imageID = "999";
	}
	
	if (strlen($lastKilledCorp[1]) > 25)
	{
		$tmpCorpName = substr($lastKilledCorp[1],0,25);
		$corpName = $tmpCorpName . "...";
	} 
	else 
	{
		$corpName = $lastKilledCorp[1];
	}

	// new Date Showing Code
	if ($mode == "kill")
	{
		$timeStamp = strtotime($kill2[6]);
	}
	else
	{
		$timeStamp = strtotime($kill[6]);
	}
	
	if (date("F jS \, Y",$lastDateUsed) != date("F jS \, Y",$timeStamp))
	{
		$formattedDate = date("l\, F jS Y",$timeStamp);
		if ($lastDateUsed != NULL)
		{	
			echo("</table>");
		}
		echo("<div style=\"padding:3px; margin-bottom:5px; margin-top:5px; text-align:left;\"><b>$formattedDate</b></div>
		<table class=\"tableborder\" style=\"width:100%\">
			<tr class=\"title-bar\">
				<td style=\"width:32px;\"></td>
				<td style=\"width:165px;\">Ship Type</td>
				<td style=\"width:165px;\">Victim</td>
				<td style=\"width:165px;\">Final Blow</td>
				<td style=\"text-align:center;\">System</td>
			</tr>");
		$lastDateUsed = $timeStamp;
	}
	
	if ($mode == "kill")
	{

	printf("
		<tr style=\"background-color:#000000;\" onmouseover=\"this.style.backgroundColor='#3366CC';\" onmouseout=\"this.style.backgroundColor='#000000';\" onclick=\"location.href='?mode=mail&amp;mail=%s&amp;num=0';\"?>
			<td style=\"text-align:center; vertical-align:middle; background:#000000;\">
				<a href=\"?mode=mail&amp;mail=%s&amp;num=0\">
					<img alt=\"Ship Image\" style=\"border:0; width:32px; height:32px; border:1px solid #%s;\" src=\"images/%s.png\"/>
				</a>
			</td>
			<td>
				<a href=\"?mode=ship&amp;id=%s&amp;kn=0\">%s</a><br />
				<em><a href=\"?mode=class&amp;id=%s&amp;kn=0\">%s</a></em>
			</td>
			<td>
				<a href=\"?mode=player&amp;id=%s&amp;view=2&amp;kn=0\">%s</a><br/>
				<a href=\"?mode=corp&amp;id=%s&amp;view=2&amp;kn=0\"><em>%s</em></a>
			</td>
			<td>
				<a href=\"?mode=player&amp;id=%s&amp;view=1&amp;kn=0\">%s</a><br/>
				<a href=\"?mode=corp&amp;id=%s&amp;view=1&amp;kn=0\"><em>%s</em></a>
			</td>
			<td style=\"text-align:center;\">
				%s<br/>
				<em>(%s)</em>
			</td>
		</tr>"
	,$kill2[0], $kill2[0],$imageBorderColor, $imageID, $lastKilledShip[0], $lastKilledShip[1], $lastKilledShipClass[0], $lastKilledShipClass[1], $lastKilled[0],
	$lastKilled[1], $lastKilledCorp[0], $corpName, $finalBlowName[0], $finalBlowName[1], $finalBlowCorp[0], $finalBlowCorp[1], $lastKilledSystem[1],$lastKilledSystem[2]);
			
	} 
	else 
	{

	printf("
		<tr style=\"background-color:#000000;\" onmouseover=\"this.style.backgroundColor='#3366CC';\" onmouseout=\"this.style.backgroundColor='#000000';\"  onclick=\"location.href='?mode=mail&amp;mail=%s&amp;num=0';\">
			<td style=\"text-align:center; vertical-align:middle; background:#000000;\">
				<a href=\"?mode=mail&amp;mail=%s&amp;num=0\">
					<img alt=\"Ship Image\" style=\"border:0; width:32px; height:32px; border:1px solid #%s;\" src=\"images/%s.png\"/>
				</a>
			</td>
			<td>
				<a href=\"?mode=ship&amp;id=%s&amp;kn=0\">%s</a><br />
				<em><a href=\"?mode=class&amp;id=%s&amp;kn=0\">%s</a></em>
			</td>
			<td>
				<a href=\"?mode=player&amp;id=%s&amp;view=2&amp;kn=0\">%s</a><br/>
				<a href=\"?mode=corp&amp;id=%s&amp;view=2&amp;kn=0\"><em>%s</em></a>
			</td>
			<td>
				<a href=\"?mode=player&amp;id=%s&amp;view=1&amp;kn=0\">%s</a><br/>
				<a href=\"?mode=corp&amp;id=%s&amp;view=1&amp;kn=0\"><em>%s</em></a>
			</td>
			<td style=\"text-align:center;\">
				%s<br/>
				<em>(%s)</em>
			</td>
		</tr>"
	,$kill[0], $kill[0],$imageBorderColor, $imageID, $lastKilledShip[0], $lastKilledShip[1], $lastKilledShipClass[0], $lastKilledShipClass[1], $lastKilled[0],
	$lastKilled[1], $lastKilledCorp[0], $corpName, $finalBlowName[0], $finalBlowName[1], $finalBlowCorp[0], $finalBlowCorp[1], $lastKilledSystem[1],$lastKilledSystem[2]);
	
	}
}

if ($lastDateUsed != NULL)
{
	echo ("</table>");
}

print("</td></tr>");

if ($playerID != NULL) 
{

	if ($mode == "loss")
	{
		$sql = "SELECT * FROM `Kill` WHERE (PlayerID = '$playerID') ORDER BY `KillDate` DESC, `KillTime` DESC";
	}
	else
	{
		$sql = "SELECT * FROM `Involved` WHERE (PlayerID = '$playerID')";
	}
	
	$result = mysql_query($sql);
	$total = mysql_num_rows($result);
	$notShown = $total  - $nextKill;

	if ($notShown > $numberToShow)
	{
		$moreToShow = TRUE;
	}
	
	printf("<tr>");
	
	if ($mode == "loss")
	{
		printf("<td style=\"width:50%%;\">");
		if ($nextKill > 0)
		{
			printf("<a href=\"?mode=player&amp;id=%s&amp;kn=%s&amp;view=2\">Previous 10 losses</a>",$playerID,($nextKill - $numberToShow));
		}
		printf("</td><td style=\"text-align:right; width:50%%;\">");
		if ($moreToShow == TRUE)
		{
			printf("<a href=\"?mode=player&amp;id=%s&amp;kn=%s&amp;view=2\">Next 10 losses</a>",$playerID,($nextKill + $numberToShow));
		}
		printf("</td>");	
	}
	else
	{
		printf("<td style=\"width:50%%;\">");
		if ($nextKill > 0)
		{
			printf("<a href=\"?mode=player&amp;id=%s&amp;kn=%s&amp;view=1\">Previous 10 kills</a>",$playerID,($nextKill - $numberToShow));
		}
		printf("</td><td style=\"text-align:right; width:50%%;\">");
		if ($moreToShow == TRUE)
		{
			printf("<a href=\"?mode=player&amp;id=%s&amp;kn=%s&amp;view=1\">Next 10 kills</a>",$playerID,($nextKill + $numberToShow));
		}
		printf("</td>");
	}
	
	printf("</tr>");

}

if ($corpID != NULL)
{

	if ($mode == "loss")
	{
		$sql = "SELECT * FROM `Kill` WHERE (CorpID = '$corpID') ORDER BY `KillDate` DESC, `KillTime` DESC";
	}
	else
	{
		$sql = "SELECT * FROM `Involved` WHERE (CorpID = '$corpID') GROUP BY `KillID`";
	}
	
	$result = mysql_query($sql);
	$total = mysql_num_rows($result);
	$notShown = $total  - $nextKill;
	
	if ($notShown > $numberToShow)
	{
		$moreToShow = TRUE;
	}
	
	printf("<tr>");
	
	if ($mode == "loss")
	{
		printf("<td style=\"width:50%%;\">");
		if ($nextKill > 0) 
		{
			printf("<a href=\"?mode=corp&amp;id=%s&amp;kn=%s&amp;view=2\">Previous 10 losses</a>",$corpID,($nextKill - $numberToShow));
		}
		printf("</td><td style=\"text-align:right; width:50%%;\">");
		if ($moreToShow == TRUE) 
		{
			printf("<a href=\"?mode=corp&amp;id=%s&amp;kn=%s&amp;view=2\">Next 10 losses</a>",$corpID,($nextKill + $numberToShow));
		}
		printf("</td>");
	}
	else 
	{
		printf("<td style=\"width:50%%;\">");
		if ($nextKill > 0) 
		{
			printf("<a href=\"?mode=corp&amp;id=%s&amp;kn=%s&amp;view=1\">Previous 10 kills</a>",$corpID,($nextKill - $numberToShow));
		}
		printf("</td><td style=\"text-align:right; width:50%%;\">");
		if ($moreToShow == TRUE) 
		{
			printf("<a href=\"?mode=corp&amp;id=%s&amp;kn=%s&amp;view=1\">Next 10 kills</a>",$corpID,($nextKill + $numberToShow));
		}
		printf("</td>");
		
	}
	
	printf("</tr>");

}

if ($shipID != NULL)
{

	if ($mode == "loss")
	{
		$sql = "SELECT * FROM `Kill` WHERE (ShipID = '$shipID') ORDER BY `KillDate` DESC, `KillTime` DESC";
	}
	else
	{
		$sql = "SELECT * FROM `Involved` WHERE (ShipID = '$shipID') AND (FinalBlow = '1')";
	}
	
	$result = mysql_query($sql);
	$total = mysql_num_rows($result);
	$notShown = $total  - $nextKill;
	
	if ($notShown > $numberToShow)
	{
		$moreToShow = TRUE;
	}
	
	printf("<tr>");
	
	if ($mode == "loss")
	{
		printf("<td style=\"width:50%%;\">");
		if ($nextKill > 0) 
		{
			printf("<a href=\"?mode=ship&amp;id=%s&amp;kn=%s\">Previous %s losses</a>",$shipID,($nextKill - $numberToShow), $numberToShow);
		}
		printf("</td><td style=\"text-align:right; width:50%%;\">");
		if ($moreToShow == TRUE) 
		{
			printf("<a href=\"?mode=ship&amp;id=%s&amp;kn=%s\">Next %s losses</a>",$shipID,($nextKill + $numberToShow), $numberToShow);
		}
		printf("</td>");
		
	} 
	else 
	{
		printf("<td style=\"width:50%%;\">");
		if ($nextKill > 0) 
		{
			printf("<a href=\"?mode=ship&amp;id=%s&amp;kn=%s\">Previous %s kills</a>",$shipID,($nextKill - $numberToShow),$numberToShow);
		}
		printf("</td><td style=\"text-align:right; width:50%%;\">");
		if ($moreToShow == TRUE) 
		{
			printf("<a href=\"?mode=ship&amp;id=%s&amp;kn=%s\">Next %s kills</a>",$shipID,($nextKill + $numberToShow), $numberToShow);
		}
		printf("</td>");
	}
	
	printf("</tr>");
}

if ($mode == "kill")
{
	if (mysql_num_rows($result) < 1)
	{
		echo ("<tr><td colspan=\"2\" align=\"center\">No Kills</td></tr>");
	}	
}
else 
{
	if (mysql_num_rows($result) < 1)
	{
		echo ("<tr><td colspan=\"2\" align=\"center\">No Losses</td></tr>");
	}
}
}

function ShowPlayerStats($PlayerID)
{

// Lets Find Kills

$sql = "SELECT * FROM `Player` WHERE (`PlayerID` = '$PlayerID')";
$result = mysql_query($sql);
$PlayersPoints = mysql_fetch_array($result);

if ($PlayersPoints[4] >= 0) {
	$tdClass = "green";
} else {
	$tdClass = "red";
}

$sql = "SELECT * FROM `Involved` WHERE (PlayerID = '$PlayerID')";
$result = mysql_query($sql);
$TotalKills = mysql_num_rows($result);

$TotalPodKills = 0;
while ($row = mysql_fetch_array($result))
{
	$sql = "SELECT * FROM `Kill` WHERE (KillID = '$row[1]') AND (ShipID = '127')";
	$result2 = mysql_query($sql);
	if (mysql_num_rows($result2) > 0) {
		$TotalPodKills++;
	}
}

$sql = "SELECT * FROM `Involved` WHERE (PlayerID = '$PlayerID') AND (FinalBlow = '1')";
$result = mysql_query($sql);
$TotalFB = mysql_num_rows($result);

// Lets Find Losses

$sql = "SELECT * FROM `Kill` WHERE (PlayerID = '$PlayerID')";
$result = mysql_query($sql);
$TotalLosses = mysql_num_rows($result);

$sql = "SELECT * FROM `Kill` WHERE (PlayerID = '$PlayerID') AND (ShipID = '127')";
$result = mysql_query($sql);
$TotalPodLosses = mysql_num_rows($result);

$filename = "people/" . $PlayerID . ".png";
	
if (file_exists($filename)) {
	$ImageID = $PlayerID;
} else {
	$ImageID = "999";
}

printf ("
<table style=\"width:100%%\" cellspacing=\"2\">
<tr><td style=\"text-align:center;\" rowspan=\"4\"><img alt=\"portrait\" src=\"people/%s.png\"/></td></tr>
<tr><td>Kill Points:</td><td class=\"green\">%s</td><td>Loss Points:</td><td class=\"red\">%s</td><td>Net Points</td><td class=\"%s\">%s</td></tr>
<tr><td>Total Kills:</td><td>%s</td><td>Ship Kills:</td><td>%s</td><td>Pod Kills:</td><td>%s</td></tr>
<tr><td>Total Losses:</td><td>%s</td><td>Ship Losses:</td><td>%s</td><td>Pod Losses:</td><td>%s</td></tr></table>",
$ImageID,$PlayersPoints[2],$PlayersPoints[3],$tdClass,$PlayersPoints[4],$TotalKills, ($TotalKills - $TotalPodKills),$TotalPodKills,$TotalLosses,($TotalLosses - $TotalPodLosses),$TotalPodLosses);

}

function ShowCorpStats($CorpID)
{

$sql = "SELECT * FROM `Corp` WHERE (`CorpID` = '$CorpID')";
$result = mysql_query($sql);
$CorpsPoints = mysql_fetch_array($result);

if ($CorpsPoints[6] >= 0) {
	$tdClass = "green";
} else {
	$tdClass = "red";
}

// Lets Find Kills

$sql = "SELECT * FROM `Involved` WHERE (CorpID = '$CorpID') GROUP BY `KillID`";
$result = mysql_query($sql);
$TotalKills = mysql_num_rows($result);

$TotalPodKills = 0;
while ($row = mysql_fetch_array($result))
{
	$sql = "SELECT * FROM `Kill` WHERE (KillID = '$row[1]') AND (ShipID = '127')";
	$result2 = mysql_query($sql);
	if (mysql_num_rows($result2) > 0) {
		$TotalPodKills++;
	}
}

// Lets Find Losses

$sql = "SELECT * FROM `Kill` WHERE (CorpID = '$CorpID')";
$result = mysql_query($sql);
$TotalLosses = mysql_num_rows($result);

$sql = "SELECT * FROM `Kill` WHERE (CorpID = '$CorpID') AND (ShipID = '127')";
$result = mysql_query($sql);
$TotalPodLosses = mysql_num_rows($result);

$filename = "corp/" . $CorpID . ".png";
	
if (file_exists($filename)) {
	$ImageID = $CorpID;
} else {
	$ImageID = "999";
}

printf ("
<table style=\"width:100%%;\" cellspacing=\"2\">
<tr>
	<td style=\"text-align:center;\" rowspan=\"4\">
		<img class=\"tableborder\" alt=\"logo\" src=\"corp/%s.png\"/>
	</td>
</tr>
<tr>
	<td>Kill Points:</td>
	<td class=\"green\">%s</td>
	<td>Loss Points:</td>
	<td class=\"red\">%s</td>
	<td>Net Points</td>
	<td class=\"%s\">%s</td>
</tr>
<tr>
	<td>Total Kills:</td>
	<td>%s</td>
	<td>Ship Kills:</td>
	<td>%s</td>
	<td>Pod Kills:</td>
	<td>%s</td>
</tr>
<tr>
	<td>Total Losses:</td>
	<td>%s</td>
	<td>Ship Losses:</td>
	<td>%s</td>
	<td>Pod Losses:</td>
	<td>%s</td>
</tr>
</table>", $ImageID, $CorpsPoints[4], $CorpsPoints[5], $tdClass, $CorpsPoints[6], $TotalKills,($TotalKills - $TotalPodKills),$TotalPodKills,$TotalLosses
,($TotalLosses - $TotalPodLosses),$TotalPodLosses);

}

function drawShipStats($shipID)
{

// Number of Ships Lost
$sql = "SELECT COUNT(*) FROM `Kill` WHERE (`ShipID` = $shipID)";
$result = mysql_query($sql);
$shipLostCount = mysql_result($result,0,0);

// Number of Ships Used in combat
$sql = "SELECT COUNT(*) FROM `Involved` WHERE (`ShipID` = $shipID)";
$result = mysql_query($sql);
$shipUsedCount = mysql_result($result,0);

$imageFileName = "images/" . $shipID . ".png";

if (!file_exists($imageFileName))
{
	$imageID = "999";
}
else
{
	$imageID = $shipID;
}

printf ("
<table style=\"width:100%%;\" cellspacing=\"2\">
<tr>
	<td style=\"text-align:center;\">
		<img class=\"tableborder\" alt=\"logo\" src=\"images/%s.png\"/>
	</td>
</tr>
<tr>
	<td style=\"text-align:center;\">Used in combat: %s - Lost in Combat: %s</td>
</tr>
</table>", $imageID, $shipUsedCount, $shipLostCount);

}

/*
Do not use this function!

function drawKillLossTable($corpID, $weekNumber, $yearNumber)
{

// Has to be a better way of doing this :)

$sql = "
SELECT COUNT(`Kill`.`KillID`) as NUMBER_KILLED, `ShipClass`.`ClassName` as CLASS_NAME
FROM Involved, Ship, ShipClass, `Kill`
WHERE ((`Involved`.`CorpID` = $corpID) 
AND (`Kill`.`KillID` = `Involved`.`KillID`) 
AND (`Ship`.`ShipID` = `Kill`.`ShipID`) 
AND (`ShipClass`.`ClassID` = `Ship`.`ClassID`) 
AND (FinalBlow = 1)
AND (WEEK(`Kill`.`KillDate`) = $weekNumber) 
AND (YEAR(`Kill`.`KillDate`) = $yearNumber))
GROUP BY `ShipClass`.`ClassName`
ORDER BY `ShipClass`.`ClassName` ASC";

$result = mysql_query($sql);

// Killed Ships
$assaultShipKilled = 0;
$battleCruiserKilled = 0;
$battleshipKilled = 0;
$capsuleKilled = 0;
$carrierKilled = 0;
$commandShipKilled = 0;
$covertKilled = 0;
$cruiserKilled = 0;
$destroyerKilled = 0;
$dreadnaughtKilled = 0;
$exhumerKilled = 0;
$freighterKilled = 0;
$frigateKilled = 0;
$heavyAssaultKilled = 0;
$industrialKilled = 0;
$interceptorKilled = 0;
$interdictorKilled = 0;
$logisticsKilled = 0;
$bargeKilled = 0;
$reconKilled = 0;
$rookieKilled = 0;
$shuttleKilled = 0;
$titanKilled = 0;
$transportKilled = 0;
	
// Lost Ships
$assaultShipLost = 0;
$battleCruiserLost = 0;
$battleshipLost = 0;
$capsuleLost = 0;
$carrierLost = 0;
$commandShipLost = 0;
$covertLost = 0;
$cruiserLost = 0;
$destroyerLost = 0;
$dreadnaughtLost = 0;
$exhumerLost = 0;
$freighterLost = 0;
$frigateLost = 0;
$heavyAssaultLost = 0;
$industrialLost = 0;
$interceptorLost = 0;
$interdictorLost = 0;
$logisticsLost = 0;
$bargeLost = 0;
$reconLost = 0;
$rookieLost = 0;
$shuttleLost = 0;
$titanLost = 0;
$transportLost = 0;

while ($killData = mysql_fetch_row($result))
{

	switch($killData[1])
	{
		case "Assault Ship":
			$assaultShipKilled = $killData[0];
		break;
		case "Battlecruiser":
			$battleCruiserKilled = $killData[0];
		break;
		case "Battleship":
			$battleshipKilled = $killData[0];
		break;
		case "Capsule":
			$capsuleKilled = $killData[0];
		break;
		case "Carrier":
			$carrierKilled = $killData[0];
		break;
		case "Command Ship":
			$commandShipKilled = $killData[0];
		break;
		case "Covert Ops":
			$covertKilled += $killData[0];
		break;
		case "Cruiser":
			$cruiserKilled = $killData[0];
		break;
		case "Destroyer":
			$destroyerKilled = $killData[0];
		break;
		case "Dreadnaught":
			$dreadnaughtKilled = $killData[0];
		break;
		case "Exhumer":
			$exhumerKilled = $killData[0];
		break;
		case "Frieghter":
			$freighterKilled = $killData[0];
		break;
		case "Frigate":
			$frigateKilled = $killData[0];
		break;
		case "Heavy Assault Ship":
			$heavyAssaultKilled = $killData[0];
		break;
		case "Industrial":
			$industrialKilled = $killData[0];
		break;
		case "Interceptor":
			$interceptorKilled = $killData[0];
		break;
		case "Interdictor":
			$interdictorKilled = $killData[0];
		break;
		case "Logisitics Cruiser":
			$logisticsKilled = $killData[0];
		break;
		case "Mining Barge":
			$bargeKilled = $killData[0];
		break;
		case "Recon Ship":
			$reconKilled = $killData[0];
		break;
		case "Rookie Ship":
			$rookieKilled = $killData[0];
		break;
		case "Shuttle":
			$shuttleKilled = $killData[0];
		break;
		case "Stealth Bomber":
			$covertKilled += $killData[0];
		break;
		case "Titan":
			$titanKilled = $killData[0];
		break;
		case "Trasport Ship":
			$transportKilled = $killData[0];
		break;
	}
}
?>
<table class=kb-table align=center>
	<tr>
		<td valign=top>
			<table class=kb-table>
				<tr class=kb-table-header>
					<td width=110>Ship class</td>
					<td width=30 align=center>K</td>
					<td width=30 align=center>L</td>
				</tr>
				<tr class=kb-table-row-odd>
					<td><b>Assault frigate</b></td>
					<td class=kl-kill align=center><?php echo($assaultShipKilled); ?></td>
					<td class=kl-loss align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Battlecruiser</b></td>
					<td class=kl-kill align=center><?php echo($battleCruiserKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
				<tr class=kb-table-row-odd>
					<td><b>Battleship</b></td>
					<td class=kl-kill align=center><?php echo($battleshipKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Capsule</b></td>
					<td class=kl-kill align=center><?php echo($capsuleKilled); ?></td>
					<td class=kl-loss align=center></td>
				</tr>
				<tr class=kb-table-row-odd>
					<td><b>Carrier</b></td>
					<td class=kl-kill-null align=center><?php echo($carrierKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Command ship</b></td>
					<td class=kl-kill-null align=center><?php echo($commandShipKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
			</table>
		</td>
		<td valign=top>
			<table class=kb-table>
				<tr class=kb-table-header>
					<td width=110>Ship class</td>
					<td width=30 align=center>K</td>
					<td width=30 align=center>L</td>
				</tr>
				<tr class=kb-table-row-odd>
					<td><b>Covert ops</b></td>
					<td class=kl-kill align=center><?php echo($covertKilled); ?></td>
					<td class=kl-loss align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Cruiser</b></td>
					<td class=kl-kill align=center><?php echo($cruiserKilled); ?></td>
					<td class=kl-loss align=center></td>
				</tr>
				<tr class=kb-table-row-odd>
					<td><b>Destroyer</b></td>
					<td class=kl-kill align=center><?php echo($destroyerKilled); ?></td>
					<td class=kl-loss align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Dreadnought</b></td>
					<td class=kl-kill align=center><?php echo($dreadnaughtKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>

				<tr class=kb-table-row-odd>
					<td><b>Exhumer</b></td>
					<td class=kl-kill-null align=center><?php echo($exhumerKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Freighter</b></td>
					<td class=kl-kill-null align=center><?php echo($freighterKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
			</table>
		</td>
		<td valign=top>
			<table class=kb-table>
				<tr class=kb-table-header>
					<td width=110>Ship class</td>
					<td width=30 align=center>K</td>
					<td width=30 align=center>L</td>
				</tr>
				<tr class=kb-table-row-odd>
					<td><b>Frigate</b></td>
					<td class=kl-kill align=center><?php echo($frigateKilled); ?></td>
					<td class=kl-loss align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Heavy assault</b></td>
					<td class=kl-kill-null align=center><?php echo($heavyAssaultKilled); ?></td>
					<td class=kl-loss align=center></td>
				</tr>
				<tr class=kb-table-row-odd>
					<td><b>Industrial</b></td>
					<td class=kl-kill align=center><?php echo($industrialKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Interceptor</b></td>
					<td class=kl-kill align=center><?php echo($interceptorKilled); ?></td>
					<td class=kl-loss align=center></td>
				</tr>
				<tr class=kb-table-row-odd>
					<td><b>Interdictor</b></td>
					<td class=kl-kill-null align=center><?php echo($interdictorKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Logistics</b></td>
					<td class=kl-kill-null align=center><?php echo($logisticsKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
			</table>
		</td>
		<td valign=top>
			<table class=kb-table>
				<tr class=kb-table-header>
					<td width=110>Ship class</td>
					<td width=30 align=center>K</td>
					<td width=30 align=center>L</td>
				</tr>
				<tr class=kb-table-row-odd>
					<td><b>Mining barge</b></td>
					<td class=kl-kill-null align=center><?php echo($bargeKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Noobship</b></td>
					<td class=kl-kill align=center><?php echo($rookieKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
				<tr class=kb-table-row-odd>
					<td><b>Recon ship</b></td>
					<td class=kl-kill-null align=center><?php echo($reconKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Shuttle</b></td>
					<td class=kl-kill align=center><?php echo($shuttleKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
	
				<tr class=kb-table-row-odd>
					<td><b>Titan</b></td>
					<td class=kl-kill-null align=center><?php echo($titanKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
				<tr class=kb-table-row-even>
					<td><b>Transport</b></td>
					<td class=kl-kill-null align=center><?php echo($transportKilled); ?></td>
					<td class=kl-loss-null align=center></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
			
<?php
}
*/
?>
			