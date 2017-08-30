<?php

/**
 * Register term fields
 */
function sa_register_vendor_custom_fields() {
	add_action( WC_PRODUCT_VENDORS_TAXONOMY . '_add_form_fields', 'add_vendor_custom_fields', 180 );
	add_action( WC_PRODUCT_VENDORS_TAXONOMY . '_edit_form_fields', 'edit_vendor_custom_fields', 10 );
	add_action( 'edited_' . WC_PRODUCT_VENDORS_TAXONOMY, 'save_vendor_custom_fields' );
	add_action( 'created_' . WC_PRODUCT_VENDORS_TAXONOMY, 'save_vendor_custom_fields' );
}
add_action( 'init', 'sa_register_vendor_custom_fields' );

/**
 * Add term fields form
 */
function add_vendor_custom_fields() {

	wp_nonce_field( basename( __FILE__ ), 'vendor_custom_fields_nonce' );
	?>

	<div class="form-field">
		<label for="wcpv-date_of_birth"><?php esc_html_e( 'Date of birth', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" name="date_of_birth" id="wcpv-date_of_birth" value="<?php if ( ! empty( $_POST['date_of_birth'] ) ) echo esc_attr( trim( $_POST['date_of_birth'] ) ); ?>" placeholder="DD / MM / YY" />
	</div>
	<div class="form-field">
		<label for="wcpv-personal_address"><?php esc_html_e( 'Personal Address', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" name="personal_address" id="wcpv-personal_address" value="<?php if ( ! empty( $_POST['personal_address'] ) ) echo esc_attr( trim( $_POST['personal_address'] ) ); ?>" />
	</div>
	<div class="form-field">
		<label for="wcpv-city"><?php esc_html_e( 'City', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" name="city" id="wcpv-city" value="<?php if ( ! empty( $_POST['city'] ) ) echo esc_attr( trim( $_POST['city'] ) ); ?>" />
	</div>
	<div class="form-field">
		<label for="wcpv-zipcode"><?php esc_html_e( 'Zip', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" name="zipcode" id="wcpv-zipcode" value="<?php if ( ! empty( $_POST['zipcode'] ) ) echo esc_attr( trim( $_POST['zipcode'] ) ); ?>" />
	</div>

	<div class="form-field">
		<label for="wcpv-taxid"><?php esc_html_e( 'Tax ID', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" name="taxid" id="wcpv-taxid" value="<?php if ( ! empty( $_POST['taxid'] ) ) echo esc_attr( trim( $_POST['taxid'] ) ); ?>" />
	</div>
	<div class="form-field">
		<label for="wcpv-business_address"><?php esc_html_e( 'Business Address', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" name="business_address" id="wcpv-business_address" value="<?php if ( ! empty( $_POST['business_address'] ) ) echo esc_attr( trim( $_POST['business_address'] ) ); ?>" />
	</div>
	<div class="form-field">
		<label for="wcpv-bcity"><?php esc_html_e( 'Business City', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" name="bcity" id="wcpv-bcity" value="<?php if ( ! empty( $_POST['bcity'] ) ) echo esc_attr( trim( $_POST['bcity'] ) ); ?>" />
	</div>
	<div class="form-field">
		<label for="wcpv-bzipcode"><?php esc_html_e( 'Business Zip', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" name="bzipcode" id="wcpv-bzipcode" value="<?php if ( ! empty( $_POST['bzipcode'] ) ) echo esc_attr( trim( $_POST['bzipcode'] ) ); ?>" />
	</div>

	<?php
}
/**
 * Edit term fields form
 */
function edit_vendor_custom_fields( $term ) {
	wp_nonce_field( basename( __FILE__ ), 'vendor_custom_fields_nonce' );
	?>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-date_of_birth"><?php esc_html_e( 'Date of birth', 'stillactive' ); ?> <span class="required">*</span></label></th>
		<td>
			<input type="text" name="date_of_birth" id="wcpv-date_of_birth" value="<?php if ( ! empty( $_POST['date_of_birth'] ) ) echo esc_attr( trim( $_POST['date_of_birth'] ) ); ?>" placeholder="DD / MM / YY" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-personal_address"><?php esc_html_e( 'Personal Address', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="personal_address" id="wcpv-personal_address" value="<?php if ( ! empty( $_POST['personal_address'] ) ) echo esc_attr( trim( $_POST['personal_address'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-city"><?php esc_html_e( 'City', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="city" id="wcpv-city" value="<?php if ( ! empty( $_POST['city'] ) ) echo esc_attr( trim( $_POST['city'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-zipcode"><?php esc_html_e( 'Zip', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="zipcode" id="wcpv-zipcode" value="<?php if ( ! empty( $_POST['zipcode'] ) ) echo esc_attr( trim( $_POST['zipcode'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-taxid"><?php esc_html_e( 'Tax ID', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="taxid" id="wcpv-taxid" value="<?php if ( ! empty( $_POST['taxid'] ) ) echo esc_attr( trim( $_POST['taxid'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-business_address"><?php esc_html_e( 'Business Address', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="business_address" id="wcpv-business_address" value="<?php if ( ! empty( $_POST['business_address'] ) ) echo esc_attr( trim( $_POST['business_address'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-bcity"><?php esc_html_e( 'Business City', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="bcity" id="wcpv-bcity" value="<?php if ( ! empty( $_POST['bcity'] ) ) echo esc_attr( trim( $_POST['bcity'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-bzipcode"><?php esc_html_e( 'Business Zip', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="bzipcode" id="wcpv-bzipcode" value="<?php if ( ! empty( $_POST['bzipcode'] ) ) echo esc_attr( trim( $_POST['bzipcode'] ) ); ?>" />
		</td>
	</tr>

	<?php
}
/**
 * Save term fields
 */
function save_vendor_custom_fields( $term_id ) {
	if ( ! wp_verify_nonce( $_POST['vendor_custom_fields_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	$old_fb      = get_term_meta( $term_id, 'facebook', true );
	$old_twitter = get_term_meta( $term_id, 'twitter', true );

	$new_fb      = esc_url( $_POST['facebook'] );
	$new_twitter = esc_url( $_POST['twitter'] );

	if ( ! empty( $old_fb ) && $new_fb === '' ) {
		delete_term_meta( $term_id, 'facebook' );
	} else if ( $old_fb !== $new_fb ) {
		update_term_meta( $term_id, 'facebook', $new_fb, $old_fb );
	}

	if ( ! empty( $old_twitter ) && $new_twitter === '' ) {
		delete_term_meta( $term_id, 'twitter' );
	} else if ( $old_twitter !== $new_twitter ) {
		update_term_meta( $term_id, 'twitter', $new_twitter, $old_twitter );
	}
}

add_action( 'wcpv_registration_form_custom', 'vendors_reg_custom_fields_custom' );
function vendors_reg_custom_fields_custom() {
	?>
	<p class="form-row form-row-first">
		<label for="wcpv-date_of_birth"><?php esc_html_e( 'Date of birth', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="date_of_birth" id="wcpv-date_of_birth" value="<?php if ( ! empty( $_POST['date_of_birth'] ) ) echo esc_attr( trim( $_POST['date_of_birth'] ) ); ?>" placeholder="DD / MM / YY" />
	</p>
	<div class="clear"></div>


	<p class="form-row form-row-first">
		<label for="wcpv-personal_address"><?php esc_html_e( 'Personal Address', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="personal_address" id="wcpv-personal_address" value="<?php if ( ! empty( $_POST['personal_address'] ) ) echo esc_attr( trim( $_POST['personal_address'] ) ); ?>" />
	</p>
	<p class="form-row form-row-last">
		<label for="wcpv-city"><?php esc_html_e( 'City', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-city" name="city" id="wcpv-city" value="<?php if ( ! empty( $_POST['city'] ) ) echo esc_attr( trim( $_POST['city'] ) ); ?>" />
	</p>
	<div class="clear"></div>

	<p class="form-row form-row-first">
		<label for="wcpv-zipcode"><?php esc_html_e( 'Zip', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="zipcode" id="wcpv-zipcode" value="<?php if ( ! empty( $_POST['zipcode'] ) ) echo esc_attr( trim( $_POST['zipcode'] ) ); ?>" />
	</p>
	<div class="clear"></div>

	<?php
}

add_action( 'wcpv_registration_form', 'vendors_reg_custom_fields' );
function vendors_reg_custom_fields() {
	?>
	<p class="form-row form-row-last">
		<label for="wcpv-taxid"><?php esc_html_e( 'Tax ID', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-taxid" name="taxid" id="wcpv-taxid" value="<?php if ( ! empty( $_POST['taxid'] ) ) echo esc_attr( trim( $_POST['taxid'] ) ); ?>" />
	</p>
	<div class="clear"></div>

	<p class="form-row form-row-first">
		<label for="wcpv-business_address"><?php esc_html_e( 'Business Address', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="business_address" id="wcpv-business_address" value="<?php if ( ! empty( $_POST['business_address'] ) ) echo esc_attr( trim( $_POST['business_address'] ) ); ?>" />
	</p>

	<p class="form-row form-row-last">
		<label for="wcpv-bcity"><?php esc_html_e( 'City', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-bcity" name="bcity" id="wcpv-bcity" value="<?php if ( ! empty( $_POST['bcity'] ) ) echo esc_attr( trim( $_POST['bcity'] ) ); ?>" />
	</p>
	<div class="clear"></div>

	<p class="form-row form-row-first">
		<label for="wcpv-bzipcode"><?php esc_html_e( 'Zip', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="bzipcode" id="wcpv-bzipcode" value="<?php if ( ! empty( $_POST['bzipcode'] ) ) echo esc_attr( trim( $_POST['bzipcode'] ) ); ?>" />
	</p>
	<div class="clear"></div>

	<?php
}

add_action( 'wcpv_shortcode_registration_form_process', 'vendors_reg_custom_fields_save', 10, 2 );
function vendors_reg_custom_fields_save( $args, $items ) {
	$term = get_term_by( 'name', $items['vendor_name'], WC_PRODUCT_VENDORS_TAXONOMY );

	if ( isset( $items['facebook'] ) && ! empty( $items['facebook'] ) ) {
		$fb = esc_url( $items['facebook'] );
		update_term_meta( $term->term_id, 'facebook', $fb );
	}

	if ( isset( $items['twitter'] ) && ! empty( $items['twitter'] ) ) {
		$twitter = esc_url( $items['twitter'] );
		update_term_meta( $term->term_id, 'twitter', $twitter );
	}
}


add_action( 'wcpv_shortcode_registration_form_validation', 'sa_wc_custom_vendors_validation', 10, 2 );
function sa_wc_custom_vendors_validation( $errors, $form_items ) {
	if ( empty( $form_items['date_of_birth'] ) ) {
		$errors[] = __( 'Date of birth is a required field.', 'stillactive' );
	}
	return $errors;
}
