<?php /* Template Name: Vendor Registration */ ?>

<?php get_header() ?>

 

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<style>

	.vendor-registration form {

		margin-top: 20px;

		border: 3px solid #33ccff;

		padding: 30px;

		border-radius: 15px;

	}

</style>



<div class="container content">

<section class="col-xs-12">

<div class="page-header">

<h1><?php the_title(); ?></h1>

</div>

</section>

</div>



<div class="container">

<section class="col-xs-12">

 <?php if ( is_user_logged_in() ):?>

 

 	<?php $user = wp_get_current_user();

	if ( in_array( 'wc_product_vendors_admin_vendor', (array) $user->roles ) || in_array( 'wc_product_vendors_manager_vendor', (array) $user->roles )) {

		$admin_link = "/wp-admin/";		

	 }

	else { 

		$admin_link = get_permalink( get_option('woocommerce_myaccount_page_id') );

	}?>

	

	<p style="text-align:center">It looks like you are already registered and logged in. That's great, you can continue to <a href="<?php echo $admin_link; ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a></p>

		

<?php else: ?>

<?php the_content(); ?>

<div class="vendor-registration row">

<div class="col-xs-12 col-md-8">

<?php echo do_shortcode('[wcpv_registration]'); ?>

</div>

</div>

<?php endif; ?>



</section>

</div>



<?php trackback_rdf() ?>



<?php endwhile; else: ?>



<div class="container">

<div class="col-xs-12">

<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

</div>

</div>



<?php endif; ?>



<?php get_footer() ?>