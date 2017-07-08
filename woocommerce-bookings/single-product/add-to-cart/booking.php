<?php
/**
 * Booking product add to cart
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

// ob_start();

?>
<div id="booking_form_main_div" class="booking_form_main_div">

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<noscript><?php _e( 'Your browser must support JavaScript in order to make a booking.', 'woocommerce-bookings' ); ?></noscript>

	<form class="cart" method="post" enctype='multipart/form-data'>

		<div id="wc-bookings-booking-form" class="wc-bookings-booking-form" style="display:none">

			<?php do_action( 'woocommerce_before_booking_form' ); ?>

			<?php $booking_form->output(); ?>

			<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

			<div class="wc-bookings-booking-cost" style="display:none"></div>

		</div>

		<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( is_callable( array( $product, 'get_id' ) ) ? $product->get_id() : $product->id ); ?>" class="wc-booking-product-id" />

		<button type="submit" class="wc-bookings-booking-form-button single_add_to_cart_button button alt disabled" style="display:none"><?php echo $product->single_add_to_cart_text(); ?></button>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
</div>
<?php
// $GLOBALS['sa_booking_form_output'] = ob_get_contents();
// ob_end_clean();

// echo $GLOBALS['sa_booking_form_output'];
?>
