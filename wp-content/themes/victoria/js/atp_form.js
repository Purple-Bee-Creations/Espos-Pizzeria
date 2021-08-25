jQuery(function(){
	jQuery('#contactsubmit').click(function() {
		var name = jQuery('#contact_name').val();
		var email = jQuery('#contact_email').val();
		var contactcomment = jQuery('#contactcomment').val();
		var contact_success = jQuery('#contact_success').val();
		var contact_widgetemail = jQuery('#contact_widgetemail').val();
		var contact_ccorrect = jQuery('#contact_ccorrect').val();
		var contact_captcha = jQuery('#contact_captcha').val();
		if(contact_ccorrect != contact_captcha)	{
			jQuery('#contact_captcha').addClass('error');
		}else{ 
			jQuery('#contact_captcha').removeClass('error'); 
		}
		if(name ==''){
			jQuery('#contact_name').addClass('error');
		}else{ 
			jQuery('#contact_name').removeClass('error'); 
		}
		if(contactcomment =='') {
			jQuery('#contactcomment').addClass('error');
		}else{ 
			jQuery('#contactcomment').removeClass('error'); 
		}
		var filter = /^((\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*?)\s*;?\s*)+/;
		if(filter.test(email)){
		   jQuery('#contact_email').removeClass('error'); 
		}else{
			jQuery('#contact_email').addClass('error');
		}
		
		jQuery.ajax({
            type: 'post',
            url: atp_panel.SiteUrl+'/framework/includes/submitform.php',
            data: 'contact_name=' + name + '&contact_email=' + email + '&contactcomment=' + contactcomment + '&contact_success=' + contact_success + '&contact_widgetemail=' + contact_widgetemail+ '&contact_ccorrect=' + contact_ccorrect+ '&contact_captcha=' + contact_captcha,
            success: function(results) {
				jQuery('#response').html(results);
			}
        }); // end ajax
	});
});