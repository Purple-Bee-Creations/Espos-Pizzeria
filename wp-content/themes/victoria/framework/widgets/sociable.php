<?php
/**
 * Plugin Name: Sociable Widget
 * Description: A widget used for displaying Sociable.
 * Version: 1.0
 * Author: Fem Khan
 * Author URI: http://www.aivahthemes.com
 *
 */
	// Register Widget 
	function sociable_widgets() {
		register_widget( 'sociable_widget' );
	}

	// Define the Widget as an extension of WP_Widget
	class sociable_widget extends WP_Widget {
		/* constructor */
		function sociable_widget() {
			
			/* Widget settings. */
			$widget_ops = array( 
				'classname'		=> 'sociable_widget',
				'description'	=> __('Sociable widget for sidebar.', 'ATP_ADMIN_SITE')
			);
	
			/* Widget control settings. */
			$control_ops = array(
				'width'		=> 300,
				'height'	=> 350,
				'id_base'	=> 'sociable_widget'
			);

			/* Create the widget. */
			$this->WP_Widget( 'sociable_widget',THEMENAME.' - Sociable', $widget_ops, $control_ops );
		}

		// outputs the content of the widget
		function widget( $args, $instance ) {
			extract( $args );

			/* Our variables from the widget settings. */
			$title = $instance['title'];

			
			/* Before widget (defined by themes). */
			echo $before_widget;
			/* Title of widget (before and after defined by themes). */
			if ($title) :
			echo $before_title.$title.$after_title;
			endif;
			echo atp_social();
			
			/* After widget (defined by themes). */
			echo $after_widget;
		}
		
		//processes widget options to be saved
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['title'] = strip_tags( $new_instance['title'] );

			return $instance;
		}
		
		// outputs the options form on admin
		function form( $instance ) {
			/* Set up some default widget settings. */
			$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
			$title = strip_tags($instance['title']);		
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'Title' ); ?>"><?php _e('Title:', 'ATP_ADMIN_SITE'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" style="width:100%;" />
			</p>
		<?php 
		} 
	} 
	/* Add our function to the widgets_init hook. */
	add_action( 'widgets_init', 'sociable_widgets' );
?>
