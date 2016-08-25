<?php
$table = "users"; //User table !!!DON'T MODIFY!!!
class User
{
	private $Username = null;
	function __construct($username)
	{
		global $connection;
		$this->Username = mysqli_real_escape_string($connection, $username);
	}

	function getUserName()
	{
		return $this->Username;
	}

	function createSession()
	{
		$_SESSION['username'] = $this->getUserName();
		$_SESSION['isLogged'] = true;
		return true;
	}

	function deleteSession()
	{
		$_SESSION['username'] = null;
		$_SESSION['isLogged'] = false;
		return true;
	}

	function getUserId()
	{
		global $table;
		global $connection;
		$username = $this->getUserName();
		$_getuserid = "select * from $table where username=\"$username\"";
		$getuserid = mysqli_query($connection, $_getuserid);
		$Getuserid = mysqli_fetch_assoc($getuserid);
		return $Getuserid['id'];
	}

	function exists($debug = false)
	{
		global $table;
		global $connection;
		$username = $this->getUserName();
		$_exists = "select id from $table where username=\"$username\"";
		if($debug == true)
			print $_exists;
		$exists = mysqli_query($connection, $_exists);
		$Exists = mysqli_fetch_assoc($exists);
		if($Exists)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function getEmail()
	{
		global $table;
		global $connection;
		$username = $this->getUserName();
		$_getemail = "select * from $table where username=\"$username\"";
		$getemail = mysqli_query($connection, $_getemail);
		$Getemail = mysqli_fetch_assoc($getemail);
		return $Getemail['email'];
	}
}
?>
