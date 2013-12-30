<div class="admin">
<div class="padfix">
<strong>Welcome back ;)</strong><br/>
<a href="index.php?logout&refresh">Logout</a><br/>
<h2>Settings:</h2>
<?php
echo "Page author: " . $pms_pageauthor . "<br/>";
echo "Page title: " . $pms_pagetitle . "<br/>";
echo "Page domain: " . $pms_domain . "<br/>";
echo "Google+ url is set to: "; if($pms_google_plus == "0"){echo "Disabled<br/>";} else {echo "<a href=\"" . $pms_google_plus . "\">" . $pms_google_plus . "</a><br/>";}
echo "Facebook url is set to: "; if($pms_facebook == "0"){echo "Disabled<br/>";} else {echo "<a href=\"" . $pms_facebook . "\">" . $pms_facebook . "</a><br/>";}
echo "Twitter url is set to: "; if($pms_twitter == "0"){echo "Disabled<br/>";} else {echo "<a href=\"" . $pms_twitter . "\">" . $pms_twitter . "</a><br/>";}
if ($pms_robots == 1){echo "Robots are allowed to access this page!<br/>";} else{echo "Robots are not allowed to access this page!<br/>";}
if ($pms_debug_enabled == 1){echo "Debug mode is on!<br/>";} else{echo "Debug mode is off!<br/>";}
echo "<h2>Pages:</h2>";
echo "";
$page = $_POST['pname'] . ".php";
$handle = fopen($page, 'w'); 
foreach(pms_get_pages() as $value) 
		{
		$value = str_replace(".php", "", $value);
		$value[0] = strtoupper($value[0]);
		echo $value . "<br/>";
		}
echo "<h2>Stats:</h2>";

echo "<h2>Messages:</h2>";

$file = file("msg.txt"); 
foreach($file as $line) 
{ $element=explode("+++",$line); 
echo wordwrap($element[0], 80, " ",1) . "<br/>";
echo wordwrap($element[1], 80, " ",1) . "<br/>";
echo "<br/><br/>";
}

?>
</div>
</div>