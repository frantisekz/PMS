<?php
$debug_enabled = "1"; // Debug enabled if config.php isn't present
include_once('config.php');
include_once('functions.php');
$page = $_GET['page'] . ".php";
$pagename = $_GET['page'];
if ($debug_enabled == 0)
  {
  error_reporting(0);
  }
else
  {
  $time = microtime();
  $time = explode(' ', $time);
  $time = $time[1] + $time[0];
  $start = $time;
  }
$con = mysqli_connect($server,$login,$pass);
if ((!$con) && ($pagename != "install"))
  {
  echo "<strong>There is a problem with database, please check config.php or run <a href=\"index.php?page=install\">install</a>...</strong><br/>";
  }
mysqli_query($con, "USE $database");
mysqli_query($con, "SET CHARACTER SET utf8");
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="img/favicon.gif" />
<?php
echo "<meta author=\"" . pms_pageauthor() . "\">\n";
echo "<title>" . pms_pagetitle() . "</title>\n";
if (pms_robots() == 0)
  {
  echo "<meta name=\"robots\" content=\"noindex,nofollow\">\n";
  }
echo pms_zopim();
?>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
</head>
<body>
<div class="tpanel">
    <div class="navbar">
    <div class="navbar-inner">
    <ul class="nav">
	<?php
$menu = mysqli_query($con, "SELECT * FROM menu");
	if(!$menu) {
	// Nothing found?
}
	while($row = mysqli_fetch_array($menu))
	{
	echo "<li "; if($_GET['stranka'] == $row['id']){echo "class=\"active\"";} echo "><a class=\"effect\" href=\"" . $row['link'] . "\">" . $row['name'] . "</a></li>";
	}
	?>
    </ul>
    </div>
    </div>
</div>
<div class="break"></div><div class="break"></div>
<img src="img/featured-image.png">
<div class="break"></div>
<a href="#" class="scrollbot">Scroll down</a> 
<div class="body">
<?php
if ($_GET['error'] == 404)
  {
echo "Reguested file not found. <br />";
  }
if ($_GET['error'] == 403)
  {
  echo "You aren´t allowed to visit this page. <br />";
  }
elseif(isset($_GET['page']))
  {
  if($pagename == "install")
  {
  include('install.php');
  }
  else
  {
  echo pms_page_content();
  }
  }
?>
</div>
<div class="paticka">
<?php
$google_plus = mysqli_query($con, "SELECT * FROM config WHERE name LIKE 'google_plus'");
$row = mysqli_fetch_array($google_plus);
if ($row['value'] != "0")
  {echo "<a href=\"" . $row['value'] . "\" target=\"_blank\"><img src=\"../img/gp.png\" alt=\"Google_Plus_Icon\"></a> ";}
unset($row);
$facebook = mysqli_query($con, "SELECT * FROM config WHERE name LIKE 'facebook'");
$row = mysqli_fetch_array($facebook);
if ($row['value'] != "0")
  {echo "<a href=\"" . $row['value'] . "\" target=\"_blank\"><img src=\"../img/fb.png\" alt=\"Facebook_Icon\"></a> ";}
unset($row);
$twitter = mysqli_query($con, "SELECT * FROM config WHERE name LIKE 'twitter'");
$row = mysqli_fetch_array($twitter);
if ($row['value'] != "0")
  {echo "<a href=\"" . $row['value'] . "\" target=\"_blank\"><img src=\"../img/twitter.png\" alt=\"Twitter_Icon\"></a> ";}
unset($row);
mysqli_close($con);
if ($debug_enabled == 1)
  {
  $time = microtime();
  $time = explode(' ', $time);
  $time = $time[1] + $time[0];
  $finish = $time;
  $total_time = round(($finish - $start), 4);
  echo "<br/><strong>Debugging enabled!</strong>; page generated in " . $total_time . " seconds.";
  }
?>
<br/>
<a href="#" class="scrollup">Scroll up</a> 
</div>
<!-- Javascript at the end of file -->
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
<script type="text/javascript">
$(document).ready(function() {
						   
	var hash = window.location.hash.substr(1);
	var href = $('#nav li a').each(function(){
		var href = $(this).attr('href');
		if(hash==href.substr(0,href.length-5)){
			var toLoad = hash+'.html #content';
			$('#content').load(toLoad)
		}											
	});

	$('#nav li a').click(function(){
								  
		var toLoad = $(this).attr('href')+' #content';
		$('#content').hide('fast',loadContent);
		$('#load').remove();
		$('#wrapper').append('<span id="load">LOADING...</span>');
		$('#load').fadeIn('normal');
		window.location.hash = $(this).attr('href').substr(0,$(this).attr('href').length-5);
		function loadContent() {
			$('#content').load(toLoad,'',showNewContent())
		}
		function showNewContent() {
			$('#content').show('normal',hideLoader());
		}
		function hideLoader() {
			$('#load').fadeOut('normal');
		}
		return false;
		
	});

});
</script>
<script type="text/javascript">
    $(document).ready(function(){
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
 
    });
</script>
<script type="text/javascript">
$(function() {
        var $elem = $('html, body');
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollbot').fadeOut();
            } else {
                $('.scrollbot').fadeIn();
            }
        }); 
         $('.scrollbot').click(
        function (e) {
            $('html, body').animate({scrollTop: $elem.height()}, 800);
        }
    );
    });
</script>
</body>
