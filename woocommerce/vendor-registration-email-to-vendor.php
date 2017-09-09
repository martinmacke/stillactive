<?php
/**
 * Vendor registration email to vendor
 *
 * @author 		WooThemes
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<h3><?php esc_html_e( 'Hello! Thank you for registering to become a Partner.', 'woocommerce-product-vendors' ); ?></h3>

<p><?php esc_html_e( 'We are excited that you would like to be part of the Still Active Community! In order to ensure highest quality standards for our members, we will check your application and will get back to you as soon as possible.
Should you have any questions in the meantime, please do not hesitate to contact us by email at hello@stillactive.se or by phone at 08-559 22 220.', 'woocommerce-product-vendors' ); ?></p>

<p><?php esc_html_e( 'We are looking forward to be working with you.','woocommerce-product-vendors' ); ?></p>
<p><?php esc_html_e( 'Best regards,','woocommerce-product-vendors' ); ?></p>
<p><?php esc_html_e( 'Signe - Still Active Co-Founder','woocommerce-product-vendors' ); ?></p>



<p><?php  esc_html_e( 'Here is your login account information:', 'woocommerce-product-vendors' ); ?></p>

<ul>
	<li><?php printf( esc_html__( 'Login Address: %s', 'woocommerce-product-vendors' ), admin_url() ); ?></li>
	<li><?php printf( esc_html__( 'Login Name: %s', 'woocommerce-product-vendors' ), $user_login ); ?></li>
	<li><?php printf( esc_html__( 'Login Password: %s', 'woocommerce-product-vendors' ), $user_pass ); ?></li>
</ul> 

<?php do_action( 'woocommerce_email_footer', $email ); ?>
