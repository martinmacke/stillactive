<?php /* Template Name: Vendor Registration */ ?>

<?php get_header() ?>

 

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<style>

	.vendor-registration form {

		margin-top: 20px;

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

<div class="vendor-registration row sa_vr">

<div class="col-xs-12 col-md-8 col-md-push-2 col-md-pull-2 text-center">
<h1 style="text-align: center" class="vc_custom_heading">Get Started with Still Active!</h1>
<p style="text-align: center;">It's simple and risk-free for you to join our service, as we do not charge a membership fee!</p>
<p style="text-align: center;">We also provide you with free noboarding and training of our booking software and help you personalise your profile. If you have any questions, you can easily contact our customer support via email, phone or chat.</p>
<p style="text-align: center;">To get started, fill in the below form, and we will get back to you within 24 hours!</p>

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