<?php
	class atpgenerator {

		// S K I N   G E N E R A T O R  
		//--------------------------------------------------------
		function skincss() {
			$filename = THEME_DIR.'/css/skin.css';

			// Let's make sure the file exists and is writable first.
			if (is_writable($filename)) {
				$handle  = fopen($filename, 'w+');
				$csscontent = include_once( THEME_DIR.'/css/skin.php');
				if(strlen($csscontent) > 2) :
				if ($handle) fwrite($handle , $csscontent, strlen($csscontent));
				endif;
			}
			return false;  
		}
		
	
		function atp_primary_menu() {
			if (has_nav_menu( 'primary-menu' ) ) {
				wp_nav_menu(array(
					'container'     => false, 
					'theme_location'=> 'primary-menu',
					'menu_class'    => 'sf-menu ',
					'menu_id'       => 'atp_menu', 
					'echo'          => true, 
					'before'        => '', 
					'after'         => '',
					'link_before'   => '', 
					'link_after'    => '', 
					'depth'         => 0,
					'walker'        => new description_walker()
					));
			}
		}

		
		/*=================================*/
		// Frontpage Teaser
		/*=================================*/
		function teaser_option() {
			$out= "<div class='header_teaser'>";
			$out .= "<div class='header_teasercontent'>";
			$out .= do_shortcode(stripslashes(get_option('atp_teaser_frontpage_text')));
			$out .= "</div>";
			$out .= "</div>";
			echo $out;
		}

		// L O G O   G E N E R A T O R
		//--------------------------------------------------------
		function logo(){
			$atp_logo = get_option('atp_logo'); 
			if($atp_logo == 'logo'){ ?>
				<figure><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
					<img src="<?php echo get_option('atp_header_logo'); ?>" alt="<?php bloginfo('name'); ?>" />
				</a></figure>
			<?php 
			}else { ?>
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>	</a></span></h1>
				<h2 id="site-description"><?php echo bloginfo( 'description' ); ?></h2>
			<?php 
			} 
		}
		function atp_layout($postid) {
			$sidebaroption=get_post_meta($postid, "sidebar_options", TRUE);
			if($sidebaroption=="fullwidth") { 
				$out='id="fullwidth"';
			}else{
				$out='id=main';
			}
			return $out;
		}
		// S I D E B A R   P O S I T I O N S 
		//--------------------------------------------------------
		function sidebaroption($postid) {
			// Get sidebar class and adds sub class to pagemid block layout
			$postid = $post->ID;
			$sidebaroption=get_post_meta($postid, "sidebar_options", TRUE) ? get_post_meta($postid, "sidebar_options", TRUE):'rightsidebar';
			switch($sidebaroption){
				case  'rightsidebar':
						$sidebaroption="rightsidebar";
						break;
				case  'leftsidebar':
						$sidebaroption="leftsidebar";
						break;
				case  'fullwidth':
						$sidebaroption="fullwidth";
						break;
				default:
						$sidebaroption="rightsidebar";
			}

			if (is_404() or is_page_template('template_sortable.php')) {
				$sidebaroption = 'fullwidth';
			}
			if(is_archive()) {
				$sidebaroption = 'rightsidebar';
			}
	
			return $sidebaroption;
		}
		
		// C U S T O M   L O C A L I Z A T I O N 
		//--------------------------------------------------------
		function language_text($custom_txt) {
			$custom_txt = get_option($custom_txt);
			return $custom_txt;
		}

		/***
		 * P O S T   L I N K   T Y P E 
		 *--------------------------------------------------------
		 * atp_getPostLinkURL - generates URL based on link type
		 * @param - string link_type - Type of link 
		 * @return - string URL
		 * 
		 */
		function atp_getPostLinkURL($link_type) {
			global $post;
			
			//use switch to generate URL based on link type
			switch($link_type) {
				case 'linkpage':
						return get_page_link(get_post_meta($post->ID, 'link_page', true));
						break;
				case 'linktocategory':
						return get_category_link(get_post_meta($post->ID, 'link_cat', true));
						break;
				case 'linktopost':
						return get_permalink(get_post_meta($post->ID, 'link_post', true));
						break;
				case 'linkmanually':
						return get_post_meta($post->ID, 'link_manually', true);
						break;
				case 'default':
						return 'default';
						break;
			}
		}
		
		/**
		 * P O S T   A T T A C H M E N T S 
		 *--------------------------------------------------------
		 * getPostAttachments - displays post attachements 
		 * @param - int post_id - Post ID
		 * @param - string size - thumbnail, medium, large or full
		 * @param - string attributes - thumbnail, medium, large or full
		 * @param - int width - width to which image has be revised to
		 * @param - int height - height to which image has be revised to
		 * @return - string Post Attachments
		 */
		 
		function getPostAttachments($postid=0, $size='thumbnail', $attributes='',$width,$height,$postlinkurl) {
			global $post;
				//get the postid
				if ($postid<1) $postid = get_the_ID();
				
				//variables
				$rel = $out = '';
						
				//get the attachments (images)
				$images = get_children(array(
					'post_parent'    => $postid,
					'post_type'      => 'attachment',
					'order'          => 'DESC',
					'numberposts'    => 0,
					'post_mime_type' => 'image'));
					
				//if images exists	, define/determine the relation for lightbox
				if(count($images) >1) {
					$rel = '"group'.$postid.'"';
				}else{
					$rel='""'; 
				}
				$rel = ' rel='.$rel;
				//if images exists, loop through and prepare the output
				if($images) {
				$out .='<div class="flexslider">';
				$out .='<ul class="slides">';
					//loop through
					foreach($images as $image) {
						$full_attachment = wp_get_attachment_image_src($image->ID, 'full');
							if( !empty( $image->ID ) )
						$alt = get_the_title( $image->ID );
						$out .='<li>';
						$out.='<figure><a>';
						$out .= atp_resize('',$full_attachment['0'],$width,$height,'imgborder',$alt);
						$out.='</a></figure>';
						$out .='</li>';
					}//loop ends
					$out .='</ul>';
					$out .='</div><div class="clear"></div>';
				} else { //if images does not exists
					$alt='';;
					$post_thumbnail_id = get_post_thumbnail_id($postid);
					$full_attachment = wp_get_attachment_image_src($post_thumbnail_id,'full');
							if( !empty($post_thumbnail_id) )
					$alt=get_the_title($post_thumbnail_id);
						$out.='<figure><a href="'.$postlinkurl.'">';
						$out.=atp_resize('',$full_attachment['0'],$width,$height,'imgborder',$alt);
						$out.='</a></figure>';
				}// if images exists		
			return $out; 
		}
		// CUSTOM TWITTER TWEETS
		//--------------------------------------------------------
		function atp_customtwitter()
		{
			if ( function_exists( 'twitter_parse_cache_feed' ) ) {
				twitter_parse_cache_feed(array(
					'username'				=> get_option('atp_teaser_twitter'),
					'limit'					=> '1',
					'encode_utf8'			=> '',
					'twitter_cons_key'		=> get_option('atp_consumerkey'),
					'twitter_cons_secret'	=> get_option('atp_consumersecret'),
					'twitter_oauth_token'	=> get_option('atp_accesstoken'),
					'twitter_oauth_secret'	=> get_option('atp_accesstokensecret')
				));
			}
		}
			
		// S U B H E A D E R 
		//--------------------------------------------------------
		function subheader($postid){
			$sub_option			= get_post_meta($postid, "subheader_teaser_options", true);
			$username			= get_option('atp_teaser_twitter');
			$page				= get_post($postid);
			$subheadercolor		= get_post_meta($postid, "subheader_bg_color", true);
			$subheaderbgcolor	= $subheadercolor ? $subheadercolor : '' ;
			$subheader_image	= get_post_meta($postid,'subheader_img',true);
			$subheaderimage		= $subheader_image ? ' url('.$subheader_image.') center center' : '';
			$subheader_props	= 'style="background:'.$subheaderbgcolor.$subheaderimage.'"';
			$out = '';
			if (is_page() || (is_single()) || (is_singular('menus')) || (is_front_page() && $post_id != NULL) || (is_home() && $post_id != NULL)){
				
				switch($sub_option) {
					case 'custom':
							$title = $page->post_title;
							$subdesc = stripslashes(do_shortcode(get_post_meta($postid, "page_desc", true)));
							break;
					case 'twitter':
							$title = $page->post_title;
							ob_start();							
							$subdesc = atp_generator('atp_customtwitter');
							$subdesc .= ob_get_clean();	
							wp_reset_query();

							break;
					case 'default':
							if(get_option('atp_teaser') == 'twitter') : 
								$title = $page->post_title;
								ob_start();						
								$subdesc = atp_generator('atp_customtwitter');
								$subdesc .= ob_get_clean();	

							elseif(get_option('atp_teaser') == 'default') :
								$title = $page->post_title;
							elseif(get_option('atp_teaser') == 'disable') :
							elseif ( get_option( 'atp_teaser' ) == 'custom'):
								$title = $page->post_title;
								$subdesc = stripslashes(do_shortcode(get_option('atp_teaser_custom')));
							else :
								$title = $page->post_title;
							endif;
							break;
					case 'customhtml':
							$subdesc = stripslashes(do_shortcode(get_post_meta($postid, "custom_html", true)));
							wp_reset_query();;
							break;
					default:
							if( get_option('atp_teaser') == 'twitter') {
								$title = $page->post_title;
								ob_start();						
								$subdesc = atp_generator('atp_customtwitter');
								$subdesc .= ob_get_clean();	
							} elseif ( get_option( 'atp_teaser' ) == 'default') {
								$title = $page->post_title;
							} elseif ( get_option( 'atp_teaser' ) == 'custom') {
								$title = $page->post_title;
								$subdesc = stripslashes(do_shortcode(get_option('atp_teaser_custom')));
							} elseif ( get_option('atp_teaser') == 'disable') {
							} else {
								$title = $page->post_title;
							}	
				}
			}
			
			
			// iF IS  is_single   
			//--------------------------------------------------------
			if (is_single()) {
				$title = get_option('atp_postsinglepage') ? get_option('atp_postsinglepage') : 'The Blog';
			}
			
			if(is_singular( 'menus' ) ){
				$title = $page->post_title;	
			}

			// iF IS  PAGE   4 0 4 
			//--------------------------------------------------------
			if (is_404()) {
				$title = get_option('atp_error404txt') ? get_option('atp_error404txt') : '404 Error Page';
			}
			
			// IF IS  A R C H I V E
			//--------------------------------------------------------
			if(is_archive()) {
				$title = __('Archive','THEME_FRONT_SITE');
				if ( is_day() ) :
							$subdesc=sprintf( __( 'Daily Archives: %s', 'THEME_FRONT_SITE' ), '<span>' . get_the_date() . '</span>' ); 
					elseif ( is_month() ) : 
							$subdesc= sprintf( __( 'Monthly Archives: %s', 'THEME_FRONT_SITE' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'THEME_FRONT_SITE' ) ) . '</span>' ); 
					elseif ( is_year() ) : 
							$subdesc=sprintf( __( 'Yearly Archives: %s', 'THEME_FRONT_SITE' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'THEME_FRONT_SITE' ) ) . '</span>' ); 
					else :
							
					endif;
			}
			// iF IS TAG PAGE  
			//--------------------------------------------------------
			if (is_tag()) {
				$title = sprintf( __( 'Tag Archives: %s', 'THEME_FRONT_SITE' ), '<span>' . single_tag_title( '', false ) . '</span>' );
			}
			// IF IS  S E A R C H
			//--------------------------------------------------------
			if(is_search()) {
				$title = __('Search Results','THEME_FRONT_SITE');
			}
			if(is_author()) {
				$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
				$subdesc = sprintf(__('Author Archives: %s', 'THEME_FRONT_SITE'),$curauth->nickname);
				}
			// C U S T O M   S U B H E A D E R   P R O P E R T I E S 			
			//--------------------------------------------------------
			if($subheaderbgcolor OR $subheaderimage) {
				$subheader_props = 'style="background:'.$subheaderbgcolor.$subheaderimage.'"';
			}else{
				$subheader_props='';
			}
			
			if ( get_option( 'atp_teaser') != 'disable' ) {
				if( $sub_option != 'disable' ){
					$out .= '<div class="subheader" id="subheader" '.$subheader_props.'>';
					$out .= '<div class="inner subheader_teaser">';
						if( isset( $title ) ) {
							$out .= '<div class="subtitle"><h1><span>'.$title.'</span></h1></div>';
						}
						if( isset( $subdesc ) ) {
							$out .= '<div class="subdesc">'.$subdesc.'</div>';
						}
					$out .= '</div>';
					$out .= '</div>';
				}
			}
			
			return $out;
		}
	
		// C U S T O M  T W I T T E R 		
		//--------------------------------------------------------
		function relativeTime($time) {
				$delta = strtotime('+2 hours') - $time;
				if ($delta < 2 * MINUTE) {
					return "1 min ago";
				}
				if ($delta < 45 * MINUTE) {
					return floor($delta / MINUTE) . " min ago";
				}
				if ($delta < 90 * MINUTE) {
					return "1 hour ago";
				}
				if ($delta < 24 * HOUR) {
					return floor($delta / HOUR) . " hours ago";
				}
				if ($delta < 48 * HOUR) {
					return "yesterday";
				}
				if ($delta < 30 * DAY) {
					return floor($delta / DAY) . " days ago";
				}
				if ($delta < 12 * MONTH) {
					$months = floor($delta / DAY / 30);
					return $months <= 1 ? "1 month ago" : $months . " months ago";
				} else {
					$years = floor($delta / DAY / 365);
					return $years <= 1 ? "1 year ago" : $years . " years ago";
				}
			}
			
		function twitter_parse_cache_feed($username,$limit,$encode_utf8 = false) {
			define("SECOND", 1);
			define("MINUTE", 60 * SECOND);
			define("HOUR", 60 * MINUTE);
			define("DAY", 24 * HOUR);
			define("MONTH", 30 * DAY);
		
			global $twitter_options;
			include_once(ABSPATH . WPINC . '/class-simplepie.php');
			$messages = fetch_feed('http://api.twitter.com/1/statuses/user_timeline/'.$username.'.rss');
			$out = '';
			if ($username == '') {
				$out .= '<p class="tweet">';
				$out .= 'Please enter your twitter Id in place of username';
				$out .= '</p>';
			}else{
				if ( is_wp_error($messages) ) return "Error Fetching Twitter Feeds".$messages->get_error_message();
					$feed_count = $messages->get_item_quantity();
				if ( empty($feed_count) ) {
					$out .= '<p class="tweet">';
					$out .= 'No public Twitter messages';
					$out .= '</p>';
				}else{
					$i = 0;
					foreach ( $messages->get_items() as $message ) {
					$out .= '<p class="tweet">';
						$msg = " ".substr(strstr($message->get_description(),': '), 2, strlen($message->get_description()))." ";
						if($encode_utf8) $msg = utf8_encode($msg);
						$link = $message->get_link();
						$time = $message->get_date();
						$msg = $this->hyperlinks($msg);
						$msg = $this->twitter_users($msg);
						$out .= $msg;
						$out .= '<span class="note"><small>(' . $this->relativeTime(strtotime($time)) . '&nbsp;)</small></span>';
						//$out .= '<a class="target_blank" href="' .$link. '" title="' .relativeTime(strtotime($time)). '">' .$msg. '</a>';
						$i++;
						if ( $i >= $limit ) break;
					}	
					$out .= '</p>';
				}
			}
			return $out;
		}

		function hyperlinks($text) {
			// Props to Allen Shaw & webmancers.com
			// match protocol://address/path/file.extension?some=variable&another=asf%
			//$text = preg_replace("/\b([a-zA-Z]+:\/\/[a-z][a-z0-9\_\.\-]*[a-z]{2,6}[a-zA-Z0-9\/\*\-\?\&\%]*)\b/i","<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
			$text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
			// match www.something.domain/path/file.extension?some=variable&another=asf%
			//$text = preg_replace("/\b(www\.[a-z][a-z0-9\_\.\-]*[a-z]{2,6}[a-zA-Z0-9\/\*\-\?\&\%]*)\b/i","<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);
			$text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);    
			
			// match name@address
			$text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
			//mach #trendingtopics. Props to Michael Voigt
			$text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
			return $text;
		}
		function twitter_users($text) {
		   $text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
		   return $text;
		}
			/**
	 * function postmetaStyle1
	 */

	
		function postmetaStyle1() {
			ob_start();

			$out ='<div class="postmeta">'; 
			$out.='<div class="postmetadata">';
			echo 'on <span class="p1date" >';
				the_time(get_option("atp_datetxt")? get_option("atp_datetxt") :"M j, Y"); 
			echo ',</span>&nbsp; ';
			echo get_option('atp_postedin')? get_option('atp_postedin') :'Posted In';?> <?php the_category(', ') ; 
			echo '&nbsp;';
			echo get_option('atp_bytxt')? get_option('atp_bytxt') :'By';?> <?php the_author_posts_link(); 
			echo '&nbsp;&nbsp;/&nbsp;&nbsp;';
			comments_popup_link( __( '0 Comment', 'THEME_FRONT_SITE' ), __( '1 Comment', 'THEME_FRONT_SITE' ), __( '% Comments', 'THEME_FRONT_SITE' ), '','');
			$out.= ob_get_clean();
			$out.="</div></div>";
			
			return $out;
		} 


	/**
	 * function postmetaStyle2
	 */


		function postmetaStyle2() {
			ob_start();

			$blogtime=get_the_time(get_option("atp_datetxt")? get_option("atp_datetxt") :"M j, Y");
			$blogcat= get_the_category_list(', ');
			$blogauth= get_the_author();
			//$popt=comments_popup_link( __( 'Leave a comment', 'THEME_FRONT_SITE' ), __( '1 Comment', 'THEME_FRONT_SITE' ), __( '% Comments', 'THEME_FRONT_SITE' ) );
			
			$out ='<div class="postmeta">'; 
			$out.='<div class="postmetadata">';
			$out.='<span><img src="'.get_template_directory_uri().'/images/date_micon.png" alt="img" style="vertical-align:middle;" />'.$blogtime.'</span>';
			$out.='<span><img src="'.get_template_directory_uri().'/images/postedin_micon.png" alt="img" style="vertical-align:middle;" />'.$blogcat.' </span>';
			$out.='<span><img src="'.get_template_directory_uri().'/images/author_micon.png" alt="img" style="vertical-align:middle;" />'.$blogauth.'</span>';
			$out.='<span><img src="'.get_template_directory_uri().'/images/comments_micon.png" alt="" style="vertical-align:middle;" />';
				comments_popup_link( __( '0 Comment', 'THEME_FRONT_SITE' ), __( '1 Comment', 'THEME_FRONT_SITE' ), __( '% Comments', 'THEME_FRONT_SITE' ),'','comment 0').'</span>';
			$out.= ob_get_clean();
			$out.='</div></div>';

			return $out;
		}


	/**
	 * function postmetaStyle3
	 */

		function postmetaStyle3() {
			ob_start();

			$out='<div class="postmeta">'; 
			$out.='<div class="postmetadata">';
			echo '<span>';
				the_time(get_option("atp_datetxt")? get_option("atp_datetxt") :"M jS, Y");
			echo '</span>  &nbsp; ';
			echo '<span class="comments">';
				comments_popup_link( __( '0 comment', 'THEME_FRONT_SITE' ), __( '1 Comment', 'THEME_FRONT_SITE' ), __( '% Comments', 'THEME_FRONT_SITE' ) );
			$out.=ob_get_clean();
			$out.='</span></div></div>';

			return $out;
		} 
		
		/**
		* Footer Teaser
		*/

		function footer_teaser_option() {
			$out = '<div class="footer_teaser"><div class="teasercontent">';
			$out .= do_shortcode(get_option('atp_teaser_footer_text'));
			$out .= '</div></div>';
			return $out;
		}

		// B R E A D C R U M B S 
		//--------------------------------------------------------
		function my_breadcrumb() {
			if ( function_exists( 'breadcrumbs_plus' ) ) {
				breadcrumbs_plus(array(
					'prefix'	=> '',
					'suffix'	=> '',
					'title'		=> false,
					'home'		=> __( 'Home', 'THEME_FRONT_SITE' ),
					'sep'		=> '&nbsp;&#47;&nbsp;',
					'front_page'=> false,
					'bold'		=> false,
					'blog'		=> __( 'Blog', 'THEME_FRONT_SITE' ),
					'echo'		=> true,
					'singular_menus_taxonomy'	=> 'menutype'
				));
			}
		}
		
		// A B O U T   A U T H O R 
		//--------------------------------------------------------
		function aboutauthor(){?>
			<div id="entry-author-info">
				<div class="authorbg_content">
					<div id="author-avatar">
						<?php echo get_avatar(get_the_author_meta('email'), $size = '80', $default = 0 ); ?>
					</div>
					<div id="author-description">
						<h4><?php the_author_posts_link(); ?></h4>
						<p><?php the_author_meta('description'); ?></p>
					</div>
				</div>
			</div><div class="clear"></div>
		<?php 
		} 
	
		// R E L A T E D   P O S T S 
		//--------------------------------------------------------
		function relatedposts($postid) {

		//Variables
		global $wpdb,$post;

		$tags = wp_get_post_tags($postid);
		if ($tags) {
			$tag_ids = array();
			foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id; $args=array(
				'tag__in'			=> $tag_ids,
				'post__not_in'		=> array($post->ID),
				'showposts'			=>4, // Number of related posts that will be shown.
				'ignore_sticky_posts'	=>1
			);
				$related_post_found = "true";
			wp_reset_query();
			$my_query = new wp_query($args);
		
			if( $my_query->have_posts() ) { 
				
				echo '<div class="singlepostlists"><h3>'. __("Related Posts", "THEME_FRONT_SITE").'</h3><ul>';
				while ($my_query->have_posts()) {
					$my_query->the_post();
			
					echo "<li>";
					if (has_post_thumbnail($post->ID) ){
						$thumb = get_post_thumbnail_id($post->ID); 	

						$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$thumbnail=wp_get_attachment_image_src($post_thumbnail_id,'120x70');
					?>
					<a href="<?php echo get_permalink($post->ID); ?>" class="thumb" title="<?php the_title(); ?>">
					<?php echo atp_resize($post->ID,'','120','70','imageborder',''); ?>
					</a>
					<?php }	else { } ?>
					<?php // echo '<span class="spdate">'.get_the_date().'</span>'; ?>
					<a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a>
				</li>
				<?php
				}
				echo '</ul>';
				echo '</div>';
			}
		}
	
		wp_reset_query();
	?>	
	<div class="clear"></div>
	<?php }
		
	
	}
	// end class
	
	/**
	 * Description Walker Class for Custom Menu
	 */
	class description_walker extends Walker_Nav_Menu {
	  function start_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0){
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $object->classes ) ? array() : (array) $object->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-object-'. $object->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
		$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
		$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
		$attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

		$prepend = '';
		$append = '';
		$description  = ! empty( $object->attr_title ) ? '<span class="msubtitle">'.esc_attr( $object->attr_title ).'</span>' : '';

		if($depth != 0 && $depth != 1){
			 $description = $append = $prepend = "";
		}

		$object_output = $args->before;
		$object_output .= '<a'. $attributes .'>';
		$object_output .= $args->link_before .$prepend.apply_filters( 'the_title', $object->title, $object->ID ).$append;
		$object_output .= $description.$args->link_after;
		$object_output .= '</a>';
		$object_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
		}
	}

	// W R I T E   G E N E R A T O R
	//--------------------------------------------------------
	function atp_generator($function){
	//http:www//php.net/manual/en/function.call-user-func-array.php
	//http://php.net/manual/en/function.func-get-args.php	
		global $_atpgenerator;
		$_atpgenerator = new atpgenerator;
		$args = array_slice( func_get_args(), 1 );
		return call_user_func_array(array( &$_atpgenerator, $function ), $args );
	}
	// C U S T O M   E X C E R P T   L E N G T H
	//--------------------------------------------------------
	function excerpt($num) {
		$link = get_permalink();
		$ending = '...';
		$limit = $num+1;
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).$ending;
		echo $excerpt;
	}
