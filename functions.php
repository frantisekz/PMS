<?php
function pms_jquery1()
{
	global $pms_domain;
	$pms_jquery_1 = "/jquery-1.10.2.min.js";
	echo "<script type=\"text/javascript\" src=\"http://" . $pms_domain . $pms_jquery_1 . "\"></script>\n";
	$pms_jquery_called = 1;
}
function pms_lightbox()
{
	global $pms_domain;
	if ((isset($pms_jquery_called)) AND ($pms_jquery_called != 1))
		{pms_jquery_1();}
	$pms_lightbox = "/lightbox/";
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://" . $pms_domain . $pms_lightbox . "css/lightbox.css\">\n";
	echo "<script type=\"text/javascript\" src=\"http://" . $pms_domain . $pms_lightbox . "js/lightbox-2.6.min.js\"></script>\n";
}
function pms_bootstrap30()
{
	global $pms_domain;
	$pms_bootstrap30 = "/bootstrap/30/";
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://" . $pms_domain . $pms_bootstrap30 . "css/bootstrap.css\">\n";
	echo "<script type=\"text/javascript\" src=\"http://" . $pms_domain . $pms_bootstrap30 . "js/bootstrap.min.js\"></script>\n";
}
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
	else
	{
		include("pages/home.php");
	}
}
function pms_get_menu() //Obsolete
{
	global $pms_domain;
	global $pagename;
	$pages = array_diff(scandir("pages/"), array('..', '.', 'home.php'));
	// array_diff puts out "." and ".." on Linux
	echo "<li "; if($pagename == "home"){echo "class=\"active\"";} echo "><a class=\"effect\" href=\"http://" . $pms_domain . "/\">Home</a></li>";
	foreach($pages as $value) 
	{
		$value = str_replace(".php", "", $value);
		$value[0] = strtoupper($value[0]);
		$value_low = preg_replace('/\s+/', '', strtolower($value));
		echo "<li "; if($pagename == $value_low){echo "class=\"active\"";} 
		echo "><a class=\"effect\" href=\"http://" . $pms_domain . "/index.php?page=" . $value_low . "\">" . $value . "</a></li>";
	}
}
/*function pms_get_pages()
	{
	TODO!
	}
*/
function pms_viewcount()
{
	if (!isset($_SESSION['count']))
	{
		$fp = fopen("count.txt", "r");
		$count = fgets($fp, 200);
		fclose($fp);
		$count = $count + 1;
		$fp = fopen("count.txt", "w");
		fwrite($fp, $count);
		fclose($fp);
		$_SESSION['count'] = 1;
	}
}
function pms_contact_write($mail, $text)
{
	$mail = htmlspecialchars($mail);
	$mail = str_replace("+++", "", $mail);
	$text = nl2br(htmlspecialchars($text));
	$text = str_replace("+++", "", $text);
  	$fp = fopen("msg.txt", "a");
  	$write = $mail . "+++" . $text . "+++" . time() . "\n";
	if (fwrite($fp, $write))
	{return 1;}
	else {return 0;}
	fclose($fp);	
}
?>