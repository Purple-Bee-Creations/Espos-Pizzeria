<?php
/**
 * Plugin Name: Recent Posts Widget
 * Description: A widget used for displaying recent posts.
 * Version: 1.0
 * Author: Fem Khan
 * Author URI: http://www.aivahthemes.com
 *
 */
	// Register Widget 
	function recentpost_widgets() {
		register_widget( 'recentpost_widgets' );
	}

	// Define the Widget as an extension of WP_Widget
	class recentpost_widgets extends WP_Widget {
		/* constructor */
		function recentpost_widgets() {
				
			

			/* Widget settings. */
			$widget_ops = array(
				'classname'		=> 'widget_postslist',
				'description'	=> __('Use this widget to display Recent Posts, Thumbnail Enable/Disable.', 'ATP_ADMIN_SITE')
			);

			/* Widget control settings. */
			$control_ops = array(
				'width'		=> 300,
				'height'	=> 350,
				'id_base'	=> 'recentpost_widget'
			);

			/* Create the widget. */
			$this->WP_Widget( 'recentpost_widget',THEMENAME.' - Recent Posts', $widget_ops, $control_ops );
		}

		// outputs the content of the widget
		function widget( $args, $instance ) {
			extract( $args );

			/* Our variables from the widget settings. */
			$recentpost_imagedisable = $instance['recentpost_imagedisable'];
			$recentpost_limits = $instance['recentpost_limits'];
			$title = $instance['recentpost_title'];
			$recentpost_excludecategory=$instance['recentpost_excludecategory'];
			$recentpost_select = $instance['recentpost_select'];
			$recentpost_description_length = $instance['recentpost_description_length'];
			
			/* Before widget (defined by themes). */
			echo $before_widget;
			/* Title of widget (before and after defined by themes). */
			if($title) :
			echo $before_title.$title.$after_title;
			endif;
			
			global $post, $wpdb;
			$recentpost =get_posts("cat=$recentpost_excludecategory&numberposts=$recentpost_limits&offset=0"); 
			echo "<ul>";
			foreach($recentpost as $post) {
				echo '<li>'; 
				$recentpost_image = get_post_meta($post->ID, 'post_image', true);
				$post_date = $post->post_date;
				$post_date = mysql2date('F jS, Y', $post_date, false);
				$recentpost_content= wp_html_excerpt($post->post_content,$recentpost_description_length);
				if($recentpost_imagedisable != "true") {
					$thumb = get_post_thumbnail_id($post->ID); 
					if ($thumb ){
						$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
						?>
						<div class="thumb"><a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title ?>"> 
						<?php echo atp_resize($post->ID,'','50','50','img_border',''); ?>
						</a>
						</div>
					<?php 
					}else{ 
						
					}
				}  ?>
				<div class="pdesc">
					<a class="title" href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title ?>"> <?php echo $post->post_title ?></a>
					<?php if($recentpost_select == 'time'):?>
						<div class="w-postmeta">
						<?php echo $post_date; ?>
					<?php else:?>
						<p><?php echo $recentpost_content; ?>...</p>
					<?php endif;//end Description Length ?>
				</div>
				<?php echo "</li>";
			}
			echo "</ul>";
			/* After widget (defined by themes). */
			echo $after_widget;
		}
		
		//processes widget options to be saved
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['recentpost_title'] = strip_tags($new_instance['recentpost_title']);
			$instance['recentpost_imagedisable'] = strip_tags($new_instance['recentpost_imagedisable']);
			$instance['recentpost_limits'] = strip_tags( $new_instance['recentpost_limits'] );
			$instance['recentpost_excludecategory'] = strip_tags($new_instance['recentpost_excludecategory']);
			$instance['recentpost_select'] = strip_tags($new_instance['recentpost_select']);
			$instance['recentpost_description_length'] = strip_tags($new_instance['recentpost_description_length']);
			return $instance;
		}

		// outputs the options form on admin
		function form( $instance ) {
			/* Set up some default widget settings. */
				$instance = wp_parse_args( (array) $instance, array( 'recentpost_title' => '','recentpost_imagedisable' => '') );
			$recentpost_select = isset( $instance['recentpost_select'] ) ? $instance['recentpost_select'] : 'time';	
			if ( !isset($instance['recentpost_description_length']) || !$recentpost_description_length = (int) $instance['recentpost_description_length'] )
			$recentpost_description_length = 60;
			if ( !isset($instance['recentpost_limits']) || !$recentpost_limits = (int) $instance['recentpost_limits'] )
			$recentpost_limits = 3;
			$recentpost_excludecategory= isset($instance['recentpost_excludecategory']) ? $instance['recentpost_excludecategory'] : '';
			$title= isset($instance['recentpost_title']) ? strip_tags($instance['recentpost_title']) : '';
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'recentpost_title' ); ?>"><?php _e('Title:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'recentpost_title' ); ?>" name="<?php echo $this->get_field_name( 'recentpost_title' ); ?>" value="<?php echo $title; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'recentpost_select' ); ?>"><?php _e('Extra Information:', 'ATP_ADMIN_SITE'); ?></label>
				<select id="<?php echo $this->get_field_id( 'recentpost_select' ); ?>" name="<?php echo $this->get_field_name( 'recentpost_select' ); ?>">
					<option value="time" <?php selected($recentpost_select,'time');?>>Time</option>
					<option value="description" <?php selected($recentpost_select,'description');?>>Description</option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'recentpost_description_length' ); ?>"><?php _e('Length of Description to show::', 'ATP_ADMIN_SITE'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'recentpost_description_length' ); ?>" name="<?php echo $this->get_field_name( 'recentpost_description_length' ); ?>" value="<?php echo $recentpost_description_length; ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'recentpost_limits' ); ?>"><?php _e('Number of posts to show:', 'ATP_ADMIN_SITE'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'recentpost_limits' ); ?>" name="<?php echo $this->get_field_name( 'recentpost_limits' ); ?>" value="<?php echo $recentpost_limits; ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'recentpost_excludecategory' ); ?>"><?php _e('Exclude Categories <small>2,3,25</small>', 'ATP_ADMIN_SITE'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'recentpost_excludecategory' ); ?>" name="<?php echo $this->get_field_name( 'recentpost_excludecategory' ); ?>" value="<?php echo $recentpost_excludecategory; ?>" style="width:100%;" />
			</p>
			<p>
				<input type="checkbox" value="true" id="<?php echo $this->get_field_id( 'recentpost_imagedisable' ); ?>" name="<?php echo $this->get_field_name( 'recentpost_imagedisable' ); ?>" <?php  if( $instance['recentpost_imagedisable']=="true") { echo "checked"; } ?> class="checkbox" /> <label for="<?php echo $this->get_field_id( 'recentpost_imagedisable' ); ?>"><?php _e('Disable Post Thumbnail?', 'ATP_ADMIN_SITE'); ?></label>
			</p>
		<?php 
		}
	}

	/* Add our function to the widgets_init hook. */
	add_action( 'widgets_init', 'recentpost_widgets' );

	wp_reset_query();
	
 ?>