// C U S T O M   C O M M E N T   T E M P L A T E 
	//--------------------------------------------------------
	
	function theme_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'THEME_FRONT_SITE' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'THEME_FRONT_SITE' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-author">
				<?php
					$avatar_size = 60;
					if ( '0' != $comment->comment_parent )
						$avatar_size = 40;
						echo get_avatar( $comment, $avatar_size );?>
					<div class="comment-meta">
					<?php
						/* Translators: 1: comment author, 2: date and time */
						printf( __( '%1$s %2$s <span class="says">said:</span>', 'THEME_FRONT_SITE' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'THEME_FRONT_SITE' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'THEME_FRONT_SITE' ), '<span class="comment-edit-link">', '</span>' ); ?>
				</div><!-- .comment-meta -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'THEME_FRONT_SITE' ); ?></em>
					<br />
				<?php endif; ?>

			</div>

			<div class="comment-content"><?php comment_text(); ?>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'THEME_FRONT_SITE' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</div>
		
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
	}
	
if ( ! function_exists( 'atp_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function atp_content_nav() {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'THEME_FRONT_SITE' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'THEME_FRONT_SITE' ) ); ?></div>
	<?php endif;
}
endif; // twentyeleven_content_nav

function atp_custom_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; $homeurl = get_template_directory_uri(); ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment_wrap">
		<div class="comment-author">
			<?php echo get_avatar($comment,$size='40',$default=$default = $homeurl . '/images/default_avatar_visitor.gif' ); ?>
			<?php printf( '<cite class="fn">%s</cite>', get_comment_author_link()) ?>
			<div class="comment-meta"> <?php echo get_comment_date(); ?> at <?php comment_time('g:i a'); ?>
			<br />
			<?php edit_comment_link(__('Edit', 'THEME_FRONT_SITE'),'  ','') ?>
			</div>
		</div>
		<div class="single_comment">
			<?php if ($comment->comment_approved == '0') : ?>
			<div class="moderation"><em><?php _e('Your comment is awaiting moderation.', 'THEME_FRONT_SITE') ?></em></div>
			<?php endif; ?>
			<?php comment_text() ?>
			<span class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</span> 
		</div>
		<div class="clear"></div>
	</div>
<?php } ?>
