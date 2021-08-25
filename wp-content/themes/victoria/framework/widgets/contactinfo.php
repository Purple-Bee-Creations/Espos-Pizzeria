<?php
/**
 * Plugin Name: Contact Info Widget
 * Description: A widget used for displaying Contact Info.
 * Version: 1.0
 * Author: Fem Khan
 * Author URI: http://www.aivahthemes.com
 *
 */
	// Register Widget 
	function contactinfo_widgets() {
		register_widget( 'contactinfo_widgets' );
	}
	
	// Define the Widget as an extension of WP_Widget
	class contactinfo_widgets extends WP_Widget {
		/* constructor */
		function contactinfo_widgets() {
			
			
			/* Widget settings. */
			$widget_ops = array(
				'classname'		=> 'contactinfo',
				'description'	=> __('Add Contact Info to your widget  .', 'ATP_ADMIN_SITE')
			);

			/* Widget control settings. */
			$control_ops = array(
				'width'		=> 300,
				'height'	=> 350,
				'id_base'	=> 'contactinfo_widgets'
			);

			/* Create the widget. */
			$this->WP_Widget( 'contactinfo_widgets',THEMENAME.'- Contact Info', $widget_ops, $control_ops );
		}
	
		// outputs the content of the widget
		function widget( $args, $instance ) {
			extract( $args );
			/* Our variables from the widget settings. */
			$title = $instance['contactinfo_title'];
			$syscontact_name = $instance['syscontact_name'];
			$syscontact_address = $instance['syscontact_address'];
			$syscontact_city = $instance['syscontact_city'];
			$syscontact_state = $instance['syscontact_state'];
			$syscontact_zip = $instance['syscontact_zip'];
			$syscontact_phone = $instance['syscontact_phone'];
			$syscontact_email = $instance['syscontact_email'];
			$syscontact_website=$instance['syscontact_website'];
			
			$emailid = '<a href="mailto:'.$syscontact_email.'?Subject=ContactInfo">'.$syscontact_email.'</a>';
		
			/* Before widget (defined by themes). */
			echo $before_widget;
			/* Title of widget (before and after defined by themes). */
			if($title) :
			echo $before_title.$title.$after_title; 
			endif;
			if($syscontact_name){
				echo '<li class="icon-home">'.$syscontact_name.'</li>';
			}
			if($syscontact_address){
				echo '<li class="icon-location">'.$syscontact_address.'</li>';
			}
			if($syscontact_city){
				echo '<li>'.$syscontact_city.'</li>';
			}
			if($syscontact_state){
				echo '<li>'.$syscontact_state.'</li>';
			}
			if($syscontact_zip){
				echo '<li>'.$syscontact_zip.'</li>';
			}
			if($syscontact_phone){
				echo '<li class="icon-phone">'.$syscontact_phone.'</li>';
			}
			if($syscontact_email){
				echo '<li class="icon-email">'.$emailid.'</li>';
			}
			if($syscontact_website){
				echo '<li class="icon-website"><a href="'.esc_url($syscontact_website).'" target="_blank">'.esc_url($syscontact_website).'</a></li>';
			}

			/* After widget (defined by themes). */
			echo $after_widget;
		}
		
		//processes widget options to be saved
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['contactinfo_title'] = strip_tags( $new_instance['contactinfo_title'] );
			$instance['syscontact_name'] = strip_tags( $new_instance['syscontact_name'] );
			$instance['syscontact_city'] = strip_tags( $new_instance['syscontact_city'] );
			$instance['syscontact_address'] = strip_tags( $new_instance['syscontact_address'] );
			$instance['syscontact_state'] = strip_tags( $new_instance['syscontact_state'] );
			$instance['syscontact_zip'] = strip_tags( $new_instance['syscontact_zip'] );
			$instance['syscontact_email'] = strip_tags( $new_instance['syscontact_email'] );
			$instance['syscontact_phone'] = strip_tags( $new_instance['syscontact_phone'] );
			$instance['syscontact_website'] = strip_tags( $new_instance['syscontact_website'] );
			return $instance;
		}

		// outputs the options form on admin
		function form( $instance ) {
			/* Set up some default widget settings. */
			$instance = wp_parse_args( (array) $instance, array( 'contactinfo_title' => '', 'syscontact_name' => '', 'syscontact_address' => '', 'syscontact_city' => '', 'syscontact_state' => '', 'syscontact_zip' => '', 'syscontact_phone' => '', 'syscontact_email' => '','syscontact_website'=>'') );
			$title = strip_tags($instance['contactinfo_title']);
			$syscontact_name = strip_tags($instance['syscontact_name']);
			$syscontact_address = strip_tags($instance['syscontact_address']);
			$syscontact_city = strip_tags($instance['syscontact_city']);
			$syscontact_state = strip_tags($instance['syscontact_state']);
			$syscontact_zip = strip_tags($instance['syscontact_zip']);
			$syscontact_phone = strip_tags($instance['syscontact_phone']);
			$syscontact_email = strip_tags($instance['syscontact_email']);
			$syscontact_website = strip_tags($instance['syscontact_website']);
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'contactinfo_title' ); ?>"><?php _e('Title:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'contactinfo_title' ); ?>" name="<?php echo $this->get_field_name( 'contactinfo_title' ); ?>" value="<?php echo $title; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'syscontact_name' ); ?>"><?php _e('Name:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'syscontact_name' ); ?>" name="<?php echo $this->get_field_name( 'syscontact_name' ); ?>" value="<?php echo $syscontact_name; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'syscontact_address' ); ?>"><?php _e('Address:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'syscontact_address' ); ?>" name="<?php echo $this->get_field_name( 'syscontact_address' ); ?>" value="<?php echo $syscontact_address; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'syscontact_city' ); ?>"><?php _e('City:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'syscontact_city' ); ?>" name="<?php echo $this->get_field_name( 'syscontact_city' ); ?>" value="<?php echo $syscontact_city; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'syscontact_state' ); ?>"><?php _e('State:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'syscontact_state' ); ?>" name="<?php echo $this->get_field_name( 'syscontact_state' ); ?>" value="<?php echo $syscontact_state; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'syscontact_zip' ); ?>"><?php _e('Zip Code:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'syscontact_zip' ); ?>" name="<?php echo $this->get_field_name( 'syscontact_zip' ); ?>" value="<?php echo $syscontact_zip; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'syscontact_phone' ); ?>"><?php _e('Phone:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'syscontact_phone' ); ?>" name="<?php echo $this->get_field_name( 'syscontact_phone' ); ?>" value="<?php echo $syscontact_phone; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'syscontact_email' ); ?>"><?php _e('E-mail:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'syscontact_email' ); ?>" name="<?php echo $this->get_field_name( 'syscontact_email' ); ?>" value="<?php echo $syscontact_email; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'syscontact_website' ); ?>"><?php _e('Website:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'syscontact_website' ); ?>" name="<?php echo $this->get_field_name( 'syscontact_website' ); ?>" value="<?php echo $syscontact_website; ?>" type="text" style="width:100%;" />
			</p>
		<?php 
		} 
	}
	/* Add our function to the widgets_init hook. */
	add_action( 'widgets_init', 'contactinfo_widgets' );
?>