<?php
//First make sure to check mysqlconnect.php file!
require("userMgr.php"); //Include user manager module
?>

<!--CREATE LOGIN FORM------------------------------------------------------->
<form method='post'>
  Username: <input type='text' name='username'/>
  Password: <input type='password' name='password'/>
  <input type='submit' name='login' value='Login'/> //Login button
</form>
<!------------------------------------------------------------------------>
<?php
if(isset($_POST['login'])) //Check if login button is pressed
{
  if(isset($_POST['password'], $_POST['username'])) //Check if username and password are set
  {
    $manager = new UserMgr(); //Create user manager instance
    $isvalid = $manager->validate($_POST['password'], $_POST['password']); //Validate login (takes two parameters: username and password)
    if($isvalid) //If login is valid(correct)
    {
      print "Password correct!";  
    }
    else //If login is invalid(incorrect)
    {
      print "Password incorrect";
    }
  }
}
?>
