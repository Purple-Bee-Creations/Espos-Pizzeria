<?php 
$slidelimit = get_option('atp_flexslidelimit') ? get_option('atp_flexslidelimit') : '3';
$slidespeed = get_option('atp_flexslidespeeds') ? get_option('atp_flexslidespeeds') : '3000';
$slideffect = get_option('atp_flexslideffect') ? get_option('atp_flexslideffect') : 'fade';
$slidecnav = get_option('atp_flexslidecnav') ? get_option('atp_flexslidecnav') : 'false';
$slidednav = get_option('atp_flexslidednav') ? get_option('atp_flexslidednav') : 'true';
$slidercaption = get_option('atp_flexslidecaption') ? get_option('atp_flexslidecaption') : 'false';
?>
<div id="featured_slider">
	<div class="slider_wrapper">
		<div class="flexslider">
			<ul class="slides">
			<?php
			echo '<script type="text/javascript">
			jQuery(document).ready(function($) {
				jQuery(".flexslider").flexslider({
					animation: "'.$slideffect.'",				//String: Select your animation type, "fade" or "slide"
					controlsContainer: ".flex-container",
					slideshow: true,				//Boolean: Animate slider automatically
					slideshowSpeed: '.$slidespeed.',//Integer: Set the speed of the slideshow cycling, in milliseconds
					animationDuration: 400,		//Integer: Set the speed of animations, in milliseconds
					directionNav: '.$slidednav.',				//Boolean: Create navigation for previous/next navigation? (true/false)
					controlNav: false,				//Boolean: Create navigation for paging control of each clide? Note: Leave true for	
					start: function(slider) {
						jQuery(".total-slides").text(slider.count);
					},
					after: function(slider) {
						jQuery(".current-slide").text(slider.currentSlide);
					}
				});
			});	
			</script>';
			query_posts("post_type=slider&posts_per_page=$slidelimit&orderby=menu_order&order=ASC");
			while (have_posts()) : the_post();
				$postlinktype_options = get_post_meta($post->ID, "postlinktype_options", true);
				$postlinkurl = atp_generator('atp_getPostLinkURL',$postlinktype_options);
				echo '<li>';
				if ($postlinkurl != 'default' ) {
					echo '<figure><a href="'.$postlinkurl.'"  >'.atp_resize($post->ID,'','1020','360','image','').'</a></figure>'; 
				}else {
					echo '<figure>'.atp_resize($post->ID,'','1020','360','image','').'</figure>'; 
				}
				
				?>			
				<div class="flex-caption">
					<div class="flex-title"><h1><?php the_title();?></h1>
					<p><?php echo wp_html_excerpt(get_the_excerpt(''),120); ?></p>
					</div>
				</div>
				<?php
			echo '</li>';
		endwhile; ?> 
		</ul>
		</div><!-- .flex_slider -->
	</div><!-- .slider_stretched -->
</div><!-- #featured_slider -->