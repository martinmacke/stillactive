<!-- News -->
<?php
$args = array(
	'posts_per_page'	=> 10,
	'offset'				=> 0
);

$myposts = get_posts( $args );
if(empty($myposts)) { echo "<p><b>Wij hebben op dit moment geen nieuws!</b></p>"; };
foreach ( $myposts as $post ) : setup_postdata( $post ) ?>
<article class="news clearfix">

<a href="<? the_permalink() ?>"><h4><? the_title() ?></h4></a>
<?php $excerpt = get_the_excerpt() ?>
<p><span class="date"><?php the_time('j.n.Y') ?></span> 
<?php echo $excerpt; ?>

</article>


<?php
endforeach; 
wp_reset_postdata();
?>

<!-- End News -->