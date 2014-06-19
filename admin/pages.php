<?php
if (!isset($_SESSION['pass']))
{
	die("Unauthorized access!!!");
}
?>

<h2>Pages:</h2>
<?php
if (isset($_POST['pname']))
{
	$page = $_POST['pname'] . ".php";
	$handle = fopen($page, 'w'); 
}
foreach(pms_get_pages() as $value) 
{
	$value = str_replace(".php", "", $value);
	$value[0] = strtoupper($value[0]);
	echo "<a href=\"#\" onclick=\"pgdelconf(" . $value . ")\" data-target=\"#pgdel\" data-toggle=\"modal\"><span class=\"glyphicon glyphicon glyphicon-remove\"></span></a>" . $value . "<br/>";
}
?>