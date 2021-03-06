<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<style>
.woocommerce-account {
	background-image: url( '<?php echo get_template_directory_uri()?>/images/pexels-photo-196667.jpeg' );
	background-position: center;
	background-attachment: fixed; /*default is scroll*/
	background-size: cover;
	background-repeat: no-repeat;
}
.woocommerce-account:before {
    width: 100%;
    height: 100%;
    content: '';
    background: rgba(255, 255, 255, 0.85);
    position: absolute;
    top: 0;
    left: 0;
}
.woocommerce form.register {
max-width: 300px;
width: 100%;
margin: 0 auto;
background: none;
border: none;
border-radius: 10px;
padding: 0;
position: relative;
}
.woocommerce form.register input{
	border-radius:5px;
}
.woocommerce form.register h2{
	margin:10px 0 30px 0;
text-align: center;
font-size: 35px;
    color: #000000;
		font-weight: bold;
}
.woocommerce form.register .wc-social-login{
	text-align: center;
margin: 0 0 15px 0;
}
.woocommerce form.register .accept-terms a{
color: #005678;
font-weight: bold;
}
.woocommerce-account .page-title{
	text-align: center;
padding: 0;
display: none !important;
}
.woocommerce form.register input[type="submit"]:hover{
	background: #46c8f5;
	color: #ffffff;
}

.selection-tag:before, .selection-tag:after {
    height: 1px;
    background: #d2d2d2;
    content: '';
    width: 50%;
    margin: 0 8px;
}
.selection-tag {
    width: 100%;
    text-align: center;
    display: flex;
    line-height: 1px;
}
#customer_login .register .wc-social-login:last-child {
    display: none;
}

</style>



<?php wp_enqueue_script( 'js-login-social', get_template_directory_uri() . '/js/login-social-button.js', array('jquery'), '1.0', true ); ?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div id="customer_login">
		<form method="post" class="register">
<h2><?php _e( 'Register', 'woocommerce' ); ?></h2>

<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				</p>

			<?php endif; ?>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
				</p>

			<?php endif; ?>

			<!-- Spam Trap -->
			<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="woocomerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
			</p>

			<p class="accept-terms small">
				<?php _e('By logging in and registering on our site, you agree with the', 'stillactive'); ?> <a target="_blank" href="<?php the_permalink(595); ?>"><?php _e('Terms and conditions', 'stillactive'); ?></a>.
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>
	</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
