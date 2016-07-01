<?php
//This is basic example on the register method
require("userMgr.php");
?>
<form method='post'>
<input type='text' name='username'>
<input type='password' name='password'>
<input type='submit' name='Register' value='Register'>
</form>
<?php
if(isset($_POST['Register'])) //Check if register button is pressed
{
	if($_POST['username'] != "" && $_POST['password'] != "") //Check if fields are not empty
	{
		$manager = new userMgr();
		if($manager->userExists($_POST['username']))
		{
			print "Account already exists!";
		}
		else
		{
			$manager->register($_POST['username'], $_POST['password'], "test@example.com");
		}
	}
	else //If fields are empty
	{
		print "You can't create account with empty username or password!";
	}
}
?>
