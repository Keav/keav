<?php
ob_start(); 

// Not supported on all servers
/*
ini_set("display_errors","on");
ini_set("register_globals","off");
*/

// get configuration
include "config.php";

// connect to database
$killboardDatabase = mysql_pconnect($serverAddress, $databaseUsername, $databasePassword);
mysql_select_db($databaseToUse,$killboardDatabase);

// Lets get the killboard settings
$sql = "SELECT * FROM `Settings` WHERE 1";
$result = mysql_query($sql);

// register_globals = off temporary fix
if (isset($_GET['mode']))
{
	$mode = $_GET['mode']; 
}
else 
{
	$mode = "";
}
 
if (isset($_GET['view']))
{
	$view = $_GET['view']; 
}
else 
{
	$view = ""; 
}
 
if (isset($_GET['id'])) 
{
	$id = $_GET['id']; 
}
else
{
	$id = "";
}
 
if (isset($_GET['kn'])) 
{
	$kn = $_GET['kn']; 
}
else 
{
	$kn = "0";
}
if (isset($_GET['mail']))
{
	$mail = $_GET['mail'];
}
else
{
	$mail = "";
}

// is connection from EVE IGB?
if (!(strpos($_SERVER['HTTP_USER_AGENT'],"EVE-minibrowser")===false))
{
	// yes, use in game code
	include "igb.php";
}
else
{	
	// no, use normal code
	include "frontend.php";

}

ob_flush();
?> 