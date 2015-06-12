<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
   <title>Welcome to the I-S-C Killboard</title>
   <link rel="stylesheet" href="style/frontend.css"/>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
</head>

<body>

<?php
/**
*killboard.co.uk Client front end generator
*
*@author Geoff Wilson
**/

require "frontendfunctions.php";

?>
<table style="width:100%">
<tbody align="center">
<tr><td>

<table cellpadding="4" cellspacing="2" class="tableborder" style="width:630px; text-align:left;">
<tr>
   <td style="text-align:center;">
      <a href="../killboard/"><img alt="killboard logo" style="border:0;" src="images/background.jpg"/></a>
   </td>
</tr>

<?php
if ($mode != "") 
{
   switch ($mode)
   {

   /*
   PLAYER DISPLAY CODE
   -------------------------------------------------------------------------------------------------------------------------------------------
   */

   case "player":

      if ($view != "2")
      {
         $sql = "SELECT * FROM `Player` WHERE (PlayerID = '$id')";
         $result = mysql_query($sql);
         $PlayerDetails = mysql_fetch_array($result);
   
         $sql = "SELECT * FROM `Corp` WHERE (CorpID = '$PlayerDetails[5]')";
         $result = mysql_query($sql);
         $CorpDetails = mysql_fetch_array($result);
         ?>
         <tr>
            <td style="background-color:#3266cc; text-align:center" colspan="2"><b><?php echo($PlayerDetails[1]);?>'s stats</b> - Member of <a href="?mode=corp&amp;id=<?php echo($CorpDetails[0]);?>&amp;view=1&amp;kn=0"><?php echo($CorpDetails[1]);?></a></td>
         </tr>
         <tr>
            <td colspan="2">
            <?php
            ShowPlayerStats($PlayerDetails[0]);
            ?>
            </td>
         </tr>
         <tr>
            <td style="background-color:#3266cc; text-align:center;" colspan="2"><b><?php echo($PlayerDetails[1]);?>'s Kills</b> <a href="?mode=player&amp;id=<?php echo($PlayerDetails[0]);?>&amp;kn=0&amp;view=2">[losses]</a></td>
         </tr>
         <tr>
            <td colspan="2">
               <table style="width:100%;" cellpadding="2" cellspacing="0">
                  <?php
                  createKillTable($kn, $PlayerDetails[0], NULL, NULL, "kill", 10);
                  ?>
               </table>
            </td>
         </tr>
      <?php
      }
      else
      {
         $sql = "SELECT * FROM `Player` WHERE (PlayerID = '$id')";
         $result = mysql_query($sql);
         $PlayerDetails = mysql_fetch_array($result);
      
         $sql = "SELECT * FROM `Corp` WHERE (CorpID = '$PlayerDetails[5]')";
         $result = mysql_query($sql);
         $CorpDetails = mysql_fetch_array($result);
         ?>
         <tr>
            <td style="background-color:#3266cc; text-align:center;" colspan="2"><b><?php echo($PlayerDetails[1]);?>'s stats</b> - Member of <a href="?mode=corp&amp;id=<?php echo($CorpDetails[0]);?>&amp;view=1&amp;kn=0"><?php echo($CorpDetails[1]);?></a></td>
         </tr>
         <tr>
            <td colspan="2">
            <?php
            ShowPlayerStats($PlayerDetails[0]);
            ?>
            </td>
         </tr>
         <tr>
            <td style="background-color:#3266cc; text-align:center;" colspan="2"><b><?php echo($PlayerDetails[1]);?>'s Losses</b> <a href="?mode=player&amp;id=<?php echo($PlayerDetails[0]);?>&amp;kn=0&amp;view=1">[kills]</a></td>
         </tr>
         <tr>
            <td colspan="2">
               <table style="width:100%" cellpadding="2" cellspacing="0">
                  <?php
                  createKillTable($kn, $PlayerDetails[0], NULL, NULL, "loss",10);
                  ?>
               </table>
            </td>
         </tr>
      <?php
      }
      ?>
      <tr>
         <th style="background-color:#3266cc;" colspan="2"><a href="../killboard/">Return Home</a></th>
      </tr>
   </table>

   <?php

   break;

   /*
   COPORATION DISPLAY CODE
   ------------------------------------------------------------------------------------------------------------------------------------------------
   */

   case "corp";

      if ($view == "1")
      {
         $sql = "SELECT * FROM `Corp` WHERE (CorpID = '$id')";
         $result = mysql_query($sql);
         $CorpDetails = mysql_fetch_array($result);
         ?>
         <tr>     
            <td style="background-color:#3266cc; text-align:center" colspan="2"><?php echo($CorpDetails[1]);?>'s stats</td>
         </tr>
         <tr>
            <td colspan="2">
            <?php
            ShowCorpStats($CorpDetails[0]);
            ?>
            </td>
         </tr>
         <tr>
            <td style="background-color:#3266cc; text-align:center" colspan="2"><b><?php echo($CorpDetails[1]);?>'s Kills</b> <a href="?mode=corp&amp;id=<?php echo($CorpDetails[0]);?>&amp;kn=0&amp;view=2">[losses]</a> <a href="?mode=corp&amp;id=<?php echo($CorpDetails[0]);?>&amp;kn=0&amp;view=3">[members]</a></td>
         </tr>
         <tr>
            <td colspan="2">
               <table style="width:100%;" cellpadding="2" cellspacing="0">
                  <?php
                  createKillTable($kn, NULL, $CorpDetails[0], NULL, "kill", 10);
                  ?>
               </table>
            </td>
         </tr>
      <?php
      } 
      elseif ($view == 3)
      {
         $sql = "SELECT * FROM `Corp` WHERE (CorpID = '$id')";
         $result = mysql_query($sql);
         $CorpDetails = mysql_fetch_array($result);
         ?>
         <tr>
            <td style="background-color:#3266cc; text-align:center;" colspan="2"><?php echo($CorpDetails[1]);?>'s stats</td>
         </tr>
         <tr>
            <td colspan="2">
            <?php
            ShowCorpStats($CorpDetails[0]);
            ?>
            </td>
         </tr>
         <tr>
            <td style="background-color:#3266cc; text-align:center;" colspan="2"><b><?php echo($CorpDetails[1]);?>'s Members </b><a href="?mode=corp&amp;id=<?php echo($CorpDetails[0]);?>&amp;kn=0&amp;view=1">[kills]</a> <a href="?mode=corp&amp;id=<?php echo($CorpDetails[0]);?>&amp;kn=0&amp;view=2">[losses]</a></td>
         </tr>
         <tr>
            <td colspan="2">
            <?php
            $sql = "SELECT * FROM `Player` WHERE (`CorpID` = $id) ORDER BY `NetPoints` DESC";
            $result = mysql_query($sql);
      
            printf("<table cellspacing=\"2\" cellpadding=\"2\" width=\"100%%\">
            <tr style=\"background-color:#333365;\">
               <th>Player Name</th><th>KP</th>
               <th>LP</th>
               <th>NP</th>
            </tr>");
            
            while ($PlayerStats = mysql_fetch_row($result))
            {
               printf("<tr style=\"background-color:#3266cc;\" onmouseover=\"this.style.backgroundColor='#333365';\" onmouseout=\"this.style.backgroundColor='#3266cc';\" onclick=\"location.href='?mode=player&amp;id=%s&amp;view=1&amp;kn=0'\">
               <td>%s</td>
               <td style=\"text-align:right;\" class=\"green\">%s</td>
               <td style=\"text-align:right;\" class=\"red\">%s</td>
               <td style=\"text-align:right;\" class=\"green\">%s</td>
               </tr>",
               $PlayerStats[0],$PlayerStats[1],$PlayerStats[2],$PlayerStats[3],$PlayerStats[4]);
            }
            ?>
            </table>
            </td>
         </tr>
      <?php    
      } 
      else
      {
         $sql = "SELECT * FROM `Corp` WHERE (CorpID = '$id')";
         $result = mysql_query($sql);
         $CorpDetails = mysql_fetch_array($result);
         ?>
         <tr>
            <td style="background-color:#3266cc; text-align:center;" colspan="2"><?php echo($CorpDetails[1]);?>'s stats</td>
         </tr>
         <tr>
            <td colspan="2">
            <?php
            ShowCorpStats($CorpDetails[0]);
            ?>
            </td>
         </tr>
         <tr>
            <td style="background-color:#3266cc; text-align:center;" colspan="2"><b><?php echo($CorpDetails[1]);?>'s Losses </b><a href="?mode=corp&amp;id=<?php echo($CorpDetails[0]);?>&amp;kn=0&amp;view=1">[kills]</a> <a href="?mode=corp&amp;id=<?php echo($CorpDetails[0]);?>&amp;kn=0&amp;view=3">[members]</a></td>
         </tr>
         <tr>
            <td colspan="2">
               <table style="width:100%;" cellpadding="2" cellspacing="0">
                  <?php
                  createKillTable($kn, NULL, $CorpDetails[0], NULL, "loss", 10);
                  ?>
               </table>
            </td>
         </tr>
      <?php
      }
      ?>
      <tr>
         <th style="background-color:#3266cc;" colspan="2"><a href="../killboard/">Return Home</a></th>
      </tr>
   </table>

   <?php
   
   break;
   
   /*
   KILLMAIL DISPLAY CODE
   ------------------------------------------------------------------------------------------------------------------------------------------------
   */
   
   case "mail";
   
      include "showmail.php";
      
   break;
   
   /*
   KILLBOARD STATS CODE
   ------------------------------------------------------------------------------------------------------------------------------------------------
   */
   
   case "stats";
   
      ?>
      <tr>
         <th style="background-color:#3266cc;" colspan="2">The 15 Most Deadly Players and Corps</th>
      </tr>
      <tr>  
         <td colspan="2">
            <table style="width:100%;" >
               <tr>
                  <td style="width:50%;" >
                     <?php
                     $sql = "SELECT * FROM `Player` ORDER BY `NetPoints` DESC LIMIT 0,15";
                     $result = mysql_query($sql);
                     printf("<table class=\"tableborder\" cellspacing=\"2\" cellpadding=\"2\" width=\"100%%\"><tr style=\"background-color:#333365;\"><th>Player Name</th><th>KP</th><th>LP</th><th>NP</th></tr>");
                  
                     while ($PlayerStats = mysql_fetch_row($result))
                     {
                        printf("<tr style=\"background-color:#3266cc;\" onmouseover=\"this.style.backgroundColor='#333365';\" onmouseout=\"this.style.backgroundColor='#3266cc';\" onclick=\"location.href='?mode=player&amp;id=%s&amp;kn=0'\">
                        <td>%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"green\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"red\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"green\">%s</td>
                        </tr>",
                        $PlayerStats[0],$PlayerStats[1],$PlayerStats[2],$PlayerStats[3],$PlayerStats[4]);
                     }
               
                     printf("</table>");  
                     ?>
                  </td>
                  <td style="vertical-align:top; width:50%;">
                     <?php
                     $sql = "SELECT * FROM `Corp` ORDER BY `NetPoints` DESC LIMIT 0,15";
                     $result = mysql_query($sql);
                     printf("<table class=\"tableborder\" cellspacing=\"2\" cellpadding=\"2\" width=\"100%%\"><tr style=\"background-color:#333365;\"><th>Corp Name</th><th>KP</th><th>LP</th><th>NP</th></tr>");
         
                     while ($CorpStats = mysql_fetch_row($result))
                     {
                        if (strlen($CorpStats[1]) > 25)
                        {
                           $tmpCorpName = substr($CorpStats[1],0,25);
                           $CorpName = $tmpCorpName . "...";
                        }
                        else
                        {
                           $CorpName = $CorpStats[1];
                        }
                        printf("<tr style=\"background-color:#3266cc;\" onmouseover=\"this.style.backgroundColor='#333365';\" onmouseout=\"this.style.backgroundColor='#3266cc';\" onclick=\"location.href='?mode=corp&amp;id=%s&amp;view=1&amp;kn=0'\">
                        <td>%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"green\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"red\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"green\">%s</td></tr>",
                        $CorpStats[0],$CorpName,$CorpStats[4],$CorpStats[5],$CorpStats[6]);
                     }
               
                     printf("</table>");  
                     ?>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2">The 5 Most Victimized Players and Corps</th>
      </tr>
      <tr>
         <td colspan="2">
            <table style="width:100%;" >
               <tr>
                  <td style="width:50%;" >
                     <?php
                     $sql = "SELECT * FROM `Player` ORDER BY `NetPoints` ASC LIMIT 0,5";
                     $result = mysql_query($sql);
                     printf("<table class=\"tableborder\" cellspacing=\"2\" cellpadding=\"2\" width=\"100%%\"><tr style=\"background-color:#333365;\"><th>Player Name</th><th>KP</th><th>LP</th><th>NP</th></tr>");
                  
                     while ($playerStats = mysql_fetch_row($result))
                     {
                        if ($playerStats[4] < 0)
                        {
                           $colorClass = "red";
                        }
                        else
                        {
                           $colorClass = "green";
                        }
                        printf("<tr style=\"background-color:#3266cc;\" onmouseover=\"this.style.backgroundColor='#333365';\" onmouseout=\"this.style.backgroundColor='#3266cc';\" onclick=\"location.href='?mode=player&amp;id=%s&amp;view=2;&amp;kn=0'\">
                        <td>%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"green\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"red\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"%s\">%s</td>
                        </tr>",
                        $playerStats[0], $playerStats[1], $playerStats[2], $playerStats[3], $colorClass, $playerStats[4]);
                     }
               
                     printf("</table>");  
                     ?>
                  </td>
                  <td style="vertical-align:top; width:50%;">
                     <?php
                     $sql = "SELECT * FROM `Corp` WHERE(`npcCorp` != 1) ORDER BY `NetPoints` ASC LIMIT 0,5";
                     $result = mysql_query($sql);
                     printf("<table class=\"tableborder\" cellspacing=\"2\" cellpadding=\"2\" width=\"100%%\"><tr style=\"background-color:#333365;\"><th>Corp Name</th><th>KP</th><th>LP</th><th>NP</th></tr>");
         
                     while ($corpStats = mysql_fetch_row($result))
                     {
                        if (strlen($corpStats[1]) > 25)
                        {
                           $corpName = substr($corpStats[1],0,25);
                           $corpName = $corpName . "...";
                        }
                        else
                        {
                           $corpName = $corpStats[1];
                        }
                        if ($corpStats[6] < 0)
                        {
                           $colorClass = "red";
                        }
                        else
                        {
                           $colorClass = "green";
                        }
                        printf("<tr style=\"background-color:#3266cc;\" onmouseover=\"this.style.backgroundColor='#333365';\" onmouseout=\"this.style.backgroundColor='#3266cc';\" onclick=\"location.href='?mode=corp&amp;id=%s&amp;view=2&amp;kn=0'\">
                        <td>%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"green\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"red\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"%s\">%s</td></tr>",
                        $corpStats[0], $corpName, $corpStats[4], $corpStats[5], $colorClass, $corpStats[6]);
                     }
                     printf("</table>");  
                     ?>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2">Ships that go BOOM regularly</th>
      </tr>
      <tr>  
         <td colspan="2">
            <table style="width:100%;">
               <tr>
                  <td style="width:100%;">
                  <?php
                  $sql = 'SELECT `Ship` . `ShipName` , `Kill` . `ShipID` , COUNT( `Kill` . `ShipID` ) as KILLEDSHIPS FROM `Ship` , `Kill` WHERE ( `Ship` . `ShipID` = `Kill` . `ShipID` ) AND ( `Kill` . `ShipID` != 127 ) GROUP BY `Kill` . `ShipID` ORDER BY KILLEDSHIPS DESC LIMIT 0,5';
                  $result = mysql_query($sql);
                  for ($i = 0; $i < mysql_num_rows($result); $i ++)
                  {
                     $tmp0 = mysql_result($result,$i,0);
                     $tmp2 = mysql_result($result,$i,2);
                     echo ("$tmp0 // $tmp2<br>");
                  }
                  ?>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2">Some Random Facts</th>
      </tr>
      <tr>
         <td colspan="2">
            <table style="width:100%;">
               <tr>
                  <td style="width:50%">
                     <table class="tableborder" style="width:100%;">
                        <tr>
                           <?php
                           $sql = "SELECT `ShipID`, COUNT(*) AS USEDSHIPS FROM `Involved` GROUP BY `ShipID` ORDER BY USEDSHIPS DESC LIMIT 0,1";
                           $result = mysql_query($sql);
                           $shipID = mysql_result($result,0,0);
                           $shipKills = mysql_result($result,0,1);
                           
                           $sql = "SELECT * FROM `Ship` WHERE(`ShipID` = $shipID)";
                           $result = mysql_query($sql);
                           echo (mysql_error());
                           $shipName = mysql_fetch_row($result);
                           
                           $shipName = $shipName[1];
                              
                           ?>
                           <td style="width:32px">
                           <?php
                              echo ("<img src=\"images/$shipID.png\" alt=\"ship\" style=\"vertical-align:middle\">");
                           ?>       
                           </td>
                           <td style="width:100%">
                           <?php
                              echo ("<b>Your most likley to get shot by:</b><br>$shipName's<br>Flown $shipKills times");
                           ?>
                           </td>
                        </tr>
                     </table>
                  </td>
                  <td style="width:50%">
                     <table class="tableborder" style="width:100%;">
                        <tr>
                           <?php
                           $randomLowRankShip = mt_rand(5,25);
                           $sql = "SELECT `ShipID`, COUNT(*) AS USEDSHIPS FROM `Involved` GROUP BY `ShipID` ORDER BY USEDSHIPS ASC LIMIT $randomLowRankShip,1";
                           $result = mysql_query($sql);
                           $shipID = mysql_result($result,0,0);
                           $shipKills = mysql_result($result,0,1);
                           
                           $sql = "SELECT * FROM `Ship` WHERE(`ShipID` = $shipID)";
                           $result = mysql_query($sql);
                           echo (mysql_error());
                           $shipName = mysql_fetch_row($result);
                           
                           $shipName = $shipName[1];
                              
                           ?>
                           <td style="width:32px">
                           <?php
                              echo ("<img src=\"images/$shipID.png\" alt=\"ship\" style=\"vertical-align:middle\">");
                           ?>       
                           </td>
                           <td style="width:100%">
                           <?php
                              echo ("<b>Your unlikey to run into many:</b><br>$shipName's<br>Only flown $shipKills times");
                           ?>
                           </td>
                        </tr>
                     </table>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td colspan="2">
            <table style="width:100%;">
               <tr>
                  <td style="width:50%">
                     <table class="tableborder" style="width:100%;">
                        <tr>
                           <?php
                           $sql = "SELECT COUNT(*) AS WCS FROM `Destroyed` WHERE (`ItemID` = 847)";
                           $result = mysql_query($sql);
                           $wcsLost = mysql_result($result,0,0);                       
                           ?>
                           <td style="width:32px">
                              <img src="items/847.png" alt="wcs" style="vertical-align:middle">
                           </td>
                           <td style="width:100%">
                           <?php
                              echo ("<b>$wcsLost</b> Warp Core Stabilizer have been destroyed");
                           ?>
                           </td>
                        </tr>
                     </table>
                  </td>
                  <td style="width:50%">
                     
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2"><a href="../killboard/">Return Home</a></th>
      </tr>
      </table>
   <?php
   
   break;
   
   /*
   OUT OF GAME SUBMISSION CODE
   ------------------------------------------------------------------------------------------------------------------------------------------------
   */
   
   case "submit";
   
      ?>
      <tr>
         <th style="background-color:#3266cc;" colspan="2">Submit a Killmail</th>
      </tr>
      <tr>
         <?php
         if (array_key_exists('textarea',$_POST))
         {
            //if ($_POST['password'] == "PutPasswordHere")
            //{
               echo ("<tr><td>");
               include "parser.php";
               echo ("</td></tr>");
            //}
            //else
            //{
            // echo ("<tr><td>Invalid Password Supplied</td></tr>");
            //}
         }
         ?>
         <td>
         <form method="post" action="?mode=submit">
         <fieldset style="border:0">
         <textarea name="textarea" cols="60" rows="20"></textarea>
         <!--<br/><br/>Password: <input type="password" name="password" />-->
         <br/><br/><input name="submitMail" type="submit" value="Add"/>
         </fieldset>
         </form>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2"><a href="../killboard/">Return Home</a></th>
      </tr>
      </table>
      <?php
   
   break;
   
   /*
   SHIP CLASS DISPLAY CODE
   ------------------------------------------------------------------------------------------------------------------------------------------------
   */
   
   case "class":

   $sql = "SELECT * FROM `ShipClass` WHERE (`ClassID` = $id)";
   $result = mysql_query($sql);
   $className = mysql_fetch_row($result);
   
   $sql = "SELECT * FROM `Ship` WHERE (`ClassID` = $id)";
   $result = mysql_query($sql);
   
   ?>
      <tr>
         <th style="background-color:#3266cc;" colspan="2">Ships in the <?php echo($className[1]); ?> class</th>
      </tr> 
      <tr>
         <td>
         <?php
         while ($shipData = mysql_fetch_row($result))
         {
            ?>
            <div style="border-bottom:1px solid #990000; padding:3px; font-weight:bold; text-align:center;">
            <?php
            printf("<a href=\"?mode=ship&amp;id=%s&amp;kn=0\">%s</a></div>", $shipData[0], $shipData[1]);
            drawShipStats($shipData[0]);
         }        
         ?>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2"><a href="../killboard/">Return Home</a></th>
      </tr>
      </table>
   
   <?php
   break;
      
   /*
   SHIP STATS DISPLAY CODE
   ------------------------------------------------------------------------------------------------------------------------------------------------
   */
   
   case "ship":

   $sql = "SELECT * FROM `Ship` WHERE (`ShipID` = $id)";
   $result = mysql_query($sql);
   $shipName = mysql_fetch_row($result);
   ?>
      <tr>
         <th style="background-color:#3266cc;" colspan="2"><?php echo($shipName[1]); ?> stats</th>
      </tr>
      <tr>
         <td colspan="2">
            <?php
            drawShipStats($id);
            ?>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2"><?php echo($shipName[1]); ?>'s details</th>
      </tr>
      <tr>
         <td>
            <table style="width:100%;">
               <tr>
                  <td style="width:50%; vertical-align:top;">
                     <div style="border-bottom:1px solid #333365; padding:3px;">Description</div>
                     <div style="padding:3px;">
                     <?php
                        echo($shipName[4]);
                     ?>
                     </div>
                  </td>
                  <td style="width:50%; vertical-align:top;">
                     <div style="border-bottom:1px solid #333365; padding:3px;">Statistics</div>
                     <div style="padding:3px;">
                     <?php
                        echo("<img alt=\"ship\" src=\"images/highSlot.png\" style=\"vertical-align:middle; width:32px; height:32px;\" />High: " . $shipName[5] . "<br />");
                        echo("<img alt=\"ship\" src=\"images/midSlot.png\" style=\"vertical-align:middle; width:32px; height:32px;\" />Mid: " . $shipName[6] . "<br />");
                        echo("<img alt=\"ship\" src=\"images/lowSlot.png\" style=\"vertical-align:middle; width:32px; height:32px;\" />Low: " . $shipName[7] . "<br />");
                        echo("<img alt=\"ship\" src=\"images/cpu.png\" style=\"vertical-align:middle; width:32px; height:32px;\" />CPU: " . $shipName[8] . "<br />");
                        echo("<img alt=\"ship\" src=\"images/powerGrid.png\" style=\"vertical-align:middle; width:32px; height:32px;\" />Power: " . $shipName[9]);
                     ?>
                     </div>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2"><?php echo($shipName[1]); ?>'s lost in combat</th>
      </tr>
      <tr>
         <td colspan="2">
            <table style="width:100%;" cellpadding="2" cellspacing="0">
               <?php
               createKillTable($kn, NULL, NULL, $id, "loss", 6);
               ?>
            </table>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2"><a href="../killboard/">Return Home</a></th>
      </tr>
      </table>
      
   <?
   break;
   }

} 
else
{

   if (array_key_exists("do_search", $_POST)) 
   {

      switch ($_POST['search_type'])
      {

      /*
      SEARCH DISPLAY FOR PLAYERS
      --------------------------------------------------------------------------------------------------------------------
      */
      case "player":

         if (strlen($_POST['search_text']) > 2) 
         {

            // Lets See How Many Players we Match
            $SearchString = "%" . $_POST['search_text'] . "%";
            $sql = "SELECT * FROM `Player` WHERE (PlayerName Like '$SearchString')";
            $NumberMatches = mysql_query($sql);
            
            if (mysql_num_rows($NumberMatches) == 1)
            {
               $thePlayer = mysql_fetch_row($NumberMatches);
               ?>
               <script language="javascript">
                  <?php echo("location.href='?mode=player&id=$thePlayer[0]&view=1&kn=0'");?>
               </script>
                  
               <?php
            }

            ?>
            <tr>
               <th bgcolor="#3266cc" colspan="2"><b>Search Results for query "<?php echo($_POST['search_text']);?>"</b></th>
            </tr>
            <tr>
               <td colspan="2">
                  <table width="100%" border="0" class="tableborder" cellpadding="2" cellspacing="2">
                     <tr bgcolor="#333365">
                        <th>ID</th>
                        <th>Player Name</th>
                        <th>TK</th>
                        <th>SK</th>
                        <th>PK</th>
                        <th>TL</th>
                        <th>SL</th>
                        <th>PL</th>
                     </tr>
                     <?php
                     for ($x = 0; $x < mysql_num_rows($NumberMatches);$x++) 
                     {
                        $matchedPlayer = mysql_fetch_array($NumberMatches);
                        
                        $sql = "SELECT * FROM `Involved` WHERE (PlayerID = '$matchedPlayer[0]')";
                        $result = mysql_query($sql);
                        $totalKills = mysql_num_rows($result);
   
                        $totalPodKills = 0;
                        while ($row = mysql_fetch_array($result))
                        {
                           $sql = "SELECT * FROM `Kill` WHERE (KillID = '$row[1]') AND (ShipID = '127')";
                           $result2 = mysql_query($sql);
                           if (mysql_num_rows($result2) > 0)
                           {
                              $totalPodKills++;
                           }
                        }

                        $sql = "SELECT * FROM `Involved` WHERE (PlayerID = '$matchedPlayer[0]') AND (FinalBlow = '1')";
                        $result = mysql_query($sql);
                        $totalFb = mysql_num_rows($result);
   
                        // Lets Find Losses

                        $sql = "SELECT * FROM `Kill` WHERE (PlayerID = '$matchedPlayer[0]')";
                        $result = mysql_query($sql);
                        $totalLosses = mysql_num_rows($result);

                        $sql = "SELECT * FROM `Kill` WHERE (PlayerID = '$matchedPlayer[0]') AND (ShipID = '127')";
                        $result = mysql_query($sql);
                        $totalPodLosses = mysql_num_rows($result);
         
                        printf("<tr bgcolor=\"#3266cc\" onmouseover=\"this.style.backgroundColor='#333365';\" onmouseout=\"this.style.backgroundColor='#3266cc';\" onclick=\"location.href='?mode=player&amp;id=%s&amp;view=1&amp;kn=0'\">
                        <td width=\"8\">%s</td>
                        <td width=\"50%%\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        </tr>",$matchedPlayer[0],$matchedPlayer[0],$matchedPlayer[1],$totalKills,$totalKills - $totalPodKills, $totalPodKills, $totalLosses, $totalLosses - $totalPodLosses, $totalPodLosses);
                     }
                     ?>
                  </table>
               </td>
            </tr>
            <tr>
               <th bgcolor="#3266cc" colspan="2"><a href="../killboard/">Return Home</a></th>
            </tr>
         </table>

         <?php
         } 
         else
         {
         ?>
            <tr>
               <th bgcolor="#3266cc" colspan="2">Please Enter at least 3 characters</th>
            </tr>
         <?php
         }
      break;

      /*
      SEARCH DISPLAY FOR CORPS
      --------------------------------------------------------------------------------------------------------------------
      */
      case "corporation":

         if (strlen($_POST['search_text']) > 2)
         {
      
            // Lets See How Many Players we Match
            $searchString = "%" . $_POST['search_text'] . "%";
            $sql = "SELECT * FROM `Corp` WHERE (CorpName LIKE '$searchString')";
            $numberMatches = mysql_query($sql);

            if (mysql_num_rows($numberMatches) == 1)
            {
               $theCorp = mysql_fetch_row($numberMatches);
               ?>
               <script>
                  <?php echo("location.href='?mode=corp&id=$theCorp[0]&view=1&kn=0'");?>
               </script>
                  
               <?php
            }
            ?>
            <tr>
               <th bgcolor="#3266cc" colspan="2"><b>Search Results for query "<?php echo($_POST['search_text']);?>"</b></th>
            </tr>
            <tr>
               <td colspan="2">
                  <table width="100%" border="0" class="tableborder" cellpadding="2" cellspacing="2">
                     <tr bgcolor="#333365">
                        <th>ID</th>
                        <th>Corp Name</th>
                        <th>TK</th>
                        <th>SK</th>
                        <th>PK</th>
                        <th>TL</th>
                        <th>SL</th>
                        <th>PL</th>
                     </tr>
                     <?php
            
                     for ($x = 0; $x < mysql_num_rows($numberMatches);$x++)
                     {
                        $matchedCorp = mysql_fetch_array($numberMatches);
               
                        $sql = "SELECT * FROM `Involved` WHERE (CorpID = '$matchedCorp[0]') AND (FinalBlow = '1')";
                        $result = mysql_query($sql);
                        $totalKills = mysql_num_rows($result);

                        $totalPodKills = 0;
                        while ($row = mysql_fetch_array($result))
                        {
                           $sql = "SELECT * FROM `Kill` WHERE (KillID = '$row[1]') AND (ShipID = '127')";
                           $result2 = mysql_query($sql);
                           if (mysql_num_rows($result2) > 0) 
                           {
                              $totalPodKills++;
                           }
                        }

                        // Lets Find Losses
      
                        $sql = "SELECT * FROM `Kill` WHERE (CorpID = '$matchedCorp[0]')";
                        $result = mysql_query($sql);
                        $totalLosses = mysql_num_rows($result);

                        $sql = "SELECT * FROM `Kill` WHERE (CorpID = '$matchedCorp[0]') AND (ShipID = '127')";
                        $result = mysql_query($sql);
                        $totalPodLosses = mysql_num_rows($result);
         
                        printf("<tr bgcolor=\"#3266cc\" onmouseover=\"this.style.backgroundColor='#333365';\" onmouseout=\"this.style.backgroundColor='#3266cc';\" onclick=\"location.href='?mode=corp&amp;id=%s&amp;view=1&amp;kn=0'\">
                        <td width=\"8\">%s</td>
                        <td width=\"50%%\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        </tr>",$matchedCorp[0],$matchedCorp[0],$matchedCorp[1],$totalKills, $totalKills - $totalPodKills, $totalPodKills, $totalLosses, $totalLosses - $totalPodLosses, $totalPodLosses);
                     }
                     ?>
                  </table>
               </td>
            </tr>
            <tr>
               <th bgcolor="#3266cc" colspan="2"><a href="../killboard/">Return Home</a></th>
            </tr>
         </table>
         <?php
         }
         else
         {
         ?>
            <tr>
               <th bgcolor="#3266cc" colspan="2">Please enter at least 3 characters</th>
            </tr>
         <?php
         }

      break;

      /*
      SEARCH DISPLAY FOR SYSTEMS
      --------------------------------------------------------------------------------------------------------------------
      */
      case "system":

         if (strlen($_POST['search_text']) > 2)
         {
         
            // Lets See How Many Players we Match
            $searchString = "%" . $_POST['search_text'] . "%";
            $sql = "SELECT * FROM `System` WHERE (SystemName Like '$searchString')";
            $numberMatches = mysql_query($sql);

            ?>
            <tr>
               <th bgcolor="#3266cc" colspan="2"><b>Search Results for query "<?php echo($_POST['search_text']);?>"</b></th>
            </tr>
            <tr>
               <td colspan="2">
                  <table width="100%" border="0" class="tableborder" cellpadding="2" cellspacing="2">
                     <tr bgcolor="#333365">
                        <th>ID</th>
                        <th>System Name</th>
                        <th>Security</th>
                        <th>TK</th>
                        <th>SK</th>
                        <th>PK</th>
                     </tr>
                     <?php
      
                     for ($x = 0; $x < mysql_num_rows($numberMatches);$x++)
                     {
                        $matchedSystem = mysql_fetch_array($numberMatches);
            
                        // Get Number Kills
                        $sql = "SELECT * FROM `Kill` WHERE (SystemID = '$matchedSystem[0]')";
                        $result2 = mysql_query($sql);
                        $systemKills = mysql_num_rows($result2);
                  
                        $sql = "SELECT * FROM `Kill` WHERE (SystemID = '$matchedSystem[0]') AND (ShipID = 127)";
                        $result2 = mysql_query($sql);
                        $systemPodKills = mysql_num_rows($result2);
            
                        printf("<tr bgcolor=\"#3266cc\" onmouseover=\"this.style.backgroundColor='#333365';\" onmouseout=\"this.style.backgroundColor='#3266cc';\" onclick=\"location.href='?mode=system&amp;id=%s&amp;view=1&amp;kn=0'\">
                        <td width=\"8\">%s</td>
                        <td width=\"50%%\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        <td width=\"8\">%s</td>
                        </tr>",$matchedSystem[0],$matchedSystem[0],$matchedSystem[1],$matchedSystem[2],$systemKills,$systemKills-$systemPodKills,$systemPodKills);
                     }
                     ?>
                  </table>
               </td>
            </tr>
            <tr>
               <th bgcolor="#3266cc" colspan="2"><a href="../killboard/">Return Home</a></th>
            </tr>
         </table>
         <?php
         }
         else
         {
         ?>
            <tr>
               <th bgcolor="#3266cc" colspan="2">Please enter at least 3 characters</th>
            </tr>
         <?php
         }

      break;

      /*
      SEARCH DISPLAY FOR SHIP TYPES
      --------------------------------------------------------------------------------------------------------------------
      */
      case "ship type":

         ?>
         <tr>
            <th bgcolor="#3266cc" colspan="2">Not Available</th>
         </tr>       
         <?php
      break;
      }

   }
   else
   {

      /*
      HOMEPAGE DISPLAY
      --------------------------------------------------------------------------------------------------------------------------------
      */
      ?>

      <tr>
         <th style="text-align:center; background-color:#3266cc;" colspan="2">Welcome to the I-S-C Killboard</th>
      </tr>
      <tr>
         <td colspan="2">
            <table style="width:100%;" cellpadding="2" cellspacing="0">
               <tr>
                  <td style="width:50%; text-align:center;">
                     <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                     <fieldset style="border:0;">
                     Search for:&nbsp;
                     <input class="button" type="text" name="search_text"/>
                     <select class="select" name="search_type">
                     <option>player</option>
                     <option>corporation</option>
                     <option>system</option>
                     <option>ship type</option>
                     </select>
                     <input class="select" type="submit" name="do_search" value="go"/>
                     </fieldset>
                     </form>
                     <a href="?mode=submit"><img src="images/submitmail.png" border="0" align="center"> Submit Killmail</a> <a href="?mode=stats"><img src="images/stats.png" border="0" align="center"> Killboard Stats</a>
                     <?php
                     $sql = "SELECT *FROM `Kill` WHERE ((ShipID >=13 AND ShipID <=20 )OR (ShipID >=132 AND ShipID <=140) OR (ShipID >=80 AND ShipID <=87)) AND ((YEAR(KillDate) >= 2005 AND ((MONTH(KillDate )>=9 AND DAYOFMONTH(KillDate )>=25) OR MONTH(KillDate )>=10)) OR (YEAR(KillDate) = 2006))";

                     $result = mysql_query($sql);
                     $counter = 0;
   
                     while ($moo = mysql_fetch_row($result))
                     {
                        $counter++;
                     }
                     ?>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2">Last 6 Kills</th>
      </tr>
      <tr>
         <td colspan="2">
            <table style="width:100%;" cellpadding="2" cellspacing="0">
               <?php
               createKillTable(0, NULL, NULL, NULL, "loss", 6);
               ?>
            </table>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2">The Top 5 Players and Corps</th>
      </tr>
      <tr>  
         <td colspan="2">
            <table style="width:100%;" >
               <tr>
                  <td style="width:50%;" >
                     <?php
                     $sql = "SELECT * FROM `Player` ORDER BY `NetPoints` DESC LIMIT 0,5";
                     $result = mysql_query($sql);
                     printf("<table class=\"tableborder\" cellspacing=\"2\" cellpadding=\"2\" width=\"100%%\"><tr style=\"background-color:#333365;\"><th>Player Name</th><th>KP</th><th>LP</th><th>NP</th></tr>");
                  
                     while ($PlayerStats = mysql_fetch_row($result))
                     {
                        printf("<tr style=\"background-color:#3266cc;\" onmouseover=\"this.style.backgroundColor='#333365';\" onmouseout=\"this.style.backgroundColor='#3266cc';\" onclick=\"location.href='?mode=player&amp;id=%s&amp;kn=0'\">
                        <td>%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"green\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"red\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"green\">%s</td>
                        </tr>",
                        $PlayerStats[0],$PlayerStats[1],$PlayerStats[2],$PlayerStats[3],$PlayerStats[4]);
                     }
               
                     printf("</table>");  
                     ?>
                  </td>
                  <td style="vertical-align:top; width:50%;">
                     <?php
                     $sql = "SELECT * FROM `Corp` ORDER BY `NetPoints` DESC LIMIT 0,5";
                     $result = mysql_query($sql);
                     printf("<table class=\"tableborder\" cellspacing=\"2\" cellpadding=\"2\" width=\"100%%\"><tr style=\"background-color:#333365;\"><th>Corp Name</th><th>KP</th><th>LP</th><th>NP</th></tr>");
         
                     while ($CorpStats = mysql_fetch_row($result))
                     {
                        if (strlen($CorpStats[1]) > 25)
                        {
                           $tmpCorpName = substr($CorpStats[1],0,25);
                           $CorpName = $tmpCorpName . "...";
                        }
                        else
                        {
                           $CorpName = $CorpStats[1];
                        }
                        printf("<tr style=\"background-color:#3266cc;\" onmouseover=\"this.style.backgroundColor='#333365';\" onmouseout=\"this.style.backgroundColor='#3266cc';\" onclick=\"location.href='?mode=corp&amp;id=%s&amp;view=1&amp;kn=0'\">
                        <td>%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"green\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"red\">%s</td>
                        <td style=\"text-align:right;font-weight:bold;\" class=\"green\">%s</td></tr>",
                        $CorpStats[0],$CorpName,$CorpStats[4],$CorpStats[5],$CorpStats[6]);
                     }
               
                     printf("</table>");  
                     ?>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2">Killboard Stats</th>
      </tr>
      <tr>
         <td colspan="2">
            <?php
            $sql = "SELECT COUNT(*) FROM `Kill`";
            $result = mysql_query($sql);
            $totalKills = mysql_result($result,0,0);

            $sql = "SELECT COUNT(*) FROM `Kill` WHERE(`ShipID` = 127)";
            $result = mysql_query($sql);
            $totalPodKills = mysql_result($result,0,0);
            
            $sql = "SELECT COUNT(*) FROM `Player`";
            $result = mysql_query($sql);
            $totalPlayers = mysql_result($result,0,0);
            
            $sql = "SELECT COUNT(*) FROM `Corp`";
            $result = mysql_query($sql);
            $totalCorps = mysql_result($result,0,0);
            
            $sql = "SELECT COUNT(*) FROM `Users`";
            $result = mysql_query($sql);
            $totalUsers = mysql_result($result,0,0);
         
            printf ("
            <table style=\"width:100%%;\" class=\"tableborder\" cellspacing=\"2\" cellpadding=\"2\">
               <tr>
                  <td style=\"background-color:#333365;\">Total Kills:</td><td style=\"background-color:#3266cc;\">%s</td>
                  <td style=\"background-color:#333365;\">Ship Kills:</td><td style=\"background-color:#3266cc;\">%s</td>
                  <td style=\"background-color:#333365;\">Pod Kills:</td><td style=\"background-color:#3266cc;\">%s</td>
               </tr>
               <tr>
                  <td style=\"background-color:#333365;\">Known Players:</td><td style=\"background-color:#3266cc;\">%s</td>
                  <td style=\"background-color:#333365;\">Known Corps:</td><td style=\"background-color:#3266cc;\">%s</td>
                  <td style=\"background-color:#333365;\">Site Users:</td><td style=\"background-color:#3266cc;\">%s</td>
               </tr>
            </table>",
            $totalKills,($totalKills - $totalPodKills), $totalPodKills, $totalPlayers, $totalCorps, $totalUsers);
            ?>
         </td>
      </tr>
      <tr>
         <th style="background-color:#3266cc;" colspan="2">version <?php echo("$killboardVersion");?></th>
      </tr>
   </table>
   <br>
   <center>
   <a href="../">Back to I-S-C Main Site</a><br>
   <br>
   <?php
   }
}
?>

</td></tr>
</tbody>
</table>

</body>
</html>
