<?php
if ((isset($server)) && ($con))
{
echo "Config.php was found, and you're good to go. Do you want to install database structure?<br/>
Loaded MySQL server details:<br/>
Server: " . $server . "<br/>
Database: " . $database . "<br/>
Login: " . $login . "<br/>
<input type=\"submit\" name=\"submit\" class=\"btn\" value=\"Install database structure\" />"
;
}
if (!(isset($server)) && !($con))
{
echo "Please rename config.php.sample to config.php and fill in all needed informations.";
}
if(isset($_POST['submit']) && (isset($server)) && ($con))
{
mysqli_query($con, "CREATE TABLE menu(name varchar(255),link varchar(255),id varchar(255));");
mysqli_query($con, "CREATE TABLE config(name varchar(255),value text(500));");
echo "Ok, installation finished, please rename install.php";
}
?>
