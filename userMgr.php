<?php
require("mysqlconnect.php");
$table = "users"; //User table !!!DON'T MODIFY!!
class UserMgr
{
	function __construct() //Not Used!
	{
		
	}

	function validate($username, $password, $debug = false)
	{
		global $table;
		global $connection;
		$Username = mysqli_real_escape_string($connection, $username);
		$Password = mysqli_real_escape_string($connection, $password);
		$_validate = "select id from $table where username=\"$Username\" and password=\"$Password\"";
		if($debug == true)
			print $_validate;
		$validate = mysqli_query($connection, $_validate);
		$Validate = mysqli_fetch_assoc($validate);
		if($Validate)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function register($username, $password, $email, $debug = false)
	{
		global $connection;
		global $table;
		$_register = "insert into $table(username, password, email) values(\"$username\", \"$password\", \"$email\")";
		$register = mysqli_query($connection, $_register);
		if($debug == true)
		{
			echo $_register;
		}
	}
	function sessionExists()
	{
		if(isset($_SESSION['isLogged']))
		{
			if($_SESSION['isLogged'] == true && $_SESSION['username'] != null;)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
} 
?>
