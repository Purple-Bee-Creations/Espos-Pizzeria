<?php 
	// S O C I A B L E S
	//--------------------------------------------------------
	function atp_social() {
		if (get_option('atp_social_bookmark') != '') {

			$out = '<ul class="atpsocials">';
			// sys_social_bookmark options
			$sys_social_bookmark_icons = explode('#;', get_option('atp_social_bookmark'));
			for ($i=0; $i<count($sys_social_bookmark_icons); $i++) {
					$sys_social_bookmark_icon = explode('#|', $sys_social_bookmark_icons[$i]);
					if ($sys_social_bookmark_icon[1] == '') {
						$sys_social_bookmark_icon[1] = '#';	
					}
						if ($sys_social_bookmark_icon[0] == '') {
						$sys_social_bookmark_icon[0] = '#ddd';	
					}

				$out .= '<li><a href="'.$sys_social_bookmark_icon[2].'" target="_blank">';
				$out .= '<img src="'.THEME_URI.'/images/sociables/'.$sys_social_bookmark_icon[1].'" alt="'.$sys_social_bookmark_icon[0].'"  /> </a></li>';
		
			} //end for
			$out .= '</ul>';
		}
		return $out;
	}
?>