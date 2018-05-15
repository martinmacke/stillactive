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
 * @version     3.1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $product;
$attachment_ids = $product->get_gallery_image_ids();
if ( $attachment_ids && has_post_thumbnail() ) {
	foreach ( $attachment_ids as $attachment_id ) {
		$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
		$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'woocommerce_thumbnail' );
		$attributes      = array(
			'title'                   => get_post_field( 'post_title', $attachment_id ),
			'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
			'data-src'                => $full_size_image[0],
			'data-large_image'        => $full_size_image[0],
			'data-large_image_width'  => $full_size_image[1],
			'data-large_image_height' => $full_size_image[2],
		);
		$html  = '<div data-thumb="' . esc_url( $thumbnail[0] ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
		$html .= wp_get_attachment_image( $attachment_id, 'woocommerce_single', false, $attributes );
 		$html .= '</a></div>';
		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
	}
}
?>

<div class="row">
	<!--<div class="col-sm-6 col-xs-12"><a href='javascript:void(0);' class='sa_see_dates'><?php _e('See dates', 'stillactive'); ?></a></div>-->
	<!--<div class="col-sm-6 col-xs-12 sa_save_later_div"><a href="<?php echo $product_url; ?>?add_to_wishlist=<?php echo $product_id; ?>" rel="nofollow" data-product-id="<?php echo $product_id; ?>" data-product-type="<?php echo $product_type; ?>" class="sa_save_later add_to_wishlist"> <span class="glyphicon glyphicon-heart-empty sa_save_later_heart" aria-hidden="true"></span> Save for later</a></div>-->
	<?php if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ){
		$save_for_later		= __('Save for later', 'stillactive');
		$saved_for_later	= __('Saved for later', 'stillactive');
	?>
		
	<?php } ?>
	<div id="sa_booking_form_output" class="sa_booking_form_output col-xs-12"></div>
	
	<div class="col-sm-6 col-xs-12 sa_save_later_div">
		<?php
			$result = do_shortcode('[yith_wcwl_add_to_wishlist label="'.$save_for_later.'" icon="fa fa-heart-o" browse_wishlist_text="'.$saved_for_later.'" already_in_wishslist_text="" product_added_text="" link_classes="sa_save_later_a add_to_wishlist"]'); 
			echo $result;
		?>
	</div>
	
	
	<div class="col-sm-6 col-xs-12 text-right">
		<a class="" style="color:#00a9f1;" target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=Still_active"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
		
		<a class="" style="color:#005678;" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
		
		<a class="" style="color:#bd081c;" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php the_post_thumbnail_url('thumb'); ?>"><i class="fa fa-pinterest-square fa-2x" aria-hidden="true"></i></a>
		
		<a class="" style="color:#007bb6;" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary=&amp;source=<?php the_permalink(); ?>"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
	</div>
	
	
	<script>
	jQuery(document).ready( function(){
		if( jQuery("#booking_form_main_div").length > 0 ){
			html = jQuery('#booking_form_main_div').html();
			jQuery('#booking_form_main_div').remove();
			document.getElementById("sa_booking_form_output").innerHTML = html;
		}
	});
	</script>
</div>