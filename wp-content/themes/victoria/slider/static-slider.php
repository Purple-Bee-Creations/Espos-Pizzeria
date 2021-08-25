<div id="featured_slider">
	<div class="slider_wrapper staticslider">
		<?php
		$src = get_option("atp_static_image_upload");
		$height = get_option("atp_static_image_height") ? get_option("atp_static_image_height"):'400';
		$link = get_option("atp_static_link");
			
			echo '<figure>';
			if($link!="") { echo '<a href='.$link.'>'; }
			echo atp_resize('',$src,'1020',$height,'','');
			if($link!="") { echo '</a>'; }
			echo '</figure>';
			
		?>		
	</div><!-- .slider_wrapper -->
</div><!-- #featured_slider -->