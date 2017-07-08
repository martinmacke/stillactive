<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<div class="related products">

		<h2><span><?php _e( 'Related Products', 'woocommerce' ); ?></span></h2>
		
		<!-- sorting start -->
		<?php
		$orderby                 = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
		$show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
		$catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
			'menu_order' => __( 'Default sorting', 'woocommerce' ),
			'popularity' => __( 'Sort by popularity', 'woocommerce' ),
			'rating'     => __( 'Sort by average rating', 'woocommerce' ),
			'date'       => __( 'Sort by newness', 'woocommerce' ),
			'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
			'price-desc' => __( 'Sort by price: high to low', 'woocommerce' )
		) );

		if ( ! $show_default_orderby ) {
			unset( $catalog_orderby_options['menu_order'] );
		}

		if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
			unset( $catalog_orderby_options['rating'] );
		}
		
		?>
		
		
		<form class="woocommerce-ordering" method="get">
			<select name="orderby" class="orderby">
				<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
					<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
				<?php endforeach; ?>
			</select>
			<?php
				// Keep query string vars intact
				foreach ( $_GET as $key => $val ) {
					if ( 'orderby' === $key || 'submit' === $key ) {
						continue;
					}
					if ( is_array( $val ) ) {
						foreach( $val as $innerVal ) {
							echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
						}
					} else {
						echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
					}
				}
			?>
		</form>
		
	<!-- sorting end -->
	
		<?php woocommerce_product_loop_start(true);
		$_pf = new WC_Product_Factory();
		// echo '<pre>'; print_r($products); echo '</pre>';
		?>

			<?php while ( $products->have_posts() ) : $products->the_post();
			$product_id	= get_the_ID();
			?>

				<?php
					if( 'product' == get_post_type( $product_id ) ){
					$_product	= $_pf->get_product($product_id);
					$product_is_in_wishlist = YITH_WCWL()->is_product_in_wishlist( $product_id );
					// echo "<pre>";
					// print_r($_product);
					// echo "</pre>";
					$classes	= get_post_class();
					$liclass	= "";
					foreach( $classes as $li_class ){
						$liclass .= $li_class." ";
					}
				?>
						<li class="<?php echo $liclass; ?>">
							<a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link">
								
								<?php if (has_post_thumbnail( $product_id ) ): ?>
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ) ); ?>
									<img class="img-responsive" src="<?php echo $image[0]; ?>" alt="" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo get_the_title(); ?>">
								<?php endif; ?>
								<?php
									if( $product_is_in_wishlist ){
										echo "<span class='sa_rp_heart'><i class='fa fa-heart'></i></span>";
									}
								?>
								<h3><?php echo get_the_title(); ?></h3>
								<?php
								//echo $_product->get_rating_html();
								if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
									// do nothing
								}else{
									$rating_count = $_product->get_rating_count();
									$review_count = $_product->get_review_count();
									$average      = $_product->get_average_rating();

									if ( $rating_count > 0 ) : ?>

										<div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
											<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
												<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
												<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
											</span>
										</div>

								<?php
									endif;
								}
								?>
								
									<span class="price"><?php echo $_product->get_price_html(); ?></span>

									<meta itemprop="price" content="<?php echo esc_attr( $_product->get_display_price() ); ?>" />
									<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
									<link itemprop="availability" href="http://schema.org/<?php echo $_product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
							</a>
						</li>
				<?php
					}
					// echo '<pre>'; print_r(get_the_ID()); echo '</pre>';
					// wc_get_template_part( 'content', 'product' );
				?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
