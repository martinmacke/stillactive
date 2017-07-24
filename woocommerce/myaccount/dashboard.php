<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account-dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

/*
	Cancel booking Popup
*/

function booking_cancelled_modal_script(){
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#cancel-booking-popup").modal('show');
	});
</script>
    <div id="cancel-booking-popup" class="modal fade still_active_popup" style="top:35px; background: #ffffff; opacity: 0.9;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
				   <center>
					   <h2><?php _e('Your booking was cancelled successfully.', 'stillactive'); ?></h2>
					   <p><?php _e('The credit card you have used to make the payment', 'stillactive'); ?> <br /> <?php _e('will be credited with the respective amount within 14 days.', 'stillactive'); ?></p>
				   </center>
				</div>
				<div class="modal-footer">
					<center>
						<button type="button" class="btn btn-primary" data-dismiss="modal"><?php _e('Ok', 'stillactive'); ?></button>
					</center>
				</div>
			</div>
		</div>
	</div>
<?php
}

if ( isset( $_GET['cancel_booking'] ) && 'true' === $_GET['cancel_booking'] ){
	booking_cancelled_modal_script();
}
?>

<p class="lead"><?php _e('Hello', 'stillactive'); echo " " . $current_user->first_name; ?>,</p>

<p class="bigger">
	<?php
		echo sprintf( esc_attr__( 'From your account dashboard you can view your %1$srecent orders%2$s, manage your %3$sshipping and billing addresses%2$s and %4$sedit your password and account details%2$s.', 'woocommerce' ), '<a href="' . esc_url( wc_get_endpoint_url( 'orders' ) ) . '">', '</a>', '<a href="' . esc_url( wc_get_endpoint_url( 'edit-address' ) ) . '">', '<a href="' . esc_url( wc_get_endpoint_url( 'edit-account' ) ) . '">' );
	?>
</p>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );
	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );
	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );
?>
