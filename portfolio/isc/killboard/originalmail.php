<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Killmail</title>
</head>

<?php

ini_set("display_errors","on");

// get configuration
include "config.php";

// connect to database
$killboardDatabase = mysql_pconnect($serverAddress, $databaseUsername, $databasePassword);
mysql_select_db($databaseToUse,$killboardDatabase);

// register_globals support
if (isset($_GET['mail']))
{
	$mail = $_GET['mail'];
}
else
{
	$mail = "";
}

$sql = "SELECT * FROM `Kill` WHERE (`KillID` = $mail)";
$result = mysql_query($sql);

$killMail = mysql_fetch_row($result);
$fixedMail = str_replace("<br>","\r",$killMail[8]);

?>

<form>
<textarea rows="30" cols="50">
<?php
echo ($fixedMail);
?>
</textarea>
<body>
</body>
</html>
