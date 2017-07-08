<?php get_header() ?>
 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="container">
<h1 class="page-title"><?php the_title(); ?></h1>
<?php the_content(); ?>
</div>

<?php trackback_rdf(); ?>

<?php endwhile; else: ?>

<div class="container">
<div class="col-xs-12">
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
</div>
</div>

<?php endif; ?>

<?php get_footer(); ?>