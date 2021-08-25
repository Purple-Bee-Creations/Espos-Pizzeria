	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		C A L L B A C K
	 -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */

	jQuery(window).load(function(){
		jQuery('.flexslider').flexslider({
			animation: "slide",				//String: Select your animation type, "fade" or "slide"
			controlsContainer: ".flex-container",
			slideshow: true,					//Boolean: Animate slider automatically
			slideshowSpeed: 3000,				//Integer: Set the speed of the slideshow cycling, in milliseconds
			animationDuration: 1000,			//Integer: Set the speed of animations, in milliseconds
			directionNav: false,				//Boolean: Create navigation for previous/next navigation? (true/false)
			controlNav: true,					//Boolean: Create navigation for paging control of each clide? Note: Leave true for	
			mousewheel: false,					//Boolean: Allow slider navigating via mousewheel				  
			
			start: function(slider) {
				jQuery('.total-slides').text(slider.count);
			},
			after: function(slider) {
				jQuery('.current-slide').text(slider.currentSlide);
			}
		});
	});
	
	var $j = jQuery.noConflict();
	$j(document).ready(function(){
	
		/* TOGGLE Sticky  */
		$j("#trigger").toggle(function(){
			$j(this).addClass("active");
			}, function () {
			$j(this).removeClass("active");
		});
		
		$j("#trigger").click(function(){
			$j(this).next("#sticky").slideToggle({ duration: 1000, easing: 'easeOutQuart'});
		});
		
		$j("ul.tabs").tabs(".panes > .tab_content", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
		
		
	    // jQuery('.lightbox, .gallery a').lightbox();
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({theme:'pp_default'}); /* light_square / dark_rounded /  dark_square / facebook */
		// scroll body to 0px on click
		jQuery('#back_to_top a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
		
		hoverimage();
		menushoverimage();
		sys_toggle();
		buttondata();
		atp_sociables();
	});
	
	
	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
	Mobile Menu
	-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function mobilemenu() {

		var win_width = jQuery(window).width();

		if (win_width < 759) {

			if (!jQuery('.menu-dropdown').length) {

				jQuery('<a class="menu-dropdown" href="ul#sf-mobilemenu" />').appendTo('.header');
				mobilemenuclick();
			}
		} else {
			jQuery("#sf-mobilemenu").css('display', 'none');
		}
	}

	function mobilemenuclick() {
		jQuery('.header .menu-dropdown').click(function (e) {
			jQuery("#sf-mobilemenu").stop().slideToggle(500);
			e.preventDefault();
		});
	}
	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		S O C I A B L E S
	 -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */

	function atp_sociables() {
		jQuery(".atpsocials li").hover(function(){
			jQuery(this).find("img").animate({top:"-5px"}, "fast")
			},function(){
			jQuery(this).find("img").animate({top:"0"}, "fast")
		});	
	}
		
	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		T O G G L E S 
	 -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */

	function sys_toggle() {
		jQuery(".toggle_content").append("<div class='arrow'></div>").hide();
	
		jQuery("span.toggle").toggle(function(){
			jQuery(this).addClass("active");	
		}, function () {
			jQuery(this).removeClass("active");
		});
	
		jQuery("span.toggle").click(function(){
			jQuery(this).next(".toggle_content").slideToggle();
		});	
	}		

	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		M E N U S   H O V E R   I M A G E
	 -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */

	function menushoverimage() {
		jQuery("a[class^='lightbox']").each(function() {
			var $image = jQuery(this).contents("img");
				$hoverclass = 'hover_video';
		
			if( jQuery(this).attr('href').match(/(jpg|gif|jpeg|png|tif)/) ) 
				$hoverclass = 'hover_image';
				
			if ($image.length > 0)
			{	
				var $hoverbg = jQuery("<span class='"+$hoverclass+"'></span>").appendTo(jQuery(this));
				
					jQuery(this).bind('mouseenter', function(){
					$height = $image.height();
					$width = $image.width();
					$pos =  $image.position();		
					$hoverbg.css({height:$height, width:$width, top:$pos.top, left:$pos.left});
				});
			}
		
		});	
	
		jQuery("a[class^='lightbox']").contents("img").hover(function() {
				jQuery(this).stop().animate({"opacity": "0.2"}, 200);
				},function() {
				jQuery(this).stop().animate({"opacity": "1"},200);
		});
	}
	
	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		I M A G E   H O V E R
	 -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function hoverimage() {
		jQuery('.hover_type').animate({opacity: "0"});
		
		jQuery(".carousel_img, .postimg, .port_img, .sort_img").hover(function() {
			jQuery(this).find('.hover_type').css('display','block').animate({opacity: "1"}, "slow");
			jQuery(this).stop().animate({"opacity": "0.9"}, 200);
		},function() {
				jQuery(this).find('.hover_type').animate({opacity: "0"}, "slow");
			jQuery(this).stop().animate({"opacity": "1"}, 200);
		});
	}


	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		B U T T O N   D A T A   A T T R I B U T E S
	 -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function buttondata(){
		jQuery(".button").hover(function(){
			var $hoverBg = jQuery(this).attr('btn-hoverBg');
			var $hoverColor = jQuery(this).attr('btn-hoverColor');
			if( $hoverBg!= undefined ){
				jQuery(this).css('background-color',$hoverBg);
			}else{
			}
			if($hoverColor!=undefined){
				jQuery('span',this).css('color',$hoverColor);
			}else{}
		},function(){
			var $btnbg = jQuery(this).attr('btn-bg');
			var $btncolor = jQuery(this).attr('btn-color');
			if($btnbg!=undefined){
				jQuery(this).css('background-color',$btnbg);
			}
			if($btncolor!=undefined){
				jQuery('span',this).css('color',$btncolor);
			}
		});
	}
	
	jQuery(document).ready(function ($) {
		var atpmobilemenu = $('#atp_menu').clone().attr('id', 'sf-mobilemenu');
		mobilemenu();
		jQuery("#atp_menu").superfish();
		atpmobilemenu.appendTo('.header');
		jQuery("#sf-mobilemenu").removeAttr('class');

	});
	
	jQuery(window).resize(function() {
		mobilemenu();
		jQuery("#sf-mobilemenu").removeAttr('class');
    });

	jQuery(document).ready(function ($) {
		jQuery('.video-frame,.boxcontent,.video-stage,.video,.videoslider').fitVids();
	});