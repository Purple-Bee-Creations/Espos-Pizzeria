<?php
$path = __FILE__;
$pathwp = explode( 'wp-content', $path );
$wp_url = $pathwp[0];
require_once( $wp_url.'/wp-load.php' );
function atp_style() {
$atp_option_var = array(
'atp_themecolor','atp_stickybarcolor','atp_bodyp','atp_h1','atp_h2','atp_h3','atp_h4','atp_h5','atp_h4','atp_h6','atp_sidebartitle','atp_footertitle','atp_copyrights','atp_entrytitle','atp_entrytitlelinkhover','atp_bodyproperties',
'atp_logo','atp_logotitle','atp_tagline','atp_breadcrumblink','atp_breadcrumblinkhover',
'atp_footerlink','atp_footerlinkhover','atp_footerbgcolor','atp_copybgcolor','atp_footertextcolor','atp_copyrightlink',
'atp_subheaderproperties','atp_mainmenu','atp_mainmenudropdown','atp_mainmenu_bg',
'atp_mainmenu_linkhover','atp_mainmenu_sub_bg','atp_mainmenu_sub_linkhover','atp_mainmenu_sub_hoverbg',
'atp_mainmenu_bordercolor','atp_entrytitle','atp_overlayimages','atp_subheadertext',
'atp_wrapbg','atp_link','atp_linkhover','atp_subheaderlink','atp_subheaderlinkhover','atp_subheader_pt',
'atp_subheader_pb','atp_logo_mt','atp_logo_mb','atp_extracss','atp_fpwidget_title','atp_homepageteaser','atp_teaser_bg','atp_headings','atp_secmenubg',
'atp_fontwoff','atp_fontttf','atp_fontsvg','atp_fonteot','atp_fontname','atp_fontclass','atp_bodyfont','atp_headingsfont','atp_mainmenufont','atp_pricebgcolor'
);
foreach($atp_option_var as $value){
	$$value = get_option($value);
}

//------------------------------------------------------------------------------------------------------
// B O D Y  B G  P R O P E R T I E S
//------------------------------------------------------------------------------------------------------

$bodyimage =  generate_imagecss($atp_bodyproperties,array('background-color'=>'color'));
if($atp_overlayimages) 
	$overlayimages =  generate_css(array('background-image'=>'url('.THEME_URI.'/images/patterns/'.$atp_overlayimages.')'));
else
	$overlayimages = '';
$themecolor		= $atp_themecolor	? $atp_themecolor : '';

$bodyfont = $atp_bodyfont ? 'font-family:'.$atp_bodyfont.';': '';
$headingsfont = $atp_headingsfont ? 'font-family:'.$atp_headingsfont.';': '';
$mainmenufontFace = $atp_mainmenufont ? 'font-family:'.$atp_mainmenufont.';': '';

$bodyp = generate_fontcss($atp_bodyp);

//------------------------------------------------------------------------------------------------------
// S L I D E R   B A C K G R O U N D   P R O P E R T I E S
//------------------------------------------------------------------------------------------------------
$subheaderbg =  generate_imagecss($atp_subheaderproperties,array('background-color'=>'color'));
$subheader_pt = $atp_subheader_pt ? 'padding-top:'.(int)$atp_subheader_pt.'px;': '';
$subheader_pb = $atp_subheader_pb ? 'padding-bottom:'.(int)$atp_subheader_pb.'px;': '';
$footerbgcolor = $atp_footerbgcolor ? 'background-color:'.$atp_footerbgcolor.';': '';
$footertextcolor = $atp_footertextcolor ? 'color:'.$atp_footertextcolor.';': '';
$copybgcolor = $atp_copybgcolor ? 'background-color:'.$atp_copybgcolor.';': '';
$subheadertext = $atp_subheadertext ? 'color:'.$atp_subheadertext.';': '';
//------------------------------------------------------------------------------------------------------
// L O G O   T A G L I N E 
//------------------------------------------------------------------------------------------------------
$logotitle = generate_fontcss($atp_logotitle);
$tagline = generate_fontcss($atp_tagline);
$logo_mt = $atp_logo_mt ? 'padding-top:'.(int)$atp_logo_mt.'px;': '';
$logo_mb = $atp_logo_mb ? 'padding-bottom:'.(int)$atp_logo_mb.'px;': '';

//------------------------------------------------------------------------------------------------------
// S T I C K Y
//------------------------------------------------------------------------------------------------------
$stickybgcolor	= $atp_stickybarcolor? 'background:'.$atp_stickybarcolor.';': '';;
$copyright = generate_fontcss($atp_copyrights);

//------------------------------------------------------------------------------------------------------
// Secondary Menu 
//------------------------------------------------------------------------------------------------------
$mainmenubg	= $atp_mainmenu_bg? 'background-color:'.$atp_mainmenu_bg.';': '';
$mainmenufont = generate_fontcss($atp_mainmenu);
$mainmenudropdown = generate_fontcss($atp_mainmenudropdown);
$mainmenu_linkhover	= $atp_mainmenu_linkhover? 'color:'.$atp_mainmenu_linkhover.';': '';
$mainmenu_sub_bg	= $atp_mainmenu_sub_bg? 'background:'.$atp_mainmenu_sub_bg.';': '';
$mainmenu_sub_linkhover	= $atp_mainmenu_sub_linkhover? 'color:'.$atp_mainmenu_sub_linkhover.';': '';
$mainmenu_sub_hoverbg	= $atp_mainmenu_sub_hoverbg? 'background:'.$atp_mainmenu_sub_hoverbg.';': '';
$mainmenu_bordercolor	= $atp_mainmenu_bordercolor? 'border-color:'.$atp_mainmenu_bordercolor.';': '';

//------------------------------------------------------------------------------------------------------
// HEADINGS
//------------------------------------------------------------------------------------------------------
$h1font = generate_fontcss($atp_h1);
$h2font = generate_fontcss($atp_h2);
$h3font = generate_fontcss($atp_h3);
$h4font = generate_fontcss($atp_h4);
$h5font = generate_fontcss($atp_h5);
$h6font = generate_fontcss($atp_h6);

//------------------------------------------------------------------------------------------------------
// ENTRY TITLE
//------------------------------------------------------------------------------------------------------
$entrytitlefont = generate_fontcss($atp_entrytitle);
$entrytitlelinkhover= $atp_entrytitlelinkhover? 'color:'.$atp_entrytitlelinkhover.';': '';
$homepageteaser = generate_fontcss($atp_homepageteaser);
//------------------------------------------------------------------------------------------------------
// WIDGET TITLE
//------------------------------------------------------------------------------------------------------
$sidebartitlefont = generate_fontcss($atp_sidebartitle);
$footertitlefont = generate_fontcss($atp_footertitle);
$fpwidgettitle = generate_fontcss($atp_fpwidget_title);

$wrapbg	= $atp_wrapbg ? 'background-color:'.$atp_wrapbg.';': '';
$secmenubg	= $atp_secmenubg ? 'background-color:'.$atp_secmenubg.';': '';
$linkcolor	= $atp_link ? 'color:'.$atp_link.';': '';
$linkhovercolor	= $atp_linkhover ? 'color:'.$atp_linkhover.';': '';
$subheaderlink	= $atp_subheaderlink ? 'color:'.$atp_subheaderlink.';': '';
$subheaderlinkhover	= $atp_subheaderlinkhover ? 'color:'.$atp_subheaderlinkhover.';': '';
$breadcrumblink	= $atp_breadcrumblink ? 'color:'.$atp_breadcrumblink.';': '';
$breadcrumblinkhover = $atp_breadcrumblinkhover ? 'color:'.$atp_breadcrumblinkhover.';': '';
$teaser_bg = $atp_teaser_bg ? 'background-color:'.$atp_teaser_bg.';': '';

$footerlink = $atp_footerlink ? 'color:'.$atp_footerlink.';': '';
$footerlinkhover = $atp_footerlinkhover ? 'color:'.$atp_footerlinkhover.';': '';
$copyrightlink = $atp_copyrightlink ? 'color:'.$atp_copyrightlink.';': '';
$headings = $atp_headings ? 'color:'.$atp_headings.';': '';
$pricebgcolor = $atp_pricebgcolor ? 'background-color:'.$atp_pricebgcolor.';': '';

// THEME COLOR 
?>
<style>
<?php if($themecolor != '' ) { ?>
.topbar, 
#subheader,
.menulist .price,
.copyright, 
.widget-title span,
table.fancy_table th {
	background-color:<?php echo $themecolor; ?>
}

a,
a:focus,
a:visited,
.sf-menu li:hover, .sf-menu li.sfHover,
.sf-menu a:focus, .sf-menu a:hover, 
.sf-menu a:active,
.sf-menu li li:hover, .sf-menu li li.sfHover,
.sf-menu li li a:focus, .sf-menu li li a:hover, 
.sf-menu li li a:active,
.sf-menu li.current-cat > a, 
.sf-menu li.current_page_item > a {
	color:<?php echo $themecolor; ?>
}

.topbar, #subheader, #footer {
	border-color:<?php echo $themecolor; ?>
}
<?php } ?>
<?php if($atp_logo === 'title' && $logotitle != '' || $logo_mt !='' || $logo_mb !='') { ?>
h1#site-title a     { <?php echo $logotitle ?> }
h2#site-description { <?php echo $tagline ?> }
.logo               { <?php echo $logo_mt ?> <?php echo $logo_mb ?> }
<?php } ?>

