<a href="#" class="scrollup"><img src="<?php echo "themes/" . $pms_theme; ?>/img/scroll.png" alt="ScrollUp"></a>
<div class="footer">
<br/>
<?php
if ($pms_google_plus != "0")
  {echo "<a href=\"" . $pms_google_plus . "\" target=\"_blank\"><img src=\"themes/" . $pms_theme . "/img/gp.png\" alt=\"Google_Plus_Icon\"></a> ";}
if ($pms_facebook != "0")
  {echo "<a href=\"" . $pms_facebook . "\" target=\"_blank\"><img src=\"themes/" . $pms_theme . "/img/fb.png\" alt=\"Facebook_Icon\"></a> ";}
if ($pms_twitter != "0")
  {echo "<a href=\"" . $pms_twitter . "\" target=\"_blank\"><img src=\"themes/" . $pms_theme . "/img/twitter.png\" alt=\"Twitter_Icon\"></a> ";}
  ?>
  </div>
<!-- Javascript at the end of file -->
<script type="text/javascript" src="<?php echo "themes/" . $pms_theme . "/js/jquery-1.10.2.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo "themes/" . $pms_theme . "/js/bootstrap-dropdown.js"; ?>"></script>
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
</body>
