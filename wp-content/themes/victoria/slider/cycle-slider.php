<?php 
wp_enqueue_style('cycle-css', THEME_CSS . '/cycle_slider.css');
wp_enqueue_script('atp-cycle-slider', THEME_URI.'/js/cycle_slider.js','','','');
$slidelimit = get_option('atp_cycleslidelimit');
global $readmoretxt;
?>
<div id="featured_slider">
	<div class="slider_wrapper">
		<div class="sys_slider">
			<div class="slideshow">
<?php
				
				query_posts("post_type=slider&showposts=$slidelimit&orderby=menu_order&order=ASC");

				while (have_posts()) : the_post();
				$align_options = get_post_meta($post->ID,"slider_alignoptions",true);
				$item_desc=do_shortcode(get_post_meta($post->ID,'item_desc',true));
				$postlinktype_options = get_post_meta($post->ID, "postlinktype_options", true);
				$postlinkurl = atp_generator('atp_getPostLinkURL',$postlinktype_options);
				
				switch($align_options){ 
					case "full":
						echo '<div class="clearfix"><div class="full">';
						echo'<div class="holder loader">';
						echo'<figure><a href="'.$postlinkurl.'"  >';
						echo atp_resize($post->ID,'','1020','360','image','');
						echo '</figure></a>';
						echo '</div>';
						echo '</div></div>';
						break;
					case "partialleft":
						echo '<div class="clearfix halfslide"><div class="descleft">'; ?>
						<h1><?php the_title(); ?></h1>
						<p><?php the_content(); ?></p>
						<p><a class="button medium"  href="<?php $postlinkurl ?>"><span><?php echo $readmoretxt; ?></span></a></p><?php
						echo'</div>';
						echo'<div class="half">';
						echo'<div class="holder loader">';
						echo '<a href="'.$postlinkurl.'"  >';
						echo atp_resize($post->ID,'','560','360','image','');
						echo '</a>';
						echo '</div>';
						echo '</div></div>';
						break;
					case "partialright":
						echo '<div class="clearfix halfslide"><div class="half">';
						echo '<div class="holder loader">';
						echo '<a href="'.$postlinkurl.'"  >';
						echo atp_resize($post->ID,'','560','360','image','');
						echo '</a>';
						echo '</div>';
						echo '</div>';
						echo '<div class="descright">'; ?>
						<h1><?php the_title(); ?></h1>
						<p><?php the_content(); ?></p>
						<p><a class="button medium" href="<?php echo $postlinkurl ?>"><span><?php echo $readmoretxt; ?></span></a></p><?php	
						echo '</div></div>';
						break;
					default:
					echo '<div class="clearfix"><div class="full">';
						echo'<div class="holder loader">';
						echo'<a href="'.$postlinkurl.'"  >';
						echo atp_resize($post->ID,'','1020','360','image','');
						echo '</a>';
						echo '</div>';
						echo '</div></div>';
						break;
				}
				endwhile; ?> 
			</div><!-- .slideshow -->
		</div><!-- .sys_slider -->
	</div><!-- .slider_wrapper -->
</div><!-- #featured_slider -->