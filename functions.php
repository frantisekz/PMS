<?php
function pms_jquery1()
{
	global $pms_domain;
	echo "<script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
\n";
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
function pms_bootstrap3()
{
	global $pms_domain;
	$pms_bootstrap3 = "/bootstrap/3/";
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://" . $pms_domain . $pms_bootstrap3 . "css/bootstrap.css\">\n";
	echo "<script type=\"text/javascript\" src=\"http://" . $pms_domain . $pms_bootstrap3 . "js/bootstrap.min.js\"></script>\n";
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
function pms_get_pages()
{
	global $pms_domain;
	global $pagename;
	$page_home[0] = "Home.php";
	if (isset($_SESSION['pass']))
	{
		$page_others = array_diff(scandir("../pages/"), array('..', '.', 'Home.php'));
	}
	else
	{
		$page_others = array_diff(scandir("pages/"), array('..', '.', 'Home.php'));
	}
	$pages = array_merge($page_home, $page_others);
	$pages = str_replace(".php", "", $pages);
	return $pages;
}
function pms_viewcount()
{
	if (!isset($_SESSION['count']))
	{
		$fp = fopen("admin/count.txt", "r");
		$count = fgets($fp, 200);
		fclose($fp);
		$count = $count + 1;
		$fp = fopen("admin/count.txt", "w");
		fwrite($fp, $count);
		fclose($fp);
		$_SESSION['count'] = 1;
	}
}
function pms_contact_write($mail, $text)
{
	$mail = htmlspecialchars($mail);
	$mail = str_replace("+++", "#", $mail);
	$text = nl2br(htmlspecialchars($text));
	$text = str_replace("+++", "#", $text);
  	$fp = fopen("admin/msg.txt", "a");
  	$write = $mail . "+++" . $text . "+++" . time() . "\n";
	if (fwrite($fp, $write))
	{return 1;}
	else {return 0;}
	fclose($fp);	
}
?>