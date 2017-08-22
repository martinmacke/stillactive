<?php get_header(); ?>

<div class="container category">

<div class="col-xs-12">
<h1 class="page-title text-center"><?php _e('Welcome to the Still Active Blog!', 'stillactive'); ?></h1>
<ul class="subnav">
<?php
	$args = array('hide_empty' => 0, 'depth' => 1, 'title_li' => '', 'show_option_all' => 'All');
	wp_list_categories($args);	
?>
</ul>

</div>
</div>

<?php if ( have_posts() ) : ?>

<div class="container">
<div class="flexposts">

<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part('inc/list-posts'); ?>

<?php endwhile; ?>

<div class="col-xs-12">
<?php the_posts_pagination(); ?>
</div>

</div>
</div>

<?php else: ?>

<div class="container">
<div class="col-xs-12">
<p class="text-center" style="margin-top: 80px;"><?php _e('No posts in this category yet, check back soon!', 'stillactive'); ?></p>
</div>
</div>



<?php endif; ?>  



<?php get_footer(); ?>