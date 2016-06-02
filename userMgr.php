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
} 
?>
