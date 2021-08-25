<?php
	// CUSTOM META BOXES
	//--------------------------------------------------------
	class customfields {

		function __construct($meta_box)	{
		
			$this->_meta_box = $meta_box;
		
			add_action('admin_menu',array(&$this,'metabox'));
			add_action('save_post', array(&$this,'savemeta'));
		}

		// Add meta box
		function metabox() {
				foreach( $this->_meta_box['page'] as $page ) {
				add_meta_box( $this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show_metabox'), $page, $this->_meta_box['context'], $this->_meta_box['priority'] );
			}
		}

		function adminHead () {
			wp_enqueue_script('color-picker2', ATP_DIRECTORY.'/framework/admin/js/colorpicker.js', array('jquery'));
		}

		// Callback function to show fields in meta box
		function show_metabox() {

			global $page_layout, $post,$meta_box;
			// Defines custom sidebar widget based on custom option
			$sidebarwidget = get_option('atp_customsidebar');

			// Use nonce for verification
			echo '<input type="hidden" name="page_page_layout_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

			// M E T A B O X   W R A P 
			//--------------------------------------------------------
			echo '<div class="atp_meta_options">';

			//foreach ($this->_meta_box[$post->post_type]['fields'] as $field) {
			foreach ( $this->_meta_box['fields'] as $field ) { 
				
				// get current post meta data
				$meta = get_post_meta($post->ID, $field['id'], true);

				if($meta == ""){
					$meta =$field['std']; //Default Meta Array Value if empty
				}

				if(!isset($field['class'])) { 
					$field['class']=''; 
				}
				
				// M E T A B O X   O P T I O N S
				//--------------------------------------------------------
				echo'<div class="atp_options_box '.$field['class'].'"><div class="glowborder">',
					'<div class="atp_label"><label>', $field['name'], '</label></div>',
					'<div class="atp_inputs">';
				switch ($field['type']) {
					case 'text':
							echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />';
							break;
					case 'color':
							?>
							<script type="text/javascript" language="javascript">
							jQuery(document).ready(function($) { 
								jQuery('#<?php echo $field['id']; ?>_color').children('div').css('backgroundColor', '<?php echo $meta ? $meta : $field['std']; ?>'); 
							jQuery('#<?php echo $field['id']; ?>').ColorPicker({
										color: '<?php echo $meta ? $meta : $field['std']; ?>',
										onShow: function (colpkr) {
											jQuery(colpkr).fadeIn(500);
											return false;
										},
										onHide: function (colpkr) {
											jQuery(colpkr).fadeOut(500);
											return false;
										},
										onChange: function (hsb, hex, rgb) {
										jQuery('#<?php echo $field['id']; ?>_color > div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
									jQuery('#<?php echo $field['id']; ?>').prev('input').attr('value', '#'+hex);
									jQuery('#<?php echo $field['id']; ?>').val('#'+hex);
												}
									});
									});

							</script>
							<?php echo '<div class="meta_page_selectwrap"><input class="color"  name="'. $field['id'] .'" id="'. $field['id'] .'" type="text" value="', $meta ? $meta : $field['std'], '"  />';?>
							<div id="<?php echo $field['id']; ?>_color" class="colorSelector"><div></div></div></div>
							<?php
							break;
						case 'time_select':
			
				$timeformat=get_option('atp_timeformat');
					$metatime=substr($meta, 0,5);
					echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				
					if( $timeformat =="24")	{
					for ($i = 0; $i < 24; $i++){ 
						$h = $i;
						if ( $h < 10) { $h = '0' . $h; }
						
						for($m=0;$m<=45;$m+=15) {
							
							if($m == 0) $m .='0';
							$hours = $h.':'.$m;
						
				
							echo '<option value="' . $h . ':'.$m.'" ', $metatime == $hours ? ' selected="selected"' : '', '>',$h.':',$m,'</option>';
						}
					}
					}
					if( $timeformat =="12")	{
						for ($i = 0; $i < 24; $i++){ 
							$h = $i;
							$hh='AM';
						if ( $h < 10) { $h = '0' . $h; $h1 =$h; }
						for($m=0;$m<=45;$m+=15) {
						
							if($m == 0) $m .='0';
							$hours = $h.':'.$m;	
							if($i == '12')	{
								$hh='PM';
							}
							if($i > 12)	{
								$h1=$i-12;
								$hh='PM';
							}
							echo '<option value="' . $h . ':'.$m.'" ', $metatime == $hours ? ' selected="selected"' : '', '>', $h1.':',$m,$hh,'</option>';
		}
						}
					}
					echo '</select>';
					break;
							case 'date':

					echo'<script type="text/javascript">
					/* <![CDATA[ */
						jQuery(document).ready(function() {
							
								jQuery("#'.$field['id'].'").datepicker({ dateFormat: "yy-mm-dd" });
					
					});
					/* ]]> */
					</script>';
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />';
					break;
					case 'textarea':
							echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>';
							break;
					case 'select':
							echo '<div class="select_wrapper"><select class="select" name="', $field['id'], '" id="', $field['id'], '">';
							foreach ($field['options'] as $key => $value) {
								echo '<option value="'.$key.'"', $meta == $key ? ' selected="selected"' : '', '>', $value, '</option>';
							}
							echo '</select></div>';
							break;
					case 'customselect':
							echo '<div class="select_wrapper"><select class="select" name="', $field['id'], '" id="', $field['id'], '">';
							echo '<option value="">select</option>';
							if($sidebarwidget!=""){
								foreach ($field['options'] as $key => $value) {
									echo '<option value="'.$value.'"', $meta == $value ? ' selected="selected"' : '', '>', $value, '</option>';
								}
							}
							echo '</select></div>';
							break;
					case 'radio':
							$link_page='';  $link_cat=''; $link_post=''; $link_manually='';
							foreach ($field['options'] as $key => $value) {
								echo '<label class="rlabel"><input onclick="sys_custom_url_meta()" type="radio" name="', $field['id'], '" value="', $key, '"', $meta == $key ? ' checked="checked"' : '', ' />', $value,'</label>';
							}
							global $post;
							$custom = get_post_custom($post->ID);
							if(isset($custom['link_page'])){
								$link_page = $custom["link_page"][0]; }
							if(isset($custom['link_cat'])){
								$link_cat = $custom["link_cat"][0]; }
							if(isset($custom['link_post'])){ 
								$link_post = $custom["link_post"][0]; }
							if(isset($custom['link_manually'])){ 
								$link_manually = stripslashes($custom["link_manually"][0]);  }
							echo'<div id="customurl" >';
							echo'<div id="sys_link" class="postlinkurl linkpage select_wrapper">';
							echo '<select name="link_page" class="select">';
							echo '<option value="">Select Page</option>';
							foreach($this->get_custom_options('page') as $key => $option) {
								echo '<option value="' . $key . '"';
								if ($key == $link_page) {
									echo ' selected="selected"';
								}
								echo '>' . $option . '</option>';
							}
							echo '</select>';	
							echo '</div>';
					
							echo'<div id="sys_category" class="postlinkurl linktocategory">';
							echo '<select name="link_cat">';
							echo '<option value="">Select Category</option>';
							foreach($this->get_custom_options('cat') as $key => $option) {
								echo '<option value="' . $key . '"';
								if ( $key == $link_cat) {
									echo ' selected="selected"';
								}
								echo '>' . $option . '</option>';
							}
							echo '</select>';	
							echo '</div>';
					
							echo'<div id="sys_post" class="postlinkurl linktopost">';
							echo '<select name="link_post">';
							echo '<option value="">Select Post</option>';
							foreach($this->get_custom_options('post') as $key => $option) {
								echo '<option value="' . $key . '"';
								if ($key == $link_post) {
									echo ' selected="selected"';
								}
								echo '>' . $option . '</option>';
							}
							echo '</select>';	
							echo '</div>';
					
							echo'<div id="sys_manually" class="postlinkurl linkmanually">';
							if(isset($link_manually)){
							echo'<input type="text" name="link_manually"  value="'.$link_manually.'"  size="50%" />';
							}else{ 
								echo'<input type="text" name="link_manually"  value=""  size="50%" />';
							}
							echo '</div></div>';
							break;
					case 'upload':
							echo'<input name="'.$field['id'].'" type="hidden" class="custom_upload_image" value="'.stripslashes(get_post_meta($post->ID, $field['id'], true)).'" />';
							echo'<input name="'.$field['id'].'" class="custom_upload_image_button button button-primary button-large" type="button" value="Choose Image" />';
							echo'<div id="atp_imagepreview-'.$field['id'].'" class="screenshot">';
							 if(get_post_meta($post->ID, $field['id'], true)) {
								 echo '<img src="'.stripslashes(get_post_meta($post->ID, $field['id'], true)).'" width="100" height="100" class="custom_preview_image" alt="" />';
								 echo '<a href="#" class="cimage_remove">Remove Image</a>'; 
							}
							echo '</div>';
							break;
					case 'layout':
						$i = 0;
						$select_value = $meta;
						foreach ($field['options'] as $key => $value) {
								$i++;
							$checked = '';
							$selected = '';
							if($select_value != '') {
								if ( $select_value == $key) { $checked = ' checked'; $selected = 'atp-radio-option-selected'; } 
								} else {
									if ($meta == $key) { $checked = ' checked'; $selected = 'atp-radio-option-selected'; }
										elseif ($i == 1  && !isset($select_value)) { $checked = ' checked'; $selected = 'atp-radio-option-selected'; }
										elseif ($i == 1  && $meta == '') { $checked = ' checked'; $selected = 'atp-radio-option-selected'; }
									else { $checked =  'checked'; }
								}
							echo '<input value="'.$key.'"  class="checkbox atp-radio-img-radio" type="radio" id="', $field['id'],$i,'" name="', $field['id'],'"'.$checked.' />';
							echo '<img width="50" src="'.$value.'" alt="" class="atp-radio-option '. $selected .'" onClick="document.getElementById(\''. $field['id'].$i.'\').checked = true;" />';
							}
							break;

					case 'checkbox':
							$meta != ''? 'on':'off';
							echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta == 'on' ? ' checked="checked"' : '', ' /><label for="', $field['id'], '">',$field['desc'],'</label>';
							break;
					 case 'addprice':
							$output = '<table id="custom_price" cellpadding="0" cellspacing="0">';
							$output .= '<tbody>';
							if ( $meta != "" ) {
								foreach( $meta as $custom_meta ) {
									$output .= '<tr><td><input type="text" name="' . $field['id'] . '[]" value="' . $custom_meta . '"  size="30" style="width:97%" /></td><td><a class="button button-secondary" href="javascript:void(0);return false;" onClick="jQuery(this).parent().parent().remove();">Delete</a></td></tr>';
								}
							}
							$output .= '</tbody></table><button type="button" class="button button-primary button-large" name="custom_price" value="Add Price" onClick="addWidgetprice()">Add Price</button>';?>
							<script type="text/javascript" language="javascript">
							function addWidgetprice(){
								jQuery('#custom_price').append('<tr><td><input type="text" name="<?php echo $field['id'];?>[]" value="" size="30" style="width:97%" /></td><td><a class="button button-secondary" href="javascript:void(0);return false;" onClick="jQuery(this).parent().parent().remove();">Delete</a></td></tr>');
							}
							</script>
							<?php
							echo $output;
							break;
				}
				if($field['type'] != 'checkbox') {
					echo '<p class="desc">',$field['desc'],'</p>';
				}
				echo	'</div><div class="clear"></div>';
				echo 	'</div></div>';
			}
			echo '</div>';
		}
		// E N D  - SHOW METABOX


		// S A V E   M E T A   D A T A 
		//--------------------------------------------------------
		function savemeta($post_id) {
			
			global $meta_box,$post;

		// verify nonce
        if ( !isset($_POST['page_page_layout_nonce']) || !wp_verify_nonce($_POST['page_page_layout_nonce'], basename(__FILE__))) {
            return $post_id;
		}
         
        // check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        } 
        // check permissions
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
        $linkpage = isset($_POST['link_page']) ? $_POST['link_page'] : '';
        $link_manually = isset($_POST['link_manually']) ? $_POST['link_manually'] : '';
        $link_cat = isset($_POST['link_cat']) ? $_POST['link_cat'] : '';
        $link_post = isset($_POST['link_post']) ? $_POST['link_post'] : '';
        if ($linkpage != "") {
            update_post_meta($post_id, "link_page", $_POST['link_page']);
        }
        if ($linkpage == "") {
            delete_post_meta($post_id, "link_page", get_post_meta($post_id, 'link_page', true));
        }
        if ($link_manually != "") {
            update_post_meta($post_id, "link_manually", $_POST['link_manually']);
        }
        if ($link_manually == "") {
            delete_post_meta($post_id, "link_manually", get_post_meta($post_id, 'link_manually', true));
        }
        if ($link_cat != "") {
            update_post_meta($post_id, "link_cat", $_POST['link_cat']);
        }
        if ($link_cat == "") {
            delete_post_meta($post_id, "link_cat", get_post_meta($post_id, 'link_cat', true));
        }
        if ($link_post != "") {
            update_post_meta($post_id, "link_post", $_POST['link_post']);
        }
        if ($link_post == "") {
            delete_post_meta($post_id, "link_post", get_post_meta($post_id, 'link_post', true));
        }
			$atp_status = isset($_POST['status']) ? $_POST['status'] : '';
		if($atp_status)
		{
			$status_changed=get_option('atp_status');
			switch($atp_status)
				{
					case 'cancelled':
						$statustxt=get_option('atp_reserveCancel') ? get_option('atp_reserveCancel') : 'Cancelled';
						break;
					case 'unconfirmed':
						$statustxt=get_option('atp_reserveUnConfirm') ? get_option('atp_reserveUnConfirm') : 'UnConfirmed';
						break;
					case 'confirmed':
						$statustxt= get_option('atp_reserveConfirm') ? get_option('atp_reserveConfirm') : 'confirmed';
					break;
				}
			$placeholders = array('[contact_name]','[number_of_people]','[reservation_date]','[reservation_time]','[restaurant_name]','[reservation_status]');$values = array(get_the_title($post_id),$_POST['numberofpeople'],$_POST['dateselect'],$_POST['reservationtime'],get_bloginfo('name'),$statustxt);	
			$status_changed_email_msg = str_replace($placeholders,$values,$status_changed); //replace the placeholders
			
			$statussubject=get_option('atp_statussubject');
								
				$placeholders = array('[restaurant_name]','[booking_id]');
				$values = array(get_bloginfo('name'),$post_id);
				$status_email_subject = str_replace($placeholders,$values,$statussubject); //replace the placeholders
									
				$aivahBooking_email=$_POST['contactemail'];
				
			$headers = 'From: ' . get_option('blogname') . ' Reservations <' . get_option('atp_reservationemail') . '>' . "\r\n\\";
	
				wp_mail($aivahBooking_email,$status_email_subject, $status_changed_email_msg,$headers);
		}
			foreach ( $this->_meta_box['fields'] as $field ) {
				$old = get_post_meta($post_id, $field['id'], true);
				$new = isset($_POST[$field['id']]) ? $_POST[$field['id']] : '';
				
				if ($new && $new != $old) {
					update_post_meta($post_id, $field['id'], $new);
				} elseif ('' == $new && $old) {
					delete_post_meta($post_id, $field['id'], $old);
				}
			}
		}

		//
		// function get_custom_options - fetch pages/posts/cats
		//--------------------------------------------------------
		function get_custom_options($type) {
			switch ($type) {
				case 'page':
						$entries = get_pages('title_li=&orderby=name');
						foreach ($entries as $key => $entry) {
							$options[$entry->ID] = $entry->post_title;
						}
						break;
				case 'cat':
						$entries = get_categories('title_li=&orderby=name&hide_empty=0');
						foreach ($entries as $key => $entry) {
							$options[$entry->term_id] = $entry->name;
						}
						break;
				case 'post':
						$entries = get_posts('orderby=title&numberposts=-1&order=ASC');
						foreach ($entries as $key => $entry) {
							$options[$entry->ID] = $entry->post_title;
						}
						break;
				default:
						$options = false;
			}
			return $options;
		}
	}
	foreach( $this->meta_box as $box ){
		$customfields = new customfields($box);
	}