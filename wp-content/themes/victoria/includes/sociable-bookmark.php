<?php 
	if (get_option('atp_social_bookmark') != '') {?>
		<ul class="atpsocials">
		<?php
			// sys_social_bookmark options
			$sys_social_bookmark_icons = explode('#;', get_option('atp_social_bookmark'));
			for($i=0;$i<count($sys_social_bookmark_icons);$i++) {
					$sys_social_bookmark_icon = explode('#|', $sys_social_bookmark_icons[$i]);
					if ($sys_social_bookmark_icon[1] == '') {
						$sys_social_bookmark_icon[1] = '#';	
					}?>
			<li>
				<a href="<?php echo($sys_social_bookmark_icon[2]); ?>" title="<?php echo($sys_social_bookmark_icon[0]); ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/images/sociables/<?php echo($sys_social_bookmark_icon[1]); ?>" alt=""  /> </a>
			</li>
			<?php 
			} ?>
		</ul>
<?php }	?>
<div class="clear"></div>