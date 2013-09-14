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
?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_path . "css/styles.css"; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $theme_path . "css/bootstrap.css"; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $theme_path . "css/ui.totop.css"; ?>" />
<!-- Let IE 8 support html5 -->
<!--[if lt IE 9]>
      <script src="<?php echo $theme_path . "js/html5shiv.js"; ?>" /></script>
      <script src="<?php echo $theme_path . "js/respond.min.js"; ?>" /></script>
<![endif]-->
</head>
<body>
<header class="navbar navbar-fixed-top" role="banner">
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
    <div class="navbar">
    <ul class="nav navbar-nav">
	<?php
get_menu();
	?>
    </ul>
    </div>
</nav>
</header>
<div class="break"></div>