body { <?php echo $bodyimage; ?> }
body { <?php echo $bodyp; ?> }
.bodyoverlay { <?php echo $overlayimages; ?>}
.topbar { <?php echo $secmenubg; ?>}
h1, h2, h3, h4, h5, h6 { <?php echo $headingsfont; ?> }
body { <?php echo $bodyfont; ?> }
#subheader {
	<?php echo $subheaderbg; ?>
	<?php echo $subheadertext; ?>
	<?php echo $subheader_pt; ?>
	<?php echo $subheader_pb; ?>
}
.menulist .price { 
<?php echo $pricebgcolor; ?>
}

#sticky { 
<?php echo $stickybgcolor; ?>
}
.primarymenu {
	<?php echo $mainmenubg; ?>
}
.sf-menu a {
	<?php echo $mainmenufont; ?>
	<?php echo $mainmenufontFace; ?>
}
.sf-menu li li a {
	<?php echo $mainmenudropdown; ?>
}
.sf-menu li:hover a, 
.sf-menu li.sfHover a,
.sf-menu a:focus, 
.sf-menu a:hover, 
.sf-menu a:active {
	<?php echo $mainmenu_linkhover; ?>
}

.sf-menu li:hover, .sf-menu li.sfHover,
.sf-menu a:focus, .sf-menu a:hover, .sf-menu a:active,
.sf-menu  .current_page_ancestor,
.sf-menu ul.sub-menu,
.sf-menu ul.sub-menu li.current_page_item a {
	<?php echo $mainmenu_sub_bg; ?>
}
.sf-menu ul a {
	<?php echo $mainmenu_sub_link; ?>
}

