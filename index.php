<?php
$menu = array();
include_once('config.php');
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
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="img/favicon.gif" />
<?php
echo "<meta author=\"" . $pms_pageauthor . "\">\n";
echo "<title>" . $pms_pagetitle . "</title>\n";
if ($pms_robots == 0)
  {
  echo "<meta name=\"robots\" content=\"noindex,nofollow\">\n";
  }
if ($pms_zopim != 0){
echo $pms_zopim;}
?>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<!-- Let IE 8 support html5 -->
<!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="tpanel">
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
  </div>
    <div class="navbar">
    <ul class="nav navbar-nav">
	<?php
foreach($menu as $value) {
  echo "<li "; if($_GET['page'] == preg_replace('/\s+/', '', strtolower($value))){echo "class=\"active\"";} echo "><a class=\"effect\" href=\"index.php?page=" . preg_replace('/\s+/', '', strtolower($value)) . "\">" . $value . "</a></li>";
}
	?>
    </ul>
    </div>
</div>
</nav>
</div>
<div class="break"></div><div class="break"></div>
<img src="img/featured-image.png">
<div class="break"></div>
<a href="#" class="scrollbot">Scroll down</a> 
<div class="body">
<div class="padfix">
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
  include("page-" . $page);
  }
?>
</div>
</div>
<div class="footer">
<?php
if ($google_plus != "0")
  {echo "<a href=\"" . $google_plus . "\" target=\"_blank\"><img src=\"../img/gp.png\" alt=\"Google_Plus_Icon\"></a> ";}
if ($facebook != "0")
  {echo "<a href=\"" . $facebook . "\" target=\"_blank\"><img src=\"../img/fb.png\" alt=\"Facebook_Icon\"></a> ";}
if ($twitter != "0")
  {echo "<a href=\"" . $twitter . "\" target=\"_blank\"><img src=\"../img/twitter.png\" alt=\"Twitter_Icon\"></a> ";}
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
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
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
