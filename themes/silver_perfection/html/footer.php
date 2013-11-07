<a href="#" class="scrollup"><img src="<?php echo $theme_path; ?>img/scroll.png"></a>
<div class="footer">
<br/>
<?php
if ($google_plus != "0")
  {echo "<a href=\"" . $google_plus . "\" target=\"_blank\"><img src=\"" . $theme_path . "img/gp.png\" alt=\"Google_Plus_Icon\"></a> ";}
if ($facebook != "0")
  {echo "<a href=\"" . $facebook . "\" target=\"_blank\"><img src=\"" . $theme_path . "img/fb.png\" alt=\"Facebook_Icon\"></a> ";}
if ($twitter != "0")
  {echo "<a href=\"" . $twitter . "\" target=\"_blank\"><img src=\"" . $theme_path . "img/twitter.png\" alt=\"Twitter_Icon\"></a> ";}
?>
  </div>
<!-- Javascript at the end of file -->
<script type="text/javascript" src="<?php echo $theme_path . "js/jquery-1.10.2.min.js"; ?>" /></script>
<script type="text/javascript" src="<?php echo $theme_path . "js/bootstrap-dropdown.js"; ?>" /></script>
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