.sf-menu li li:hover, .sf-menu li li.sfHover,
.sf-menu li li a:focus, .sf-menu li li a:hover, 
.sf-menu li li a:active {
	<?php echo $mainmenu_sub_linkhover; ?>
}
.sf-menu li li:hover, .sf-menu li li.sfHover,
.sf-menu li li a:focus, .sf-menu li li a:hover, 
.sf-menu li li a:active {
	<?php echo $mainmenu_sub_hoverbg; ?>
}

.sf-menu li li a {
	<?php echo $mainmenu_bordercolor; ?>
}

.sf-menu li.current-cat > a, 
.sf-menu li.current_page_item > a,
.sf-menu li.current-page-ancestor > a { <?php echo $mainmenu_active_link; ?> }

h1 { <?php echo $h1font; ?> }
h2 { <?php echo $h2font; ?> }
h3 { <?php echo $h3font; ?> }
h4 { <?php echo $h4font; ?> }
h5 { <?php echo $h5font; ?> }
h6 { <?php echo $h6font; ?> }

h2.entry-title a { 
	<?php echo $entrytitlefont; ?>
}
h2.entry-title a:hover { 
	<?php echo $entrytitlelinkhover; ?>
}
.teaserbox .teaserbox_content { 
	<?php echo $homepageteaser; ?>
}

