<a id="toTop" href="#" style="display: inline;"><span id="toTopHover" style="opacity: 0;"></span>To Top</a>
<div class="footer">
<br/>
</div>
<!-- Javascript at the end of file -->
<script type="text/javascript" src="<?php echo $theme_path . "js/jquery-1.10.2.min.js"; ?>" /></script>
<script type="text/javascript" src="<?php echo $theme_path . "js/bootstrap-dropdown.js"; ?>" /></script>
<script type="text/javascript" src="<?php echo $theme_path . "js/jquery.ui.totop.js"; ?>" /></script>
<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
</body>
