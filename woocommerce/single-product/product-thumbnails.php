<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
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
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();
$product_id		= $product->id;
$product_type	= $product->product_type;
$product_url	= get_permalink( $product_id );
if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	?>
	<div class="thumbnails <?php echo 'columns-' . $columns; ?>"><?php

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'zoom' );

			if ( $loop === 0 || $loop % $columns === 0 ) {
				$classes[] = 'first';
			}

			if ( ( $loop + 1 ) % $columns === 0 ) {
				$classes[] = 'last';
			}

			$image_class = implode( ' ', $classes );
			$props       = wc_get_product_attachment_props( $attachment_id, $post );

			if ( ! $props['url'] ) {
				continue;
			}

			echo apply_filters(
				'woocommerce_single_product_image_thumbnail_html',
				sprintf(
					'<a href="%s" class="%s" title="%s" rel="prettyPhoto[product-gallery]">%s</a>',
					esc_url( $props['url'] ),
					esc_attr( $image_class ),
					esc_attr( $props['caption'] ),
					wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $props )
				),
				$attachment_id,
				$post->ID,
				esc_attr( $image_class )
			);

			$loop++;
		}

	?></div>
	<?php
}
?>

<div class="row">
	<div class="col-sm-6 col-xs-12"><a href='javascript:void(0);' class='sa_see_dates'><?php _e('See dates', 'stillactive'); ?></a></div>
	<!--<div class="col-sm-6 col-xs-12 sa_save_later_div"><a href="<?php echo $product_url; ?>?add_to_wishlist=<?php echo $product_id; ?>" rel="nofollow" data-product-id="<?php echo $product_id; ?>" data-product-type="<?php echo $product_type; ?>" class="sa_save_later add_to_wishlist"> <span class="glyphicon glyphicon-heart-empty sa_save_later_heart" aria-hidden="true"></span> Save for later</a></div>-->
	<?php if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ){
		$save_for_later		= __('Save for later', 'stillactive');
		$saved_for_later	= __('Saved for later', 'stillactive');
	?>
		<div class="col-sm-6 col-xs-12 sa_save_later_div">
		<?php
			$result = do_shortcode('[yith_wcwl_add_to_wishlist label="'.$save_for_later.'" icon="fa fa-heart-o" browse_wishlist_text="'.$saved_for_later.'" already_in_wishslist_text="" product_added_text="" link_classes="sa_save_later_a add_to_wishlist"]'); 
			echo $result;
		?>
		</div>
	<?php } ?>
	<div id="sa_booking_form_output" class="sa_booking_form_output col-xs-12"></div>
	
	
	<script>
	jQuery(document).ready( function(){
		if( jQuery("#booking_form_main_div").length > 0 ){
			html = jQuery('#booking_form_main_div').html();
			jQuery('#booking_form_main_div').remove();
			document.getElementById("sa_booking_form_output").innerHTML = html;
		}else{
			jQuery(".sa_see_dates").css('display', 'none');
		}
	});
	</script>
</div>