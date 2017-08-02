<?php
/**
 * Customer booking reminder email
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>


<?php

$hi_text			= 'Hello';
$message_text		= 'This is a reminder that your booking will take place tomorrow!';
$message_text1		= 'Hope you have a great experience and don’t forget to rate and review the activity afterwards!';
$enjoy_text			= 'Enjoy!';
$activity_heading	= 'Booked Activity';
$booking_id_heading	= 'Booking ID';
$start_heading		= 'Start Time';
$end_heading		= 'End Time';
$host_heading		= 'Activity Host';
$addr_heading		= 'Address';
$info_heading		= 'Special info from host';
$email_heading		= 'Booking Reminder';
if( 'sv' == ICL_LANGUAGE_CODE ){
	$hi_text			= 'Hej';
	$message_text		= 'Detta är en påminnelse om att din aktivitet kommer att äga rum i morgon!';
	$message_text1		= 'Hoppas att du har en bra upplevelse och glöm inte att bedöma och recensera aktiviteten efteråt!';
	$enjoy_text			= 'Ha det så kul!';
	$activity_heading	= 'Bokad aktivitet';
	$booking_id_heading	= 'Boknings ID';
	$start_heading		= 'Starttid';
	$end_heading		= 'Sluttid';
	$host_heading		= 'Aktivitetsvärd';
	$addr_heading		= 'Adress';
	$info_heading		= 'Särskild info från partner';
	$email_heading		= 'Bokningspåminnelse';
}

do_action( 'woocommerce_email_header', $email_heading );
// get_date_created function for getting date and time ( not confirmed :) )

$product_id	= $booking->get_product_id();

// we can get vendor id from this function
// $term = wp_get_post_terms( $product_id, WC_PRODUCT_VENDORS_TAXONOMY );


if ( $booking->get_order() ) : ?>
	<p><?php printf( __( $hi_text . ' %s', 'woocommerce-bookings' ), ( is_callable( array( $booking->get_order(), 'get_billing_first_name' ) ) ? $booking->get_order()->get_billing_first_name() : $booking->get_order()->billing_first_name ) ); ?></p>
<?php endif; ?>

<p><?php _e( $message_text, 'woocommerce-bookings' ); ?></p>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
	<tbody>
		<tr>
			<th scope="row" style="text-align:left; border: 1px solid #eee;"><?php _e( $activity_heading, 'woocommerce-bookings' ); ?></th>
			<td style="text-align:left; border: 1px solid #eee;"><?php echo $booking->get_product()->get_title(); ?></td>
		</tr>
		<tr>
			<th style="text-align:left; border: 1px solid #eee;" scope="row"><?php _e( $booking_id_heading, 'woocommerce-bookings' ); ?></th>
			<td style="text-align:left; border: 1px solid #eee;"><?php echo $booking->get_id(); ?></td>
		</tr>
		<?php if ( $booking->has_resources() && ( $resource = $booking->get_resource() ) ) : ?>
			<tr>
				<th style="text-align:left; border: 1px solid #eee;" scope="row"><?php _e( 'Booking Type', 'woocommerce-bookings' ); ?></th>
				<td style="text-align:left; border: 1px solid #eee;"><?php echo $resource->post_title; ?></td>
			</tr>
		<?php endif; ?>
		<tr>
			<th style="text-align:left; border: 1px solid #eee;" scope="row"><?php _e( $start_heading, 'woocommerce-bookings' ); ?></th>
			<!--<td style="text-align:left; border: 1px solid #eee;"><?php echo $booking->get_start_date(); ?></td>-->
			<td style="text-align:left; border: 1px solid #eee;"><?php echo $booking->get_start_date( 'd.m.Y', 'H:i' ); ?></td>
		</tr>
		<tr>
			<th style="text-align:left; border: 1px solid #eee;" scope="row"><?php _e( $end_heading, 'woocommerce-bookings' ); ?></th>
			<!--<td style="text-align:left; border: 1px solid #eee;"><?php echo $booking->get_end_date(); ?></td>-->
			<td style="text-align:left; border: 1px solid #eee;"><?php echo $booking->get_end_date( 'd.m.Y', 'H:i' ); ?></td>
		</tr>
		<?php if ( $booking->has_persons() ) : ?>
			<?php
				foreach ( $booking->get_persons() as $id => $qty ) :
					if ( 0 === $qty ) {
						continue;
					}

					$person_type = ( 0 < $id ) ? get_the_title( $id ) : __( 'Person(s)', 'woocommerce-bookings' );
			?>
				<tr>
					<th style="text-align:left; border: 1px solid #eee;" scope="row"><?php echo $person_type; ?></th>
					<td style="text-align:left; border: 1px solid #eee;"><?php echo $qty; ?></td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>

<p></p>
<p><?php _e( $message_text1, 'woocommerce-bookings' ); ?></p>
<p></p>
<p><?php _e( $enjoy_text, 'woocommerce-bookings' ); ?></p>
<p><?php echo 'Still Active Team'; ?></p>

<?php do_action( 'woocommerce_email_footer' ); ?>
