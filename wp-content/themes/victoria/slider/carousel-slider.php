<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/carousel-slider.css"/>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.contentcarousel.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#ca-container').contentcarousel();
});
</script>
<?php $args = array('post_type' => 'menus'); ?>
	<div id="featured_slider">
		<div class="slider_wrapper">
			<div id="ca-container" class="ca-container">
				<div class="ca-wrapper">
				<?php $i=1; $k=4;
				
					$query = new WP_Query( $args );
					while ($query->have_posts()) : $query->the_post();
					$post_title = get_the_title($post->ID);
					global $readmoretxt, $more; $more = 0; 
					$item_desc = do_shortcode(get_post_meta($post->ID,'item_desc',true));
					$item_price = get_post_meta($post->ID,'price',TRUE);
					$out='<div class="ca-item ca-item'.$i.'">';	
					$out.='<div class="ca-item-main">';
					if (has_post_thumbnail($post->ID)) { $out .=atp_resize($post->ID,'','316','220','',''); }
					$out.='<div class="item_title">';
					$out.='<h3><a href="'.get_permalink().'">'.$post_title.'</a></h3>';
					$out.='<div class="item_desc">'.substr($item_desc,0,150).'</div>';	
					if($item_price) {
					$out.='<span class="price">'.$item_price.'</span>';
					}
					$out.='</div>';
					$out.='<a href="#" class="ca-more">&rarr;</a>';
					$out.='</div>';
					$out.='<div class="ca-content-wrapper">';
					$out.='<div class="ca-content">';
					$out.='<h2>'.$post_title.'</h2>';
					ob_start();
					echo '<p>';
					the_content($readmoretxt);
					echo '</p>';
					$out.= ob_get_clean();
					$out.='</div>';
					$out.='<a href="#" class="ca-close">x</a>';
					$out.='</div>';
					$out.='</div>';
					echo $out;
					
					$i++; $k--; endwhile; ?>
				</div><!-- .ca-wrapper-->
			</div><!-- #ca-container-->
		</div><!-- #slider_wrapper-->

	</div><!-- #featured_slider -->
<?php wp_reset_query();?>