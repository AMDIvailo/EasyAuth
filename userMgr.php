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
			if($_SESSION['isLogged'] == true && $_SESSION['username'] != null)
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
	function userExists($username, $debug=false)
	{
		if($username != "")
		{
			global $table;
			global $connection;
			$_userExists = "select * from $table where username = \"$username\"";
			if($debug == true)
			{
				print $_userExists;
			}
			$userExists = mysqli_query($connection, $_userExists);
			$UserExists = mysqli_fetch_assoc($userExists);
			if($UserExists)
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
	function idToUsername($id, $debug=false)
	{
		global $table;
		global $connection;
		$_idToUsername = "select * from $table where id=$id";
		if($debug == true)
		{
			print $_idToUsername;
		}
		$idToUsername = mysqli_query($connection, $_idToUsername);
		$IdToUsername = mysqli_fetch_assoc($idToUsername);
		return $IdToUsername['username'];
	}
	function usernameToId($username, $debug=false)
	{
		global $table;
                global $connection;
                $_usernameToId = "select * from $table where username=$username";
                if($debug == true)
                {
                        print $_usernameToId;
                }
                $usernameToId = mysqli_query($connection, $_idToUsername);
                $UsernameToId = mysqli_fetch_assoc($idToUsername);
                return $UsernameToId['id'];
	}
} 
?>
