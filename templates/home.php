<?php
/*
Template Name: Homepage
*/
?>

<?php get_header() ?>
<?php trackback_rdf() ?>
 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="container">

<?php

if( have_rows('promo_boxes') ):

    while ( have_rows('promo_boxes') ) : the_row(); ?>
		
		<?php $i++; ?>
		<div class="col-xs-12 col-sm-6 text-center <?php if($i > 2) echo 'second'; else echo 'first'; ?>">
		
		<div class="promo" style="background: url(<?php the_sub_field('image'); ?>) no-repeat center center; background-size: cover;">
		<div>
		<a href="<?php the_sub_field('link'); ?>">
		<h1><?php the_sub_field('title'); ?></h1>
		<p><strong><?php the_sub_field('subtitle'); ?></strong></p>
		<button><?php the_sub_field('button'); ?></button>
		</a>
		</div>
		</div>
		</div>
		
		<?php if($i == 2 && get_field('titulek')): ?>
		<div class="col-xs-12 col-md-8 col-md-push-2 text-center"><p class="horline"><span><?php the_field('titulek'); ?></span></p></div>
		<?php endif; ?>
		
<?php
    endwhile; endif;
?>

</div>

<?php endwhile; endif; ?>

<?php get_footer() ?>