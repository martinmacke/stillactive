<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! $order = wc_get_order( $order_id ) ) {
	return;
}
$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();
if ( $show_downloads ) {
	wc_get_template( 'order/order-downloads.php', array( 'downloads' => $downloads, 'show_title' => true ) );
}
?>
<section class="woocommerce-order-details">
	<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>

	<h2 class="woocommerce-order-details__title"><?php _e( 'Order details', 'woocommerce' ); ?></h2>

	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

		<thead>
			<tr>
				<th class="woocommerce-table__product-name product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
				<th class="woocommerce-table__product-table product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
			</tr>
		</thead>

		<tbody>
			<?php
			do_action( 'woocommerce_order_details_before_order_table_items', $order );
			foreach ( $order_items as $item_id => $item ) {
				$product = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );
				wc_get_template( 'order/order-details-item.php', array(
					'order'			     => $order,
					'item_id'		     => $item_id,
					'item'			     => $item,
					'show_purchase_note' => $show_purchase_note,
					'purchase_note'	     => $product ? $product->get_purchase_note() : '',
					'product'	         => $product,
				) );
			}
			do_action( 'woocommerce_order_details_after_order_table_items', $order );
			?>
		</tbody>

		<tfoot>
			<?php
				foreach ( $order->get_order_item_totals() as $key => $total ) {
					?>
					<tr>
						<th scope="row"><?php echo $total['label']; ?></th>
						<td><?php echo $total['value']; ?></td>
					</tr>
					<?php
				}
			?>
			<?php if ( $order->get_customer_note() ) : ?>
				<tr>
					<th><?php _e( 'Note:', 'woocommerce' ); ?></th>
					<td><?php echo wptexturize( $order->get_customer_note() ); ?></td>
				</tr>
			<?php endif; ?>
		</tfoot>
	</table>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
</section>

<?php
if ( $show_customer_details ) {
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}

if($order): ?>
<?php
	foreach( $order->get_items() as $item_id => $item ) {
		$product = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
		$product_name = $product->name;
		$product_url = get_permalink( $product->id );
	}
?>

<div id="share-booking-popup" class="modal fade still_active_popup" style="top:35px; background: rgba(255,255,255,0.9);">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body" id="what">
			   <center>
				   <div class="category-icon"><img src="https://www.stillactive.se/wp-content/uploads/2017/08/gift-150x150.png" width="100" height="100" alt="Gratisaktiviteter"><br></div>
				   <h2><?php printf( esc_html__( 'Make %1$s even more fun and invite your friends to join!', 'stillactive' ), $product_name ); ?></h2>
				   <p><?php _e('Click on the buttons below to share it on your favorite Social Media channel.', 'stillactive'); ?></p>
				   <p>
				   
					   <a class="" style="color:#00a9f1;" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $product_name; ?>&amp;url=<?php echo $product_url; ?>&amp;via=Still_active"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
		
		<a class="" style="color:#005678;" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $product_url; ?>"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
		
		<a class="" style="color:#bd081c;" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $product_url; ?>"><i class="fa fa-pinterest-square fa-2x" aria-hidden="true"></i></a>
		
		<a class="" style="color:#007bb6;" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $product_url; ?>&amp;title=<?php echo $product_name; ?>&amp;summary=&amp;source=<?php echo $product_url; ?>"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
				   
				   </p>
			   </center>
			</div>
			<div class="modal-footer">
				<center>
					<!--<button type="button" class="btn btn-primary" data-dismiss="modal"><?php _e('Ok', 'stillactive'); ?></button>-->
				</center>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#share-booking-popup").modal('show');
	});
</script>

<?php endif; ?>
<!-- End Share popup -->

<script type="text/javascript">
	jQuery(document).ready( function($){
		// swap sold by and address lines
		$('.order_item_address').each( function(e){
			_this			= $(this);
			em 				= _this.parent().find('.wcpv-sold-by-order-details');
			
			// Replace Sold By: text
			em.contents().filter(function(){ 
			  return this.nodeType == 3;
			})[0].nodeValue = "With: ";
			
			html_sold_by	= '<em class="wcpv-sold-by-order-details"> ' + em.html() + ' </em><br/>';
			em.remove();
			$(html_sold_by).insertBefore(_this);
			// console.log( _this.parent().find('.wcpv-sold-by-order-details').text() );
		});
	});
</script>