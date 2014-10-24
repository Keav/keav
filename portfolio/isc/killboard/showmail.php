<?php

$sql = "SELECT * FROM `Kill` WHERE (KillID = '$mail')";
$result = mysql_query($sql);
if (mysql_num_rows($result) < 1)
{
   echo ("<tr><th>Killmail not found</th></tr>");
}
else
{
$KillDetails = mysql_fetch_array($result);

$sql = "SELECT * FROM `Player` WHERE (PlayerID = '$KillDetails[1]')";
$result = mysql_query($sql);
$VictimDetails = mysql_fetch_array($result);

?>

<tr>
   <th style="background-color:#3266cc;" colspan="2"><b><?php echo($VictimDetails[1]);?>'s stats</b></th>
</tr>
<tr>
   <td colspan="2">
      <?php
      ShowPlayerStats($VictimDetails[0]);
      ?>
   </td>
</tr>
<tr>
   <th style="background-color:#3266cc;">Victim Details</th>
</tr>
<tr>
   <td>
      <?php
      
      $sql = "SELECT * FROM `Player` WHERE (PlayerID = '$KillDetails[1]')";
      $result2 = mysql_query($sql);
      $LastKilled = mysql_fetch_row($result2);
      $sql = "SELECT * FROM `Corp` WHERE (CorpID = '$KillDetails[2]')";
      $result2 = mysql_query($sql);
      $LastKilledCorp = mysql_fetch_row($result2);
      $sql = "SELECT * FROM `System` WHERE (SystemID = '$KillDetails[4]')";
      $result2 = mysql_query($sql);
      $LastKilledSys = mysql_fetch_row($result2);
      $sql = "SELECT * FROM `Ship` WHERE (ShipID = '$KillDetails[3]')";
      $result2 = mysql_query($sql);
      $LastKilledShip = mysql_fetch_row($result2);
      
      $timeStamp = strtotime($KillDetails[6]);
            
      printf("
      <table style=\"width:100%%\">
      <tbody align=\"center\">
      <tr>
      <td>
      <table style=\"text-align:left;\" cellpadding=\"2\">
         <tr>
            <td rowspan=\"4\" style=\"text-align:center; width:64px; height:64px;\">
               <img alt=\"ship\" class=\"ship-image\" src=\"images/%s.png\" />
            </td>
            <td>Killed %s at %s</td>
            <td rowspan=\"4\" style=\"text-align:center; width:64px; height:64px;\">
               <img onclick=\"javascript:window.open('originalmail.php?mail=%s','kill_mail','width=475,height=625');\" alt=\"mail\" class=\"ship-image\" src=\"images/mail.png\" />
            </td>
         </tr>
         <tr>
            <td>Corp: %s</td>
         </tr>
         <tr>
            <td>Ship Lost: %s</td>
         </tr>
         <tr>
            <td>System: %s (%s)</td>
         </tr>
      </table>
      </td>
      </tr>
      </tbody>
      </table>
      "
      ,$LastKilledShip[0], date("l F jS Y",$timeStamp), $KillDetails[5], $mail, $LastKilledCorp[1],$LastKilledShip[1], $LastKilledSys[1],$LastKilledSys[2]);
      ?>
   </td>
</tr>
<tr>
   <th style="background-color:#3266cc;">Kill Details</th>
</tr>
<tr>
   <td>
      <table style="width:100%">
         <tr>
            <td style="width:50%; vertical-align:top;"><div style="border-bottom:1px solid #710401; padding:3px;">Involved Parties</div>
            <?php
         
            $sql = "SELECT * FROM `Involved` WHERE (KillID = '$KillDetails[0]')";
            $result = mysql_query($sql);
            
            while ($Involved = mysql_fetch_array($result))
            {
               $sql = "SELECT * FROM `Player` WHERE (PlayerID = '$Involved[2]')";
               $result2 = mysql_query($sql);
               $KillersName = mysql_fetch_row($result2);
               $sql = "SELECT * FROM `Corp` WHERE (CorpID = '$Involved[3]')";
               $result2 = mysql_query($sql);
               $KillersCorp = mysql_fetch_row($result2);
               $sql = "SELECT * FROM `Ship` WHERE (ShipID = '$Involved[4]')";
               $result2 = mysql_query($sql);
               $KillersShip = mysql_fetch_row($result2);
               $sql = "SELECT * FROM `Item` WHERE (ItemID = '$Involved[5]')";
               $result2 = mysql_query($sql);
               $KillersWep = mysql_fetch_row($result2);
   
               // Laid the final blow?
               if ($Involved[6] == 1)
               {
                  $imageBorderColor = "FFCC00";
               }
               else
               {
                  $imageBorderColor = "808080";
               }
               
               if (strlen($KillersCorp[1]) > 22)
               {
                  $corpName = substr($KillersCorp[1],0,22);
                  $corpName = $corpName . "...";
               }
               else
               {
                  $corpName = $KillersCorp[1];
               }

               if (strlen($KillersWep[1]) > 22)
               {
                  $killersWep = substr($KillersWep[1],0,22);
                  $killersWep = $killersWep . "...";
               }
               else
               {
                  $killersWep = $KillersWep[1];
               }
               
               printf("
               <div style=\"border-bottom:1px solid #710401; padding:3px;\">
               <table style=\"width:100%%;\" cellspacing=\"2\" >
                  <tr>
                     <td rowspan=\"4\" style=\"text-align:center; width:64px; height:64px;\">
                        <img alt=\"Ship Image\" style=\"border:0; width:64px; height:64px; border:1px solid #%s;\" src=\"images/%s.png\" />
                     </td>
                     <td>Name: %s</td>
                  </tr>
                  <tr>
                     <td>Corp: %s</td>
                  </tr>
                  <tr>
                     <td>Ship: %s</td>
                  </tr>
                  <tr>
                     <td>Weapon: %s</td>
                  </tr>
               </table>
               </div>"
               ,$imageBorderColor, $KillersShip[0], $KillersName[1], $corpName, $KillersShip[1], $killersWep);
            }
            ?>
            </td>
            <td style="width:50%; vertical-align:top;">
               <div style="border-bottom:1px solid #710401; padding:3px;">Destroyed Items</div>
               <table>
               <?php
               
               $sql = "SELECT SUM( `quantity` ) AS noDestroyed, `itemID` FROM `Destroyed` WHERE (`KillID` = $mail AND `fitted` =  1) GROUP BY `ItemID`";
               $result = mysql_query($sql);
               
               echo ("<tr><td><img alt=\"fitted\" src=\"images/fitted.png\" style=\"width:32px; height:32px; vertical-align:middle;\" /> Fitted Items:</td></tr>");
               
               echo ("<tr><td><table>");
               while ($destroyedItems = mysql_fetch_row($result))
               {
                  $sql = "SELECT * FROM `Item` WHERE (ItemID = '$destroyedItems[1]')";
                  $result2 = mysql_query($sql);
                  $item = mysql_fetch_row($result2);
                  $itemFileName = "items/" . $item[0] . ".png";
                  if (!file_exists($itemFileName))
                  {
                     $itemFileName = "items/noImage.png";
                  }
                  echo ("<tr><td style=\"width:32px;\"><img class=\"tableborder\" src=\"$itemFileName\" alt=\"item\" style=\"width:32px\" /></td><td style=\"width:200px;\">$item[1]</td><td style=\"width:48px;\">$destroyedItems[0]</td></tr>");
               }
               echo ("</table></td></tr>");
               
               $sql = "SELECT SUM( `quantity` ) AS noDestroyed, `itemID` FROM `Destroyed` WHERE (`KillID` = $mail AND `fitted` =  0) GROUP BY `ItemID`";
               $result = mysql_query($sql);
               
               echo ("<tr><td><img alt=\"cargo\" src=\"images/cargo.png\" style=\"width:32px; height:32px; vertical-align:middle;\" /> Cargo:</td></tr>");
               
               echo ("<tr><td><table>");
               while ($destroyedItems = mysql_fetch_row($result))
               {
                  $sql = "SELECT * FROM `Item` WHERE (ItemID = '$destroyedItems[1]')";
                  $result2 = mysql_query($sql);
                  $item = mysql_fetch_row($result2);
                  $itemFileName = "items/" . $item[0] . ".png";
                  if (!file_exists($itemFileName))
                  {
                     $itemFileName = "items/noImage.png";
                  }
                  echo ("<tr><td style=\"width:32px;\"><img class=\"tableborder\" src=\"$itemFileName\" alt=\"item\" style=\"width:32px\" /></td><td style=\"width:200px;\">$item[1]</td><td style=\"width:48px;\">$destroyedItems[0]</td></tr>");
               }
               echo ("</table></td></tr>");
               
               ?>
               </table>
            </td>
         </tr>
      </table>
   </td>
</tr>
<tr>
   <th style="background-color:#3266cc;" colspan="2">&nbsp;</th>
</tr>
</table>
<?
}
?>
