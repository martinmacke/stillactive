<?php

get_header();
$search_query = get_search_query();
?>

<div class="woocommerce search_container">
	<div id="content" class="container content">
		
		<div class="row">
			<div class="col-xs-12">
				<h1><?php _e('Search results for ','stillactive'); echo '<span class="search_query">' . $search_query. "</span>"; ?></h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12">
				<?php
				if(have_posts()):
				?>
					<p><?php _e('Activities that match what you are looking for.','stillactive'); ?></p>
					<ul class="products">
						<?php
						while (have_posts()) : the_post(); ?>

							<li <?php post_class(); ?>>
								<?php
								/**
								 * woocommerce_before_shop_loop_item hook.
								 *
								 * @hooked woocommerce_template_loop_product_link_open - 10
								 */
								do_action( 'woocommerce_before_shop_loop_item' );

								/**
								 * woocommerce_before_shop_loop_item_title hook.
								 *
								 * @hooked woocommerce_show_product_loop_sale_flash - 10
								 * @hooked woocommerce_template_loop_product_thumbnail - 10
								 */
								do_action( 'woocommerce_before_shop_loop_item_title' );

								/**
								 * woocommerce_shop_loop_item_title hook.
								 *
								 * @hooked woocommerce_template_loop_product_title - 10
								 */
								do_action( 'woocommerce_shop_loop_item_title' );

								/**
								 * woocommerce_after_shop_loop_item_title hook.
								 *
								 * @hooked woocommerce_template_loop_rating - 5
								 * @hooked woocommerce_template_loop_price - 10
								 */
								do_action( 'woocommerce_after_shop_loop_item_title' );

								/**
								 * woocommerce_after_shop_loop_item hook.
								 *
								 * @hooked woocommerce_template_loop_product_link_close - 5
								 * @hooked woocommerce_template_loop_add_to_cart - 10
								 */
								do_action( 'woocommerce_after_shop_loop_item' );
								?>
							</li>

						<?php
						endwhile;
						?>
					</ul>
					<?php
				else:
				?>
					<p><?php _e('No activities matched with your search.','stillactive'); ?></p>
				<?php
				endif;
				?>
			</div>
		</div>

	</div>
</div>

<?php get_footer() ?>