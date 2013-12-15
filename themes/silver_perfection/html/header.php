<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="shortcut icon" href="http://<?php echo $pms_domain;?>/favicon.gif" />
<meta name="author" content="<?php echo $pms_pageauthor;?>">
<meta name="keywords" content="<?php echo $pms_keywords;?>">
<meta name="description" content="<?php echo $pms_description;?>">
<title><?php echo $pms_pagetitle;?></title>
<?php
if ($pms_robots == 0)
  {
  echo "<meta name=\"robots\" content=\"noindex,nofollow\">\n";
  }
?>
<link rel="stylesheet" type="text/css" href="<?php echo "themes/" . $pms_theme . "/css/styles.css"; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo "themes/" . $pms_theme . "/css/bootstrap.css"; ?>">
<!-- Let IE 8 support html5 -->
<!--[if lt IE 9]>
      <script src="<?php echo "themes/" . $pms_theme . "/js/html5shiv.js"; ?>"></script>
      <script src="<?php echo "themes/" . $pms_theme . "/js/respond.min.js"; ?>"></script>
<![endif]-->
</head>
<body>
<header class="navbar navbar-fixed-top" role="banner">
<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
  </div>
    <div class="navbar">
    <ul class="nav navbar-nav">
	<?php
	    pms_get_menu();
	?>
    </ul>
    </div>
</nav>
</header>
<div class="header">
<h1 class="head"><?php echo $pms_pagetitle; ?></h1>
<h2 class="head"><?php echo $pms_description; ?></h2>
</div>