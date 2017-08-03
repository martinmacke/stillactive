<?php get_header() ?>
 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' )); ?>

<style>
#what:after {
	content: "";
	display: block;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	background: url(/wp-content/uploads/2017/04/hp-<?php echo rand(1,4);?>.jpg) no-repeat center center;
	background-size: cover;
	opacity: 0.9;
	z-index: 7;
	filter: grayscale(100%);
}
</style>

<section id="what">
<div class="container">
<div class="col-xs-12">
<h1 class="text-center sa_text_center"><?php _e('What will you explore', 'stillactive'); ?> <span class="blue"><?php _e('today?', 'stillactive'); ?></span></h1>
<p class="lead text-center"><?php _e('Still Active is a hassle-free service to meet like-minded people and discover unique activities in Stockholm!', 'stillactive'); ?></p>

<div class="owl-carousel azure-owl-carousel-slider">

<?php
$category_list_items	= get_terms(
							'product_cat',
							array(
								'hide_empty' => false,
							)
						);
	
foreach($category_list_items as $category_list_item): ?>
<?php 
	$cat_link		= get_term_link( $category_list_item, 'product_cat' );
	$cat_thumb_id	= get_woocommerce_term_meta( $category_list_item->term_id, 'thumbnail_id', true );
    $cat_thumb_url	= wp_get_attachment_thumb_url( $cat_thumb_id );
?>
	<div class="item text-center">
		<a href="<?php echo $cat_link; ?>" class="text-center"><div class="category-icon"><img src="<?php echo $cat_thumb_url; ?>" width="100" height="100" alt="<?php echo $category_list_item->name; ?>"><br></div><?php echo $category_list_item->name; ?></a>
	</div>
<?php
endforeach;
?>

</div>

<?php if(!is_user_logged_in()): ?>
<p class="text-center"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>?action=register" class="btn btn-lg btn-primary"><?php _e('Join Now!', 'stillactive'); ?></a></p>
<?php else: ?>
<p class="text-center">
<a href="<?php echo $shop_page_url ;?>" class="btn btn-lg btn-primary"><?php _e('Browse all activities', 'stillactive'); ?></a>
<a href="https://www.youtube.com/watch?v=Mcz6wtgzUas?autoplay=1&showinfo=0&rel=0" class="btn btn-lg btn-default fancybox-youtube"><?php _e('Watch how it works', 'stillactive'); ?></a>
</p>
<?php endif; ?>

</div>
</div>
</section>

<section id="mostpopular" class="container">
<div class="col-xs-12">
<h1><?php _e('Most popular today', 'stillactive'); ?></h1>

<?php echo do_shortcode('[featured_products per_page="99" columns="3" orderby="rand"]'); ?>

<div class="text-center">
	<a href="<?php echo $shop_page_url ;?>" class="btn btn-lg btn-primary"><?php _e('Browse all activities', 'stillactive'); ?></a>
</div>

</div>
</section>

<section id="indiegogo">
	<div class="container">
		<div class="col-sm-8 col-xs-12 desc">
			<h1><span class="hidden-xs"><?php _e('Support us on', 'stillactive'); ?></span><img src="<?php bloginfo('template_url'); ?>/images/logo-indiegogo.svg" alt="IndieGoGo" width="180" height="94"></h1>
			<p class="lead"><?php _e('Our crowdfunding campaign is in full speed. Help us turn our vision into reality, support Still Active today and get 20% off our gift cards!', 'stillactive'); ?></p>
			<a href="https://www.indiegogo.com/projects/still-active-the-activity-concierge-for-60-up-fitness-community#/" target="_blank" class="btn btn-primary btn-lg"><?php _e('Support Still Active', 'stillactive'); ?></a>
		</div>
		<div class="col-sm-4 col-xs-12 text-center">
			<iframe src="https://www.indiegogo.com/project/still-active-the-activity-concierge-for-60-up-fitness-community/embedded" width="222px" height="445px" frameborder="0" scrolling="no"></iframe>
		</div>
	</div>
</section>


<section id="about" class="container">
<div class="sa_center_row">
	<div class="col-sm-6 col-xs-12">
		<h1><?php _e('About us', 'stillactive'); ?></h1>
		<p class="lead"><?php _e('Hassle-free service where you discover your recommended activities and book and pay for them directly.', 'stillactive'); ?></p>
	</div>
	<div class="col-sm-6 col-xs-12">
		<div class="flex">
			<div class="video text-center">
				<div class="player">
					<a href="https://www.youtube.com/watch?v=Mcz6wtgzUas?autoplay=1&showinfo=0&rel=0" class="btn btn-lg btn-primary fancybox-youtube"><?php _e('Watch video', 'stillactive'); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="partners" class="container">
	<div class="col-xs-12">
		<h1><?php _e('Meet our partners', 'stillactive'); ?></h1>
		<p class="lead">
			<?php _e('At Still Active, we are handpicking our partners to ensure highest quality standards and customer satisfaction. Find out who we work with.', 'stillactive'); ?>
		</p>

		<div class="slick">
			<?php echo do_shortcode('[wcpv_vendor_list show_logo=true show_name=false]'); ?>
		</div>

		<p class="text-center">
			<a href="<?php the_permalink(707); ?>" class="btn btn-lg btn-default"><?php _e('Meet our Partners', 'stillactive'); ?></a><a href="<?php the_permalink(14); ?>" class="btn btn-lg btn-primary"><?php _e('Become a Partner', 'stillactive'); ?></a>
		</p>

	</div>
	</div>
</section>


<?php /*?><section id="testimonials" class="container">
<div class="col-xs-12">
<h1><?php _e('What our users say', 'stillactive'); ?></h1>

<div class="slick">

<?php
if( have_rows('testimonials') ):

    while ( have_rows('testimonials') ) : the_row();
		$photo = get_sub_field('photo'); ?>
		
	<div class="testimonial">
		<img src="<?php echo $photo['sizes']['square']; ?>" alt="Photo">
		<div class="text lead"><?php the_sub_field('text'); ?></div>
	</div>

<?php endwhile; endif; ?>

</div>

</div>
</section><?php */?>


<?php endwhile; endif; ?>

<?php get_footer(); ?>