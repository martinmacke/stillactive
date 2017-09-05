<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
global $product;

if ( ! $post->post_excerpt ) {
	return;
}

$sold_by			= get_option( 'wcpv_vendor_settings_display_show_by', 'yes' );
$vendor_data		= WC_Product_Vendors_Utils::get_all_vendor_data( $product->post->post_author );
$duration			= $product->get_attribute('pa_duration');
$physical_fitness	= $product->get_attribute('pa_physical-fitness');
$sa_exclusive		= $product->get_attribute('pa_still-active-exclusive');
// echo "<pre>";
// print_r($sa_exclusive);
// echo $cancel_limit->get_cancel_limit();
$can_cancel			= get_post_meta( $post->ID, '_wc_booking_user_can_cancel', true );
$cancel_limit		= get_post_meta( $post->ID, '_wc_booking_cancel_limit', true );
$cancel_limit_unit	= get_post_meta( $post->ID, '_wc_booking_cancel_limit_unit', true );
$cancel_limit_unit_pf	= '';
if( $cancel_limit > 1 ){
	$cancel_limit_unit_pf = 's';
}
// print_r($cancel_limit);
// echo "</pre>";
?>
<div class="row sa_custom_description">
	<div class="col-xs-8">
		<div itemprop="description">
		<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
		</div>
	</div>
	<div class="col-xs-4">
		<?php
		if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
			return;
		}

		$rating_count = $product->get_rating_count();
		$review_count = $product->get_review_count();
		$average      = $product->get_average_rating();

		if ( $rating_count > 0 ) : ?>

			<div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
				<div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
					<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
						<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
						<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
					</span>
				</div>
				<?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow"><?php printf( _n( '%s review', '%s reviews', $review_count, 'woocommerce' ), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>' ); ?></a><?php endif ?>
			</div>

		<?php endif; ?>

	</div>
</div>


<hr>
<?php

if ( 'yes' === $sold_by ) {

	$sold_by = WC_Product_Vendors_Utils::get_sold_by_link( $post->ID );

	echo '<p class="wcpv-hosted-by-single">' . apply_filters( 'wcpv_sold_by_text', esc_html__( 'Hosted By', 'woocommerce-product-vendors' ) ) . ' <a href="' . esc_url( $sold_by['link'] ) . '" title="' . esc_attr( $sold_by['name'] ) . '">' . $sold_by['name'] . '</a></p>';
}
?>

<div class="hours-difficulty">
	
	<?php if( !empty($duration) ){ ?>
		<img width="50" height="50" src="<?php bloginfo('template_url'); ?>/images/icon-time.png" alt="">
		<p><?php echo $duration; ?><br><small><?php _e('Approx. activity length', 'stillactive'); ?></small></p>
	<?php } ?>
	<?php if( !empty($physical_fitness) ){ ?>
		<img width="50" height="50" src="<?php bloginfo('template_url'); ?>/images/icon-difficulty.png" alt="">
		<p><?php echo $physical_fitness; ?><br><small><?php _e('Activity difficulty', 'stillactive'); ?></small></p>
	<?php } ?>
	<?php if( !empty($sa_exclusive) && ($sa_exclusive == 'Yes' || $sa_exclusive == 'Ja') ){ ?>
		<img width="50" height="50" src="<?php bloginfo('template_url'); ?>/images/icon-ribbon.png" alt="">
		<p><?php _e('Exclusive', 'stillactive'); ?><br><small><?php _e('by Still Active', 'stillactive'); ?></small></p>
	<?php } ?>
	
</div>


<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<div class="lead"><p class="price"><?php echo $product->get_price_html(); ?></p></div>

	<meta itemprop="price" content="<?php echo esc_attr( $product->get_display_price() ); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>
<hr>



<?php


$map = "";
if( class_exists('acf') ){
	$map = get_field('address', $product->id);
}

if( ! empty($map) ){
?>
	<div class="row sa_vendor_address">

		<div class="col-sm-6 col-xs-12 sa_address_heading">
			<strong><?php _e('Address', 'woocommerce'); ?></strong>
		</div>
		<div class="col-sm-6 col-xs-12 sa_address_value">
			<p class="sa_p_address pull-right"><?php echo $map['address']; ?></p>
			<div class="clearfix"></div>
			<small class="sa_see_map pull-right"><a href="http://maps.google.com/?q=<?php echo $map['address']; ?>" target="_blank"><?php _e('Show Map', 'stillactive'); ?></a></small>
		</div>

	</div>
	<hr>

<?php }


if( 1 == $can_cancel ){
?>
	<div class="row sa_cp">

		<div class="col-sm-6 col-xs-12 sa_address_heading sa_cp_heading">
			<strong><?php _e('Cancellation Policy', 'stillactive'); ?></strong>
		</div>
		<div class="col-sm-6 col-xs-12 sa_address_value">
			<p class="sa_p_address pull-right"><?php _e('This booking can be cancelled for free until '. $cancel_limit. ' '. $cancel_limit_unit.$cancel_limit_unit_pf.' before the start date.', 'stillactive'); ?></p>
		</div>

	</div>
	<hr>

<?php } ?>