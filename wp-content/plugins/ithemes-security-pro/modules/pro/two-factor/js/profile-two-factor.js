//process tooltip actions
jQuery( document ).ready( function () {

	jQuery( '#qrcode' ).qrcode( 'otpauth://totp/' + jQuery( '#itsec_two_factor_description' ).val() + ':' + jQuery( '#user_login' ).val() + "?secret=" + jQuery( '#itsec_two_factor_key' ).val() + '&issuer=' + jQuery( '#itsec_two_factor_description' ).val() );

	jQuery( "#itsec_two_factor_enabled" ).change(function () {

		if ( jQuery( "#itsec_two_factor_enabled" ).is( ':checked' ) ) {

			jQuery( "#itsec_two_factor_settings" ).show();

		} else {

			jQuery( "#itsec_two_factor_settings" ).hide();

		}

	} ).change();

	jQuery( "#itsec_two_factor_use_app" ).change(function () {

		if ( jQuery( "#itsec_two_factor_use_app" ).is( ':checked' ) ) {

			jQuery( "#itsec_two_factor_app_pass_settings" ).show();

		} else {

			jQuery( "#itsec_two_factor_app_pass_settings" ).hide();

		}

	} ).change();

	jQuery( '#itsec_two_factor_get_new_key' ).click( function ( event ) {

		event.preventDefault();

		var data = {
			action : 'itsec_two_factor_profile_ajax',
			nonce  : itsec_two_factor_profile.nonce
		};

		//call the ajax
		jQuery.ajax(
			{
				url      : ajaxurl,
				type     : 'POST',
				data     : data,
				complete : function ( response ) {

					jQuery( '#itsec_two_factor_key' ).val( response.responseText );
					jQuery( '#qrcode' ).empty().qrcode( 'otpauth://totp/' + jQuery( '#itsec_two_factor_description' ).val() + ':' + jQuery( '#user_login' ).val() + "?secret=" + jQuery( '#itsec_two_factor_key' ).val() + '&issuer=' + jQuery( '#itsec_two_factor_description' ).val() );

				}
			}
		);

	} );

	jQuery( '#itsec_two_factor_get_new_app_pass' ).click( function ( event ) {

		event.preventDefault();

		var data = {
			action : 'itsec_two_factor_profile_new_app_pass_ajax',
			nonce  : itsec_two_factor_profile.nonce
		};

		//call the ajax
		jQuery.ajax(
			{
				url      : ajaxurl,
				type     : 'POST',
				data     : data,
				complete : function ( response ) {

					jQuery( '#itsec_two_factor_app_pass' ).val( response.responseText );

				}
			}
		);

	} );

} );