.teaserbox { 
	<?php echo $teaser_bg; ?>
}

.widget-title { 
	<?php echo $sidebartitlefont; ?>
}
.fp-widget .widget-title  { 
	<?php echo $fpwidgettitle; ?>
}
#footer .widget-title { 
	<?php echo $footertitlefont; ?>
}
.pagemid { 
	<?php echo $wrapbg; ?>
}
a,
.entry-title a { 
	<?php echo $linkcolor; ?>
}
a:hover,
.entry-title a:hover { 
	<?php echo $linkhovercolor; ?>
}
#subheader a { 
	<?php echo $subheaderlink; ?>
}
#subheader a:hover { 
	<?php echo $subheaderlinkhover; ?>
}

.breadcrumbs a { 
	<?php echo $breadcrumblink; ?>
}
.breadcrumbs a:hover { 
	<?php echo $breadcrumblinkhover; ?>
}
#footer { 
	<?php echo $footerbgcolor; ?>
	<?php echo $footertextcolor; ?>
}
#footer a { 
	<?php echo $footerlink; ?>
}
#footer a:hover { 
	<?php echo $footerlinkhover; ?>
}

.copyright { 
	<?php echo $copybgcolor; ?>
	<?php echo $copyright; ?>
}
.copyright a { 
	<?php echo $copyrightlink; ?>
}
<?php if($atp_extracss != '') { ?>
<?php echo $atp_extracss; ?>
<?php } ?>
<?php
if(($atp_fontwoff !='') && ($atp_fontttf !='') && ($atp_fontsvg !='') && ($atp_fonteot !='')) {
$fontclass=$atp_fontclass ? $atp_fontclass :'h1,h2,h3,h4,h5,h6,#atp_menu a,.splitter ul li a,.pagination';

?>
@font-face {
    font-family: '<?php echo $atp_fontname; ?>';
    src: url('<?php echo $atp_fontwoff; ?>');
    src: url('<?php echo $atp_fonteot; ?>?#iefix') format('embedded-opentype'),
         url('<?php echo $atp_fontwoff; ?>') format('woff'),
         url('<?php echo $atp_fontttf; ?>') format('truetype'),
         url('<?php echo $atp_fontsvg; ?>#<?php echo $atp_fontname; ?>') format('svg');
    font-weight: normal;
    font-style: normal;

}
<?php echo $fontclass; ?> {
font-family: '<?php echo $atp_fontname; ?>';
}
<?php
define('CUSTOMFONT',true);
}
?>
</style>
<?php
}
add_action('wp_head','atp_style',100);


//for font css attributes
function generate_fontcss($arr_var) {
	$size			= $arr_var['size'] 			? 'font-size:'.$arr_var['size'].';': '';
	$color			= $arr_var['color'] 		? 'color:'.$arr_var['color'].';': '';
	$lineheight		= $arr_var['lineheight']	? 'line-height:'.$arr_var['lineheight'].';': '';
	$style			= $arr_var['style'] 		? 'font-style:'.$arr_var['style'].';': '';
	$variant		= $arr_var['fontvariant'] 	? 'font-weight:'.$arr_var['fontvariant'].';': '';
	
	return "{$size} {$color} {$lineheight} {$style} {$variant}";
}

//for background image css attributes
function generate_imagecss($arr,$include_others) {

	$str='';
	if($arr['image']!='') {
	
		$str .='background-image:url('.$arr['image'].');
		background-repeat:'.$arr['style'].';
		background-position:'.$arr['position'].';
		background-attachment:'.$arr['attachment'].';';
	}
	
	if(is_array($include_others)) {
		foreach($include_others as $key => $val) {
			if($arr[$val]!='')
				$str .=$key.':'.$arr[$val].';';
		}
	}
	return $str;
}

//forkey value css pairs
function  generate_css($arr) {
	$str='';
	if(is_array($arr)) {
		foreach($arr as $key => $val) {
			$str .=$key.':'.$val.';';
		}
	}
	return $str;
}
?>