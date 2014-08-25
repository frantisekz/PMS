<?php
if (!isset($_SESSION['pass']))
{
	die("Unauthorized access!!!");
}

if (isset($_GET['pgdel']))
{
	$un = "../pages/" . $_GET['pgdel'] . ".php";
	unlink($un);
	$file = fopen("log.txt", "a");
	$write = "<strong>N:</strong>Deleted page " . $msgs[$_GET['pgdel']] . "+++" . time() . "\n";
	fwrite($file, $write);
	unset($file);
	unset($_GET['pgdel']);
}

if(isset($_GET['pgnew']))
{
	$new = "../pages/" . $_GET['pgnew'];
	if (file_exists($new))
	{
		echo "<strong>Page exists already!</strong><br/>";
	}
	else
	{
		touch($new);
	}
	unset($new);
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
	echo "<a href=\"index.php?sub=pages&pgdel=" . $value . "\"><span class=\"glyphicon glyphicon glyphicon-remove\"></span></a>" . $value . "<br/>";
}
?>