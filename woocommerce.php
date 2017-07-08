<?php if(!is_singular( 'product')): woocommerce_get_template( 'archive-product.php' ); ?>
<?php else: ?>

<?php get_header() ?>

<div class="bgimage">
	<div class="gradientoverlay"></div>
</div>

<section class="container">
<div class="col-xs-12">
<?php
if ( is_singular( 'product' ) ) {
     woocommerce_content();
}
?>
</section>

<?php get_footer() ?>
<?php endif; ?>