<?php
//MYSQL CONFIG ---------------------------------------------------------
$HOSTNAME = ""; //Mysql server location ex. "127.0.0.1"
$DB_USER = ""; //Mysql username ex. "root"
$DB_PASS = ""; //Mysql password ex. "toor"
$DATABASE = ""; //Mysql database ex. "EasyAuth"
$TABLE = "user"; //Mysql table for user data ex. "user" !!DON'T MODIFY!!
//----------------------------------------------------------------------
$connection = mysqli_connect($HOSTNAME, $DB_USER, $DB_PASS, $DATABASE);
if($connection)
{
mysqli_select_db($connection, 'users');
}
else
{
echo "There is a problem with the mysql connection!";
}
?>
