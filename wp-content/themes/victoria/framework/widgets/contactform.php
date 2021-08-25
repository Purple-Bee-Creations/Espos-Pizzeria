<?php
/**
 * Plugin Name: Contact Form Widget
 * Description: A widget used for displaying Contact Form.
 * Version: 1.0
 * Author: Fem Khan
 * Author URI: http://www.aivahthemes.com
 *
 */
  
 class contact_form_widgets extends WP_Widget {

	function __construct() {
		
		/* Widget settings. */
		$widget_ops = array(
			'classname'		=> 'sysform', 
			'description'	=> __('Quick Contact Form widget for sidebar','ATP_ADMIN_SITE'));
		
		/* Widget settings. */
		$control_ops = array(
			'width'		=> 400, 
			'height'	=> 350);
		
		parent::__construct('contactform_widget1', __(THEMENAME.' - Contact Form'), $widget_ops, $control_ops);
		
		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_print_scripts', array(&$this, 'add_script') );
		}
	}
	
	function add_script(){
		wp_enqueue_script( 'atp-contact' );
	}
	
	function widget( $args, $instance ) {
		extract($args);

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		if(isset($instance['semail'])){
			$semail = $instance['semail'];
		}
		$contact_widgetemail = $instance['contact_widgetemail'];
		$title = $instance['title'];
		$contact_successmessage = $instance['contact_successmessage'];
		$my_string = $this->atp_string( 5 );
		echo $before_widget;
		/* Title of widget (before and after defined by themes). */
			if ($title) :
			echo $before_title.$title.$after_title; 
			endif;
		?>
		<form action="<?php echo THEME_URI; ?>/framework/includes/submitform.php" id="validate_form" method="post">
			<div id="response"></div>
			<p><input type="text" size="25" value="Name" name="contact_name" id="contact_name" class="txtfield" onfocus="if(this.value == '<?php _e('Name', 'THEME_FRONT_SITE') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Name', 'THEME_FRONT_SITE') ?>';}"></p>
			<p><input type="text" size="25" value="Email" name="contact_email" id="contact_email" class="txtfield " onfocus="if(this.value == '<?php _e('Email', 'THEME_FRONT_SITE') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Email', 'THEME_FRONT_SITE') ?>';}"></p>
			<p><textarea name="contactcomment" id="contactcomment" rows="5" cols="30" class="required" value="<?php _e('Message', 'THEME_FRONT_SITE')?>" onfocus="if(this.value == '<?php _e('Message', 'THEME_FRONT_SITE') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Message', 'THEME_FRONT_SITE') ?>';}">Message</textarea></p>
			<p><input type="text" size="20" name="contact_captcha" id="contact_captcha" class="txtfield" value="<?php _e('Captcha', 'THEME_FRONT_SITE') ?>" onfocus="if(this.value == '<?php _e('Captcha', 'THEME_FRONT_SITE') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Captcha', 'THEME_FRONT_SITE') ?>';}"></p>
			<p><label><span class="atpcaptcha"><?php echo $my_string; ?></span> - <?php _e('Case Sensitive','THEME_FRONT_SITE');?></label></p>
			<input type="hidden" name="contact_ccorrect" id="contact_ccorrect"  value="<?php echo $my_string; ?>">
			<input type="hidden" name="contact_success" id="contact_success"  value="<?php echo $contact_successmessage; ?>">
			<p><button type="button" value="submit" name="contactsubmit"  id="contactsubmit"  class="button small gray"><span><?php _e('Submit','THEME_FRONT_SITE');?></span></button></p>
				
			<input type="hidden" name="contact_check" value="checking">
			<input type="hidden" name="contact_widgetemail" id="contact_widgetemail" value="<?php echo $contact_widgetemail; ?>">
		</form>
		<?php
		echo $after_widget;
	}
	
	function atp_string( $length ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$size = strlen( $chars );
		$str='';
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['contact_widgetemail'] = strip_tags( $new_instance['contact_widgetemail'] );
		$instance['contact_successmessage'] = strip_tags( $new_instance['contact_successmessage'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'contact_widgetemail' => '','contact_successmessage' => '','title' =>'') );
		$contact_widgetemail = strip_tags($instance['contact_widgetemail']);
		$contact_successmessage = strip_tags($instance['contact_successmessage']);
		$title = strip_tags($instance['title']);?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'THEME_FRONT_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" type="text" style="width:100%;" />
			</p>
		
			<p>
				<label for="<?php echo $this->get_field_id( 'contact_widgetemail' ); ?>"><?php _e('Email:', 'THEME_FRONT_SITE'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'contact_widgetemail' ); ?>" name="<?php echo $this->get_field_name( 'contact_widgetemail' ); ?>" value="<?php echo $contact_widgetemail; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'contact_successmessage' ); ?>"><?php _e('Success Message:', 'ATP_ADMIN_SITE'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'contact_successmessage' ); ?>" name="<?php echo $this->get_field_name( 'contact_successmessage' ); ?>" value="<?php echo $contact_successmessage; ?>" style="width:100%;" />
			</p>	
	<?php
	}
}
	// Register Widget 
	function contact_form_widgets() {
		register_widget( 'contact_form_widgets' );
	}
	
	add_action( 'widgets_init', 'contact_form_widgets' );
?>