<?php
/**
 * Vendor approved email
 *
 * @author 		WooThemes
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( 'wc_product_vendors_admin_vendor' === $role ) {
	$message = __( 'You have full administration access.', 'woocommerce-product-vendors' );

} else {
	$message = __( 'You have limited management access.', 'woocommerce-product-vendors' );
}
 ?>
 <?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<h3><?php esc_html_e( 'We are happy to let you know, that your application to become a partner of Still Active has been accepted.
', 'woocommerce-product-vendors' ); ?></h3>

<p><?php echo esc_html( $message ); ?></p>
<p><?php esc_html_e( 'Welcome to the family! From this moment on, you have full administration access. You can login to the site and visit your vendor dashboard to start managing your products here:', 'woocommerce-product-vendors' ) ; ?></p>


<p><?php esc_html_e( 'As we would like to make it as easy as possible for you to get started, please use this link to schedule your on-boarding call, free of charge: 
', 'woocommerce-product-vendors' ); ?></p>
<p><?php esc_html_e( 'Schedule on-Boarding Call: http://doodle.com/stillactive', 'woocommerce-product-vendors' ); ?></p>
<p><?php esc_html_e( 'Should you have any questions in the meantime, please do not hesitate to contact us by email at hello@stillactive.se or by phone at 08-559 22 220.
', 'woocommerce-product-vendors' ); ?></p>
<p><?php esc_html_e( 'We are looking forward to be working with you.', 'woocommerce-product-vendors' ); ?></p>
<p><?php esc_html_e( 'Best regards,.', 'woocommerce-product-vendors' ); ?></p>
<p><?php esc_html_e( 'Michael - Still Active Co-Founder.', 'woocommerce-product-vendors' ); ?></p>

 

<?php do_action( 'woocommerce_email_footer', $email ); ?>
