<?php

$custom_name_fields_array 	= array(
	'firstname' 	=> array(
		'label' 	=> 'First name',
		'type' 		=> 'date',
	),
	'lastname' 	=> array(
		'label' 	=> 'Last name',
		'type' 		=> 'date',
	),
);
define( 'CUSTOM_NAME_FIELDS_ARRAY', $custom_name_fields_array );

$custom_personal_fields_arr 	= array(
	'date_of_birth' 		=> array(
		'label' 	=> 'Date of birth',
		'type' 		=> 'date',
	),
	'address' 	=> array(
		'label' 	=> 'Personal address',
		'type' 		=> 'text',
	),
	'city' 							=> array(
		'label' 	=> 'City',
		'type' 		=> 'text',
	),
	'zipcode' 					=> array(
		'label' 	=> 'Zip',
		'type' 		=> 'text',
	),
);
define( 'CUSTOM_PERSONAL_FIELDS_ARRAY', $custom_personal_fields_arr );


$custom_company_fields_arr 	= array(
	'taxid' 						=> array(
		'label' 	=> 'Tax ID',
		'type' 		=> 'text',
	),
	'business_address' 	=> array(
		'label' 	=> 'Business address',
		'type' 		=> 'text',
	),
	'bcity' 						=> array(
		'label' 	=> 'City',
		'type' 		=> 'text',
	),
	'bzipcode' 					=> array(
		'label' 	=> 'Zip',
		'type' 		=> 'text',
	),
);
define( 'CUSTOM_COMPANY_FIELDS_ARRAY', $custom_company_fields_arr );

