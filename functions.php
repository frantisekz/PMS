<?php
// Functions
function pms_get_page()
	{
	global $page;
	if (isset($_GET['error']))
	{
	if ($_GET['error'] == 404)
		{
		echo "Reguested file not found. <br />";
		}
	if ($_GET['error'] == 403)
		{
 		echo "You aren´t allowed to visit this page. <br />";
 		}
 	}
	elseif(isset($_GET['page']))
		{
		include("pages/" . $page);
		}
	}
function pms_get_menu() //Obsolete
	{
	global $pms_domain;
	$pages = array_diff(scandir("pages/"), array('..', '.'));
	// array_diff puts out "." and ".." on Linux
	foreach($pages as $value) 
		{
		$value = str_replace(".php", "", $value);
		$value[0] = strtoupper($value[0]);
		$value_low = preg_replace('/\s+/', '', strtolower($value));
		echo "<li "; if($_GET['page'] == $value_low){echo "class=\"active\"";} 
		if ($value_low == "home"){echo "><a class=\"effect\" href=\"http://" . $pms_domain . "/\">" . $value . "</a></li>";} 
		else {echo "><a class=\"effect\" href=\"http://" . $pms_domain . "/index.php?page=" . $value_low . "\">" . $value . "</a></li>";}
		}
	}
/*function pms_get_pages()
	{
	TODO!
	}
*/
function pms_contact_write($mail, $text)
{
  $mail = htmlspecialchars($mail);
  $mail = str_replace("+++", "", $mail);
  $text = nl2br(htmlspecialchars($text));
  $text = str_replace("+++", "", $text);
  $i = 0;
  $check = 0;
  foreach ($text as $text[$i])
  	{
  	if ($text[$i] == "+")
  		{
  		$check++;
  		}
  	$i++;
  	}
if ($check >= 3)
	{
	return 0;
	}
else
  	{
  	$fp = fopen("admin/msg.txt", "a");
  	$write = $mail . "+++" . $text . "+++" . time() . "\n";
	if (fwrite($fp, $write))
	{return 1;}
	else {return 0;}
	fclose($fp);
	}
}
?>