<? get_header() ?>

<div class="holder pad clearfix">
<div class="col full pad">
<h1>Search results</h1>
</div>
</div>

<div id="content" class="holder pad clearfix">

<div class="col half pad">

<?php while (have_posts()) : the_post(); ?>

<a href="<?php the_permalink() ?>">
<h2><?php the_title(); ?></h2>
</a>
<p><?php the_excerpt(); ?></p>

<?php endwhile; ?>
</div>

<div class="col half pad">
<? get_sidebar() ?>
</div>

</div>


<? get_footer() ?>