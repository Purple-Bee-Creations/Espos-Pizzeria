<div id="featured_slider">
	<div class="slider_wrapper slider_stretched"> 
		<?php 
		
		$slider = get_option( 'atp_customslider' ); 
		echo do_shortcode($slider); 
		?>
	</div>
</div>