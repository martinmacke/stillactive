<?php get_header(); ?>
      
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
$cats = wp_get_post_categories($post->ID);
$author = get_the_author();
?>

<section class="container">
<div class="col-xs-12 post header">

<?php 
if ( has_post_thumbnail()) {
  the_post_thumbnail('1200x400');
} 
?>
</div>
</section>

<div class="container post">

<div class="col-sm-8 col-md-9 postcontent">

<p class="alt-title"><?php echo get_the_category_list( ", ", "", $post->ID ); ?></p>
<h1 class=""><?php the_title(); ?></h1>
<p>
	<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('j F, Y'); ?></span>
	<span class="author"><i class="fa fa-user-o" aria-hidden="true"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
</p>

<?php the_content(); ?>

<div class="sharepost">
<h3><?php _e('Share', 'stillactive'); ?></h3>
<p>
		<a rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<a rel="nofollow" href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<a rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
		<a rel="nofollow" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
</p>
</div>

<?php comments_template(); ?>
</div>

<div class="col-sm-4 col-md-3 sidebar">

<?php
	$account_page_url = get_permalink( get_option('woocommerce_myaccount_page_id') );
	if ( !is_user_logged_in() ): ?>
<div class="text-center widget fixedwidget">
	<h3><i class="fa fa-check-square-o fa-3x" aria-hidden="true"></i></h3>
	<p class="lead"><?php _e('Have you been inspired to stay active?', 'stillactive'); ?></p>
	<a href="<?php echo $account_page_url; ?>" class="btn btn-primary"><?php _e('Join Now!', 'stillactive'); ?></a>
</div>
<?php endif; ?>

</div>


<?php wp_link_pages(); ?>
</div>

<?php endwhile; else: ?>

<div class="container">
<div class="col-xs-12">
<p><? _e('Sorry, no posts matched your criteria.') ?></p>
</div>
</div>

<?php endif; ?>
  

<? get_footer(); ?>