define( 'CUSTOM_FIELDS_ARRAY', array_merge( CUSTOM_NAME_FIELDS_ARRAY, CUSTOM_PERSONAL_FIELDS_ARRAY, CUSTOM_COMPANY_FIELDS_ARRAY ) );

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
		<label for="wcpv-firstname"><?php esc_html_e( 'First Name', 'woocommerce-product-vendors' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="firstname" id="wcpv-firstname" value="<?php if ( ! empty( $_POST['firstname'] ) ) echo esc_attr( trim( $_POST['firstname'] ) ); ?>" tabindex="1" />
	</div>

	<div class="form-field">
		<label for="wcpv-lastname"><?php esc_html_e( 'Last Name', 'woocommerce-product-vendors' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="lastname" id="wcpv-lastname" value="<?php if ( ! empty( $_POST['lastname'] ) ) echo esc_attr( trim( $_POST['lastname'] ) ); ?>" tabindex="2" />
	</div>

	<div class="form-field">
		<label for="wcpv-date_of_birth"><?php esc_html_e( 'Date of birth', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="date" name="date_of_birth" id="wcpv-date_of_birth" value="<?php if ( ! empty( $_POST['date_of_birth'] ) ) echo esc_attr( trim( $_POST['date_of_birth'] ) ); ?>" placeholder="DD / MM / YY" />
	</div>
	<div class="form-field">
		<label for="wcpv-address"><?php esc_html_e( 'Personal Address', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" name="address" id="wcpv-address" value="<?php if ( ! empty( $_POST['address'] ) ) echo esc_attr( trim( $_POST['address'] ) ); ?>" />
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

	$term_meta 	= get_term_meta( $term->term_id, 'vendor_data', true );
	wp_nonce_field( basename( __FILE__ ), 'vendor_custom_fields_nonce' );
	?>

	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-firstname"><?php esc_html_e( 'First Name', 'woocommerce-product-vendors' ); ?> <span class="required">*</span></label>
		</th>
		<td>
			<input type="text" class="input-text" name="firstname" id="wcpv-firstname" value="<?php if ( isset( $term_meta['firstname'] ) ) echo esc_attr( trim( $term_meta['firstname'] ) ); ?>" tabindex="1" />
		</td>
	</tr>

	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-lastname"><?php esc_html_e( 'Last Name', 'woocommerce-product-vendors' ); ?> <span class="required">*</span></label>
		</th>
		<td>
			<input type="text" class="input-text" name="lastname" id="wcpv-lastname" value="<?php if ( isset( $term_meta['lastname'] ) ) echo esc_attr( trim( $term_meta['lastname'] ) ); ?>" tabindex="2" />
		</td>
	</tr>

	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-date_of_birth"><?php esc_html_e( 'Date of birth', 'stillactive' ); ?> <span class="required">*</span></label></th>
		<td>
			<input type="date" name="date_of_birth" id="wcpv-date_of_birth" value="<?php if ( isset( $term_meta['date_of_birth'] ) ) echo esc_attr( trim( $term_meta['date_of_birth'] ) ); ?>" placeholder="DD / MM / YY" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-address"><?php esc_html_e( 'Personal Address', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="address" id="wcpv-address" value="<?php if ( isset( $term_meta['address'] ) ) echo esc_attr( trim( $term_meta['address'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-city"><?php esc_html_e( 'City', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="city" id="wcpv-city" value="<?php if ( isset( $term_meta['city'] ) ) echo esc_attr( trim( $term_meta['city'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-zipcode"><?php esc_html_e( 'Zip', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="zipcode" id="wcpv-zipcode" value="<?php if ( isset( $term_meta['zipcode'] ) ) echo esc_attr( trim( $term_meta['zipcode'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-taxid"><?php esc_html_e( 'Tax ID', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="taxid" id="wcpv-taxid" value="<?php if ( isset( $term_meta['taxid'] ) ) echo esc_attr( trim( $term_meta['taxid'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-business_address"><?php esc_html_e( 'Business Address', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="business_address" id="wcpv-business_address" value="<?php if ( isset( $term_meta['business_address'] ) ) echo esc_attr( trim( $term_meta['business_address'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-bcity"><?php esc_html_e( 'Business City', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="bcity" id="wcpv-bcity" value="<?php if ( isset( $term_meta['bcity'] ) ) echo esc_attr( trim( $term_meta['bcity'] ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="wcpv-bzipcode"><?php esc_html_e( 'Business Zip', 'stillactive' ); ?> <span class="required">*</span></label>
		<td>
			<input type="text" name="bzipcode" id="wcpv-bzipcode" value="<?php if ( isset( $term_meta['bzipcode'] ) ) echo esc_attr( trim( $term_meta['bzipcode'] ) ); ?>" />
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

	foreach ( CUSTOM_FIELDS_ARRAY as $key => $value ) {
		$old      = get_term_meta( $term_id, $key, true );
		$new      = sanitize_text_field( $_POST[ $key ] );
		if ( ! empty( $old ) && $new === '' ) {
			delete_term_meta( $term_id, $key );
		} else if ( $old !== $new ) {

		}
	}


	$vendor_data 	= get_term_meta( $term_id, 'vendor_data', true );

	foreach ( CUSTOM_FIELDS_ARRAY as $key => $value ) {
		$vendor_data[ $key ] = sanitize_text_field( $_POST[ $key ] );
	}

	update_term_meta( $term_id, 'vendor_data', $vendor_data );

}//save_vendor_custom_fields



// Front End functionality below
add_action( 'wcpv_registration_form_custom', 'vendors_reg_custom_fields_custom' );
function vendors_reg_custom_fields_custom() {
	?>
	<style>
		body {
			background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/vendors-image.jpeg');
			background-position: center;
			background-attachment: fixed;
			background-size: cover;
			background-repeat: no-repeat;
		}
		body:before{
			width: 100%;
			height: 100%;
			content: '';
			background: rgba(255, 255, 255, 0.85);
			position: absolute;
			top: 0;
			left: 0;
		}
	</style>
	<p class="form-row form-row-first">
		<label for="wcpv-date_of_birth"><?php esc_html_e( 'Date of birth', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="date" class="input-text" name="date_of_birth" id="wcpv-date_of_birth" value="<?php if ( ! empty( $_POST['date_of_birth'] ) ) echo esc_attr( trim( $_POST['date_of_birth'] ) ); ?>" placeholder="DD / MM / YY" />
	</p>
	<div class="clear"></div>


	<p class="form-row form-row-first">
		<label for="wcpv-address"><?php esc_html_e( 'Personal Address', 'stillactive' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="address" id="wcpv-address" value="<?php if ( ! empty( $_POST['address'] ) ) echo esc_attr( trim( $_POST['address'] ) ); ?>" />
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
	$vendor_data 	= get_term_meta( $term->term_id, 'vendor_data', true );

	foreach ( $items as $key => $value ) {
		if( $key === 'username' || $key === 'confirm_email' )
			continue;
		$vendor_data[ $key ] = sanitize_text_field( $items[ $key ] );
	}

	update_term_meta( $term->term_id, 'vendor_data' , $vendor_data );

}//vendors_reg_custom_fields_save


add_filter( 'wcpv_shortcode_registration_form_validation_errors', 'sa_wc_custom_vendors_validation', 10, 2 );
function sa_wc_custom_vendors_validation( $errors, $form_items ) {

	if ( empty( $form_items['date_of_birth'] ) ) {
		$errors[] = __( 'Date of birth is a required field.', 'stillactive' );
	}
	if ( empty( $form_items['address'] ) ) {
		$errors[] = __( 'Personal address is a required field.', 'stillactive' );
	}
	if ( empty( $form_items['city'] ) ) {
		$errors[] = __( 'City is a required field.', 'stillactive' );
	}
	if ( empty( $form_items['zipcode'] ) ) {
		$errors[] = __( 'Zip code is a required field.', 'stillactive' );
	}
	if ( empty( $form_items['taxid'] ) ) {
		$errors[] = __( 'Tax ID is a required field.', 'stillactive' );
	}
	if ( empty( $form_items['business_address'] ) ) {
		$errors[] = __( 'Business address is a required field.', 'stillactive' );
	}
	if ( empty( $form_items['bcity'] ) ) {
		$errors[] = __( 'Business city is a required field.', 'stillactive' );
	}
	if ( empty( $form_items['bzipcode'] ) ) {
		$errors[] = __( 'Business zipcode is a required field.', 'stillactive' );
	}
	return $errors;
}
