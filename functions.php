<?php
function pms_pageauthor()
{
global $con;
$author = mysqli_query($con, "SELECT * FROM config WHERE name LIKE 'author'");
$row = mysqli_fetch_array($author);
$return = $row['value'];
return $return;
}
function pms_pagetitle()
{
global $con;
$title = mysqli_query($con, "SELECT * FROM config WHERE name LIKE 'title'");
$row = mysqli_fetch_array($title);
$return = $row['value'];
return $return;
}
function pms_robots()
{
global $con;
$robots = mysqli_query($con, "SELECT * FROM config WHERE name LIKE 'robots_allowed'");
$row = mysqli_fetch_array($robots);
$return = $row['value'];
return $return;
}
function pms_zopim()
{
global $con;
$zopim = mysqli_query($con, "SELECT * FROM config WHERE name LIKE 'zopim'");
$row = mysqli_fetch_array($zopim);
$return = $row['value'];
return $return;
}
function pms_page_content()
{
global $con;
global $pagename;
$content = mysqli_query($con, "SELECT * FROM pages WHERE name LIKE '$pagename'");
$row = mysqli_fetch_array($content);
$return = $row['content'];
return $return;
}
?>
