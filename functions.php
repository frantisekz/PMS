<?php
function pms_jquery1()
{
	global $pms_domain;
	echo "<script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>\n";
}
function pms_jquery2()
{
	global $pms_domain;
	echo "<script src=\"//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js\"></script>\n";
}
function pms_lightbox()
{
	global $pms_domain;
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://" . $pms_domain . "/lightbox/css/lightbox.css\">\n";
	echo "<script type=\"text/javascript\" src=\"http://" . $pms_domain . "/lightbox/js/lightbox-2.6.min.js\"></script>\n";
}
function pms_bootstrap3()
{
	global $pms_domain;
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://" . $pms_domain . "/bootstrap/3/css/bootstrap.css\">\n";
	echo "<script type=\"text/javascript\" src=\"http://" . $pms_domain . "/bootstrap/3/js/bootstrap.min.js\"></script>\n";
}


function pms_get_page()
{
	global $page;
	if (isset($_GET['error']))
	{
		switch($_GET['error']) {
			case 404:
				echo "Reguested file not found. <br />";
				break;
			case 403:
				echo "You aren´t allowed to visit this page. <br />";
				break;
			default:
				echo "Loading this page ended with error " . $_GET['error'] . ".<br />";
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
	$fp = fopen("admin/count.txt", "r");
	$count = fgets($fp, 200);
	fclose($fp);
	$count = $count + 1;
	$fp = fopen("admin/count.txt", "w");
	fwrite($fp, $count);
	fclose($fp);

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