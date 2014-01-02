<a href="#" class="scrollup" onfocus="if(this.blur)this.blur()"><img src="<?php echo "themes/" . $pms_theme; ?>/img/scroll.png" alt="ScrollUp"></a>
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