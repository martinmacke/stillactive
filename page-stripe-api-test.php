<?php get_header() ?>
 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="container">
<h1><?php the_title(); ?></h1>

<?php
$ch = curl_init();
$curlConfig = array(
CURLOPT_URL            => "https://api.stripe.com/v1/charges",
CURLOPT_USERPWD			=> "sk_test_TbxpkoPCLrpAJNSp6Fqf10uK:",
CURLOPT_RETURNTRANSFER => true,
);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
curl_close($ch);
print_r($result);
?>

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