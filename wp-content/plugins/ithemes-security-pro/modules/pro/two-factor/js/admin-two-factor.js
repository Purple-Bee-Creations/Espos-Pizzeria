jQuery( document ).ready( function () {

	jQuery( "#itsec_two_factor_enabled" ).change(function () {

		if ( jQuery( "#itsec_two_factor_enabled" ).is( ':checked' ) ) {

			jQuery( "#two_factor-settings" ).show();

		} else {

			jQuery( "#two_factor-settings" ).hide();

		}

	} ).change();

} );