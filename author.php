<?php get_header(); ?>

<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<div class="container author">

<div class="col-xs-12">
<p class="alt-title text-center"><?php _e('Author', 'stillactive'); ?></p>
<h1 class="page-title text-center"><?php echo get_avatar( $curauth->user_email, 52 ); ?> <?php echo $curauth->display_name; ?></h1>
<p class="text-center"><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php echo $curauth->user_email; ?>"><?php echo $curauth->user_email; ?></a></p>
<p class="lead"><?php echo $curauth->description; ?></p>

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