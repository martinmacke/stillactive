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
	background-image: url( '<?php echo get_template_directory_uri()?>/images/sky-people-whitespace-freedom.jpg' );
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
.woocommerce form.login {
	max-width: 300px;
	width: 100%;
margin: 0 auto;
background: none;
border: none;
border-radius: 10px;
padding: 0;
position: relative;
}
.woocommerce form.login input{
	border-radius:5px;
}
.woocommerce form.login h2{
	margin:10px 0 30px 0;
text-align: center;
font-size: 35px;
    color: #000000;
		font-weight: bold;
}
.woocommerce form.login .wc-social-login{
	text-align: center;
margin: 0 0 15px 0;
}
.woocommerce form.login .accept-terms a{
color: #005678;
font-weight: bold;
}
.woocommerce-account .page-title{
	text-align: center;
padding: 0;
display: none !important;
}
.woocommerce form.login input[type="submit"]{
	padding: 14px 0;
	text-transform: uppercase;
	border: none;
	background: #005678;
	border-radius: 50px;
}
.woocommerce form.login input[type="submit"]:hover{
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
</style>


<?php wp_enqueue_script( 'js-login-social', get_template_directory_uri() . '/js/login-social-button.js', array('jquery'), '1.0', true ); ?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>



		<form method="post" class="login">
		<h2><?php _e( 'Login', 'woocommerce' ); ?></h2>

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<h4 class="selection-tag"><?php _e( 'OR', 'woocommerce' ); ?></h4>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
			</p>



			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide pull-left">
				<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
			</p>
			<p style="margin:7px 0 0 0;" class="woocommerce-LostPassword lost_password pull-right">
	<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
</p>
			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
			</p>

			<p><?php do_action( 'woocommerce_login_form' ); ?></p>


			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
				<!-- <label for="rememberme" class="inline">
					<input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
				</label> -->
			</p>

			<p class="accept-terms small">
				<?php _e('By logging in and registering on our site, you agree with the', 'stillactive'); ?>
				 <a  target="_blank" href="<?php the_permalink(595); ?>"><?php _e('Terms and conditions', 'stillactive'); ?></a>.
			</p>

			<p class="accept-terms">
				<?php _e('Don\' have an account yet?', 'stillactive'); ?>
				 <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>?action=register"><?php _e('Sign up', 'stillactive'); ?></a>.
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
