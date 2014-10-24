<html>
<head>
	<title>Killboard Login</title>
	<link rel="stylesheet" href="style/igb.css">
</head>

<body>

<?php
// is the website trusted
if ($_SERVER["HTTP_EVE_TRUSTED"]=="no")
{
	// not trusted, need to get user to  trust
	$newHeader = "eve.trustme:$killboardURL::To post kills you must add to trusted sites.";
	header($newHeader); 
}
else
{
	// is trusted, show login page
	?>
	<table width="250">
	<tr>
		<td width="70">
			<img src="portrait:<?php echo($_SERVER['HTTP_EVE_CHARID']);?>">
		</td>
		<td width="180" valign="middle">
			<?php
			echo ($_SERVER['HTTP_EVE_CHARNAME']);
			echo ("<br>");
			echo ($_SERVER['HTTP_EVE_CORPNAME']);
			?>
		</td>
	</tr>
	</table>

	<?php

	// NOT trying to log in currently
	if (!array_key_exists('password',$_POST))
	{
		// we need to find out if this character exists
		$userToFind = $_SERVER['HTTP_EVE_CHARNAME'];
		$sql = "SELECT * FROM Users WHERE (UserName = '$userToFind')";
		$result = mysql_query($sql,$killboardDatabase);
		
		// does this character have a record?
		if (mysql_num_rows($result) < 1)
		{
			?>
			<p>
			<form name="login" method="post" action="<?php echo($_SERVER['PHP_SELF']);?>">
			<table>
			<tr>
				<td colspan="2">This is your first visit, please specify a password to use for all future visits:</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
				<input type="hidden" name="newreg" value="true">
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td>Confirm Password:</td>
				<td><input type="password" name="password2"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
			</table>
			</form>
			</p>
			<?php
		} 
		else
		{
			$userDetails = mysql_fetch_array($result);

			// is the users acount suspended?
			if ($userDetails[3] == 1)
			{
				?>
				<table>
				<tr>
					<td>Your Account has been supsended</td>
				</tr>
				<tr>
					<td colspan="2"><br>Contact the killboard admin for more details.</td>
				</tr>
				</table>
				<?php
			}
			else
			{
				?>
				<form name="login" method="post" action="<?php echo($_SERVER['PHP_SELF']);?>">
				<table>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
				<tr>
					<td colspan="2">Forgot your password?<br>Contact the killboard admin to have it reset</td>
				</tr>
				</table>
				</form>
				<?php
			}
		}
	}
	else 
	{
		// is this a new registration?
		if (array_key_exists('newreg',$_POST))
		{
			if ($_POST['password'] == $_POST['password2'])
			{
				// create new account
				$newUserName = $_SERVER['HTTP_EVE_CHARNAME'];
				$newUserPassword = sha1($_POST['password']);
				$sql = "INSERT INTO Users (UserID, UserName, UserPassword) VALUES ('', '$newUserName', '$newUserPassword')";
				$result = mysql_query($sql,$killboardDatabase);
				?>
				<p>Account Created. Reload page to log in</p>
				<?php
				// Begin Portrait Creation
				include "functions.php";
				$charid = $_SERVER['HTTP_EVE_CHARID'];
				$id = getPlayerID($newUserName);
				$filename = "people/$id.png";
				if (file_exists($filename))
				{
					echo "Portrait for $newUserName, ID $id, already exists";
				}
				else
				{
					$im = imagecreatefromjpeg("http://img.eve.is/serv.asp?s=64&c=$charid");
					imagepng($im,$filename);
					imagedestroy($im);
					// End Portrait Creation
				}
			}
			else
			{
				?>
				<p>Passwords do not match, please go back and try again</p>
				<?php
			}
		}
		// existing login
		else 
		{
			// verify existing account
			$userName = $_SERVER['HTTP_EVE_CHARNAME'];
			$userPassword = sha1($_POST['password']);
			$sql = "SELECT * FROM Users WHERE (UserName = '$userName')";
			$result = mysql_query($sql,$killboardDatabase);
			$userDetails = mysql_fetch_row($result);

			if (($userDetails[2] == $userPassword) or  (array_key_exists('loggedin',$_POST))) 
			{
				// existing login was verified
				$activeUserID = $userDetails[0];
				
				// has a killmail been posted?
				if (array_key_exists('textarea',$_POST))
				{
					include "parser.php";
				}
				// no mail posted, show post box
				?>
				<p>Copy and Paste your killmail in to the box below:<br>
				<b>If you are going to post old mails please post them oldest first.</b><br>
				Posting of pod kills has been fixed!</p>
				
				<p><form name="addmail" method="post" action="<?php echo($_SERVER['PHP_SELF']);?>">
				<textarea name="textarea" cols="60" rows="20"></textarea>
				<input type="hidden" name="loggedin" value="loggedin">
				<br>
				<br><input name="password" type="submit" id="addmail" value="Add">
				</form>
				</p>
				<?php
				
			}
			else
			{
				// login was invalid
				printf ("<p>Invalid Passowrd</p>");
			}
		}
	}
} 

?>

</body>
</html>