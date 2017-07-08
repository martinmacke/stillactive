<?php
/*
Template Name: Slim
*/
?>

<?php get_header() ?>
<?php trackback_rdf() ?>
 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="container">
<section class="col-xs-12">
<div class="page-header">
<h1 class="text-center"><?php the_title(); ?></h1>
</div>
</section>
</div>


<?php $content = get_the_content();
if($content): ?>
<section class="container slim">
<div class="col-xs-12">
<?php the_content(); ?>
</div>
</section>
<?php endif; ?>

<?php get_template_part('inc/flexible-content'); ?>

<?php endwhile; else: ?>

<div class="container">
<div class="col-xs-12">
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
</div>
</div>

<?php endif; ?>

<?php get_footer() ?>