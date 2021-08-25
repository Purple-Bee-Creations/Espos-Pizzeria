<?php
	
	// S H O R T C O D E   C O N S T R U C T O R
	//--------------------------------------------------------
	class atp_shortcode {
		
		// create meta box based on given data
		function __construct($atp_shortcodes) {
			
			if (!is_admin()) return;
				$this->_meta_box = $atp_shortcodes;	
				
			add_action('admin_menu', array(&$this, 'add'));
		}
		
		function add() {
			add_meta_box('ShortcodeGenId', 'Shortcodes Generator', array(&$this, 'ShortcodeGenForm'), 'post', 'normal','high');
			add_meta_box('ShortcodeGenId', 'Shortcodes Generator', array(&$this, 'ShortcodeGenForm'), 'page', 'normal','high');
			add_meta_box('ShortcodeGenId', 'Shortcodes Generator', array(&$this, 'ShortcodeGenForm'), 'menus', 'normal','high');
		}
		
		function ShortcodeGenForm(){
		?>
		<div class="atp_meta_options"> 
			<div class="glowborder">
			<div class="atp_scgen">
				<div class="primary_select">
					<table class="shortcodestab" cellspacing="5"  cellpadding="5">
						<tr>
							<th scope="row">Shortcodes</th>
							<td><div class="meta_page_selectwrap">
								<div class="select_wrapper"><select id="primary_select" class="select">
								<option value="">Choose one</option>
								<?php   
								ksort($this->_meta_box);
								foreach($this->_meta_box as $shortcodes) {
									echo '<option value="'.$shortcodes['value'].'">'.$shortcodes['name'].'</option>';
								} ?>
								</select>
							</div></div></td>
						</tr>
					</table>
				</div>
				<?php
				foreach($this->_meta_box as $shortcodes) {
					echo '<div class="secondary_select" id="secondary_'.$shortcodes['value'].'">'; 

					if(isset($shortcodes['subtype'])){
						echo '<div class="secondaryselect">';
						echo '<table class="shortcodestab" cellspacing="0" cellpadding="8"><tr><th scope="row">Type:</th><td>';
						// Start Select ----------
						echo '<div class="meta_page_selectwrap"><div class="select_wrapper"><select name="atp_'.$shortcodes['value'].'_selector" class="select">';
						echo '<option value="">Choose one...</option>';
						foreach($shortcodes['options'] as $sub_shortcode) {
							echo '<option value="'.$sub_shortcode['value'].'">'.$sub_shortcode['name'].'</option>';
						}
						echo '</select></div></div>';
						// End Select ----------
						echo '</td></tr>';
						echo '</table></div>';

						foreach($shortcodes['options'] as $sub_shortcode) {
							echo '<div id="atp-'.$sub_shortcode['value'].'" class="tertiary_select">';
							echo '<table class="shortcodestab" cellspacing="0"  cellpadding="8">';

							foreach($sub_shortcode['options'] as $option){
								echo '<tr>';
								$option['id']=''.$shortcodes['value'].'_'.$sub_shortcode['value'].'_'.$option['id'];
								if(!isset($option['desc'])) { $option['desc']=''; }
								if(!isset($option['inputsize'])) { $option['inputsize']=''; }
								if(!isset($option['std'])) { $option['std']=''; }
								if(!isset($option['options'])) { $option['options']=''; }
								if(!isset($option['info'])) { $option['info']=''; }
								$this->typeeditor($option['type'],$option['id'],$option['options'],$option['name'],$option['desc'],$option['info'],$option['std'],$option['inputsize']);	
								echo '</tr>';
							}
							echo '</table></div>';
						}
					} 
					else {
						echo '<table class="shortcodestab" cellspacing="0" cellpadding="8">';
						foreach($shortcodes['options'] as $option){
							echo '<tr>';
							$option['id']=''.$shortcodes['value'].'_'.$option['id'];
							if(!isset($option['desc'])) { $option['desc']=''; }
							if(!isset($option['inputsize'])) { $option['inputsize']=''; }
							if(!isset($option['std'])) { $option['std']=''; }
							if(!isset($option['options'])) { $option['options']=''; }
							if(!isset($option['info'])) { $option['info']=''; }
							$this->typeeditor($option['type'],$option['id'],$option['options'],$option['name'],$option['desc'],$option['info'],$option['std'],$option['inputsize']); 	echo '</tr>';
						} 
						echo '</table>';
					} 
					echo'</div>';
				}?>
			</div>
				<input type="button" id="sendtoeditor" class="button button-primary button-hero" value="<?php _e('Send to Editor','ATP_ADMIN_SITE') ?>"/>
			</div>

		</div>
		<?php 
		}
		
		// E D I T O R   T Y P E S 
		//--------------------------------------------------------
		function typeeditor($type,$id,$atpoptions,$name,$desc,$info,$std,$inputsize) {

			switch ($type) {
				case 'upload':
						echo '<td><table>';
						echo '<tr valign="top">';
						echo '<th scope="row">Upload Image</th>';
						echo '<td><label for="upload_image">';
						echo '<input value="'.$std.'" type="text" name="'.$id.'"  id="'.$id.'" size="50%" />';
						echo '<input class="upload_image_button button button-primary"  name="'.$id.'" type="button" value="Upload Image" />';
						echo '</label></td><td id="id="'.$id.'"></td>';
						echo '</tr></table></td>';	
						break;
						
				case 'color':
						$inputsize = isset($inputsize) ? $inputsize : '10';
						echo '<script type="text/javascript" language="javascript">';
						echo '	jQuery(document).ready(function(){
									jQuery("#',$id,'").ColorPicker({
										color: "#0000ff",
										onShow: function (colpkr) {
											jQuery(colpkr).fadeIn(500);
											return false;
										},
										onHide: function (colpkr) {
											jQuery(colpkr).fadeOut(500);
											return false;
										},
										onChange: function (hsb, hex, rgb) {
											jQuery("#',$id,' div").css("backgroundColor", "#" + hex);
											jQuery("#',$id,'").next("input").attr("value","#" + hex);
											jQuery("#',$id,'").val("#" + hex);
										}
									});
								});</script>';
						echo '<th scope="row">',$name,'<span class="info">',$info,'</span></th>';
						echo '<td><div class="meta_page_selectwrap"><input class="color" type="text" name="', $id, '" id="', $id, '" value="', $std, '" size="', $inputsize, '" /><div id="', $id, '" class="colorSelector"><div style="background-color: #0000ff"></div></div></div> <span class="desc">', $desc,'</span></td>';
						break;
				case 'text':
						$inputsize = isset($inputsize) ? $inputsize : '10';
						echo '<th scope="row">',$name,'<span class="info">',$info,'</span></th>';
						echo '<td><input type="text" name="', $id, '" id="', $id, '" value="', $std, '" size="', $inputsize, '" /> <span class="desc">', $desc,'</span></td>';
						break;
				case 'textarea':
						echo '<th scope="row">',$name,'<span class="info">',$info,'</span></th>';
						echo '<td><textarea name="', $id, '" id="', $id, '" cols="60" rows="4" style="width:300px"></textarea><span class="desc">', $desc,'</span></td>';
						break;
				case 'select':
						echo '<th scope="row">',$name,'<span class="info">',$info,'</span></th>';
						echo '<td><div class="meta_page_selectwrap"><div class="select_wrapper ', $id, '"><select  name="', $id, '" id="', $id, '" class="select">';
						foreach ($atpoptions as $optionkey => $option) {
							echo '<option value="',$optionkey,'">', $option, '</option>';
						}
						echo '</select></div></div> <span class="desc">', $desc,'</span></td>';
						break;
				case 'multiselect':           
						echo '<th scope="row">',$name,'<span class="info">',$info,'</span></th>';
						echo '<td><div class="', $id, '"><select style="width:300px; height:auto;" multiple="multiple" name="', $id, '[]" id="', $id, '">';	
						foreach ($atpoptions as $optionkey => $option) {
							echo '<option value="',$optionkey,'">', $option, '</option>';
						}
						echo '</select> <span class="desc">', $desc,'</span></td>';
						break;
				case 'radio':
						foreach ($atpoptions as $option) {
							echo '<th scope="row">',$name,'<span class="info">',$info,'</span></th>';
							echo '<td><input class="atp-button" type="radio" name="', $id, '" value="', $option['value'], '" />', $option['name'],'</td>';	
						}
						break;
				case 'checkbox':
						echo '<th scope="row">',$name,'<span class="info">',$info,'</span></th>';
						echo '<td><input class="atp-button" type="checkbox" value="',$std,'" name="', $id, '" id="', $id, '"', $std ? ' checked="checked"' : '', ' />';
						echo '<label for="', $id, '">', $desc,'</label></td>';
						break;
				case 'separator':
						echo '<th scope="row" class="sc_separator"></th>';
						echo '<td class="sc_separator"></td>';
						break;
			}
		}
	}
	
	$atp_shortcode=new  atp_shortcode($atp_shortcodes);
	//end class
?>