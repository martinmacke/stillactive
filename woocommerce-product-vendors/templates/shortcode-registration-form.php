<?php
/**
 * Vendor Registration Form Template
 *
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

	<?php if ( ! is_user_logged_in() ) { ?>

<h2><?php esc_html_e( 'Personal Information', 'stillactive' ); ?></h2>
<p><?php esc_html_e( 'This person will be the primary contact for all communication between you and Still Active. You will use this email address to log into your account.', 'stillactive' ); ?></p>

<form class="wcpv-shortcode-registration-form">

	<?php do_action( 'wcpv_registration_form_start' ); ?>
		<p class="form-row form-row-first">
			<label for="wcpv-firstname"><?php esc_html_e( 'First Name', 'woocommerce-product-vendors' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="firstname" id="wcpv-firstname" value="<?php if ( ! empty( $_POST['firstname'] ) ) echo esc_attr( trim( $_POST['firstname'] ) ); ?>" tabindex="1" />
		</p>

		<p class="form-row form-row-last">
			<label for="wcpv-lastname"><?php esc_html_e( 'Last Name', 'woocommerce-product-vendors' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="lastname" id="wcpv-lastname" value="<?php if ( ! empty( $_POST['lastname'] ) ) echo esc_attr( trim( $_POST['lastname'] ) ); ?>" tabindex="2" />
		</p>
		
		<div class="clear"></div>
		
		<p class="form-row form-row-wide">
			<label for="wcpv-username"><?php esc_html_e( 'Login Username', 'woocommerce-product-vendors' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="username" id="wcpv-username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( trim( $_POST['username'] ) ); ?>" tabindex="3" />
		</p>

		<p class="form-row form-row-first">
			<label for="wcpv-email"><?php esc_html_e( 'Email', 'woocommerce-product-vendors' ); ?> <span class="required">*</span></label>
			<input type="email" class="input-text" name="email" id="wcpv-email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( trim( $_POST['email'] ) ); ?>" tabindex="4" />
		</p>

		<p class="form-row form-row-last">
			<label for="wcpv-confirm-email"><?php esc_html_e( 'Confirm Email', 'woocommerce-product-vendors' ); ?> <span class="required">*</span></label>
			<input type="email" class="input-text" name="confirm_email" id="wcpv-confirm-email" value="<?php if ( ! empty( $_POST['confirm_email'] ) ) echo esc_attr( trim( $_POST['confirm_email'] ) ); ?>" tabindex="5" />
		</p>
	
	
	
	<div class="clear"></div>

	<h2><?php esc_html_e( 'Company Information', 'stillactive' ); ?></h2>

	<p class="form-row form-row-wide">
		<label for="wcpv-vendor-vendor-name"><?php esc_html_e( 'Company Name', 'woocommerce-product-vendors' ); ?> <span class="required">*</span></label>
		<input class="input-text" type="text" name="vendor_name" id="wcpv-vendor-name" value="<?php if ( ! empty( $_POST['vendor_name'] ) ) echo esc_attr( trim( $_POST['vendor_name'] ) ); ?>" tabindex="6" />
		<em class="wcpv-field-note"><?php esc_html_e( 'Important: This is the name that customers see when purchasing your products.  Please choose carefully.', 'woocommerce-product-vendors' ); ?></em>
	</p>

	<p class="form-row form-row-wide">
		<label for="wcpv-vendor-description"><?php esc_html_e( 'Please describe something about your company and what you sell.', 'woocommerce-product-vendors' ); ?> <span class="required">*</span></label>
		<textarea class="input-text" name="vendor_description" id="wcpv-vendor-description" rows="4" tabindex="7"><?php if ( ! empty( $_POST['vendor_description'] ) ) echo trim( $_POST['vendor_description'] ); ?></textarea>
	</p>

	<?php do_action( 'wcpv_registration_form' ); ?>

<p class="form-row text-center">
	<?php _e('Confirm that you accept our <a href="/affiliation-agreement/">Affiliation Agreement</a>and <a href="/privacy-policy/">Privacy Policy</a> and that you are authorised to submit this application on behalf of the company you are applying for.', 'stillactive'); ?>
</p>

	<p class="form-row text-center">
		<input type="submit" class="btn btn-primary" name="register" value="<?php esc_attr_e( 'Submit Application', 'woocommerce-product-vendors' ); ?>" tabindex="8" />
	</p>

	<?php do_action( 'wcpv_registration_form_end' ); ?>

<?php } ?>

</form>
