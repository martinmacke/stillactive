<?php if($wp_query->current_post == 0): ?>

<div class="col-xs-12 col-md-6 post card">

<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('600x450'); ?></a>
<?php else: ?>

<?php 
$attachment_id = 868; // attachment ID
$image_attributes = wp_get_attachment_image_src( $attachment_id, "600x450" ); // returns an array
if( $image_attributes ) {
?> 
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img class="wp-post-image" src="<?php echo $image_attributes[0]; ?>" alt=""></a>
<?php } ?>

<?php endif; ?>
<p class="alt-title"><?php echo get_the_category_list( ", ", "", $post->ID ); ?></p>
	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<p class="small">
	<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('j F, Y'); ?></span>
	<span class="author"><i class="fa fa-user-o" aria-hidden="true"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
</p>

<?php the_excerpt(); ?>
<a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e('Read more', 'stillactive'); ?></a>

</div>

<?php else: ?>

<div class="col-xs-12 col-md-3 post card">

<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('600x450'); ?></a>
<?php else: ?>

<?php 
$attachment_id = 868; // attachment ID
$image_attributes = wp_get_attachment_image_src( $attachment_id, "600x450" ); // returns an array
if( $image_attributes ) {
?> 
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img class="wp-post-image" src="<?php echo $image_attributes[0]; ?>" alt=""></a>
<?php } ?>

<?php endif; ?>
<div class="text">
<p class="alt-title"><?php echo get_the_category_list( ", ", "", $post->ID ); ?></p>
<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


<?php the_excerpt(); ?>
</div>
<a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e('Read more', 'stillactive'); ?></a>

</div>

<?php endif; ?>