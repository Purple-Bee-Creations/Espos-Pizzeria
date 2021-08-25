<?php
	// T W I T T E R 
	//--------------------------------------------------------
	function sys_twitter ($atts, $content = null) {
		$username=get_option('sys_twitter_username');
		extract(shortcode_atts(array(
			'limit'		=> '',
			'username'	=>$username,
			'consumerkey'	=>'',
			'consumersecret'	=>'',
			'accesstoken'	=>'',
			'accesstokensecret'	=>'',
		), $atts));
			
		$twitter_array = array(
		'username' => $username,
		'limit' => $limit,
		'encode_utf8' =>'',
		'twitter_cons_key' =>$consumerkey,
		'twitter_cons_secret' =>$consumersecret,
		'twitter_oauth_token' =>$accesstoken,
		'twitter_oauth_secret' => $accesstokensecret
	);
		$out = '<div>';
		$out .= twitter_parse_cache_feed($twitter_array);
		$out .= '</div>';
		return $out;
	}
	add_shortcode('twitter','sys_twitter');
?>