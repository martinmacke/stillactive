<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>

<div class="container content">
	<div class="col-xs-12">

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		#do_action( 'woocommerce_before_main_content' );
	
			$term_id		= get_queried_object_id();
			$vendor_data	= get_term_meta($term_id, 'vendor_data', true);
			$_pf			= new WC_Product_Factory();
			
			// echo "<pre>";
			// print_r( $vendor_data );
			// echo "</pre>";
			
			// get vendor's rating
			$v_rating_nos	= 0;
			$v_rating_count	= 0;
			$v_review_count	= 0;
			$v_average		= 0;
			while ( have_posts() ) : the_post();
				
				$product_id	= get_the_ID();
				$_product	= $_pf->get_product($product_id);
				
				if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
					// do nothing
				}else{
					if( $_product->get_rating_count() > 0 ){
						$v_rating_nos++;
						
						$v_rating_count += $_product->get_rating_count();
						$v_average      += $_product->get_average_rating();
					}
				}
			endwhile;	
	?>
		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
		?>
			<div class="row">
				<?php
				
				// print_r( single_term_title() );
				// echo "<pre>";
				// print_r( $vendor_data );
				// echo "</pre>";
				
				if( isset($vendor_data['logo']) && $vendor_data['logo'] != '' ){ ?>
					<div class="sa_logo col-xs-12">
						<div class="sa_vendor_logo_div">
							<?php if( $vendor_data ): ?>
								<p class="alt-title"><?php _e('Still Active Partners', 'stillactive'); ?></p>
							<?php endif; ?>
							
							<?php echo wp_get_attachment_image( $vendor_data['logo'], "medium", false, array('class'=>'sa_vendor_logo') );  ?>
							
							<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) :
							// echo $vendor_data['id'];
							// $vendor = get_term( absint( get_queried_object_id() ), WC_PRODUCT_VENDORS_TAXONOMY );
							// print_r($vendor);
							// echo get_queried_object_id();
							// echo WC_PRODUCT_VENDORS_TAXONOMY;
							?>
								<h1 class="page-title sa_v_title"><?php woocommerce_page_title(); ?></h1>
								<!--<div class="lead"><?php echo get_field('vendor_description', $vendor); ?></div>-->
								<div class="lead">
									<?php
										if( ! empty( get_term_meta($term_id, 'vendor_description', true) ) ){
											echo get_term_meta($term_id, 'vendor_description', true);
										}else{
											echo category_description();
										}
									?>
								</div>
							<?php endif; ?>
							
							<?php
								if ( $v_rating_nos > 0 ) :
								
									$v_rating_count		= $v_rating_count/$v_rating_nos;
									$v_average			= $v_average/$v_rating_nos;
							?>
									<div class="star-rating sa_v_ratings_stars" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $v_average ); ?>">
										<span style="width:<?php echo ( ( $v_average / 5 ) * 100 ); ?>%">
											<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $v_average ); ?></strong> <?php printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
											<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $v_rating_count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $v_rating_count . '</span>' ); ?>
										</span>
									</div>
									<!--<div class="sa_v_ratings"><?php echo $v_rating_nos . __( ' Ratings', 'woocommerce' ); ?></div>-->
									<div class="sa_v_ratings"><?php echo _e( 'Partner Rating', 'woocommerce' ); ?></div>
							<?php
								endif;
							?>
						</div>
					</div>
				<?php } ?>
				
				<div class="sa_details col-sm-6">
					<ul class="vendor_details_ul">
						<?php if( isset($vendor_data['email']) && $vendor_data['email'] != '' ){ ?>
							<li><a href="mailto:<?php echo $vendor_data['email']; ?>"><i class="glyphicon glyphicon-envelope"></i> <?php echo $vendor_data['email']; ?></a></li>
						<?php } ?>
						<?php if( isset($vendor_data['phone']) ){ ?>
							<li><i class="glyphicon glyphicon-phone"></i> <?php echo $vendor_data['phone']; ?></li>
						<?php } ?>
						<?php if( isset($vendor_data['address']) && $vendor_data['address'] != '' ){ ?>
							<li><i class="glyphicon glyphicon-map-marker"></i> <?php echo $vendor_data['address']; ?> <small class="sa_see_map_v pull-right"><a href="http://maps.google.com/?q=<?php echo $vendor_data['address']; ?>" target="_blank">Show Map</a></small></li>
						<?php } ?>
						<?php if( isset($vendor_data['website']) && $vendor_data['website'] != '' ){ ?>
							<li><i class="glyphicon glyphicon-globe"></i> <a target="_blank" href="<?php echo $vendor_data['website']; ?>"><?php echo $vendor_data['website']; ?></a></li>
						<?php } ?>
					</ul>
				</div>
				<?php if( isset($vendor_data['profile']) && $vendor_data['profile'] != '' ){ ?>
					<div class="sa_description col-sm-6">
						<span><?php echo $vendor_data['profile']; ?></span>
					</div>
				<?php } ?>
			</div>
			<br/>
		<?php
			// do_action( 'woocommerce_archive_description' );
		?>
		
		<?php if($vendor_data): ?>
		<h3><?php _e('Our Activities', 'stillactive'); ?></h3>
		<?php endif; ?>
		
		<?php if ( have_posts() ) : ?>
			
			<?php if(!$vendor_data): ?>
			<h1 class="page-title sa_v_title"><?php woocommerce_page_title(); ?></h1>
			<!--<div class="lead"><?php echo get_field('vendor_description', $vendor); ?></div>-->
			<div class="lead"><?php echo category_description(); ?></div>
			<?php endif; ?>
			
			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>
				

				<?php
				woocommerce_product_subcategories();
				?>

				<?php while ( have_posts() ) : the_post();
						$product_id	= get_the_ID();
				?>
					
					<?php
					if( 'product' == get_post_type( $product_id ) ){
						$_product				= $_pf->get_product($product_id);
						$product_is_in_wishlist	= YITH_WCWL()->is_product_in_wishlist( $product_id );
						$classes				= get_post_class();
						$liclass				= "";
						foreach( $classes as $li_class ){
							$liclass .= $li_class." ";
						}
					?>
							<li class="<?php echo $liclass; ?>">
								<a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link">
									
									<?php if (has_post_thumbnail( $product_id ) ): ?>
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ) ); ?>
										<img class="img-responsive" src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo get_the_title(); ?>">
									<?php endif; ?>
									<?php
										if( $product_is_in_wishlist ){
											echo "<span class='sa_rp_heart'><i class='fa fa-heart'></i></span>";
										}
									?>
									<h3><?php echo get_the_title(); ?></h3>
									<?php
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
								<?php
								$sold_by = get_option( 'wcpv_vendor_settings_display_show_by', 'yes' );

								if ( 'yes' === $sold_by ) {

									$sold_by = WC_Product_Vendors_Utils::get_sold_by_link( $product_id );

									echo '<em class="wcpv-sold-by-loop">' . apply_filters( 'wcpv_sold_by_text', esc_html__( 'Sold By:', 'woocommerce-product-vendors' ) ) . ' <a href="' . esc_url( $sold_by['link'] ) . '" title="' . esc_attr( $sold_by['name'] ) . '">' . $sold_by['name'] . '</a></em>';
								}
								?>
							</li>
					<?php
						}
					?>
					
					<?php //wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		#do_action( 'woocommerce_sidebar' );
	?>

</div>
</div>

<?php get_footer( 'shop' ); ?>