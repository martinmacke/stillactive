<?php get_header() ?>
 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="container">
<h1><?php the_title(); ?></h1>

<?php #require_once('stripe-php/init.php'); ?>

<?php

	/*
\Stripe\Stripe::setApiKey("sk_test_TbxpkoPCLrpAJNSp6Fqf10uK");
echo \Stripe\Balance::retrieve();
*/

?>
<?php
/* Create a custom account */
/*
\Stripe\Stripe::setApiKey("sk_test_TbxpkoPCLrpAJNSp6Fqf10uK");

$create_account = \Stripe\Account::create(array(
	"type" => "custom",
	"country" => "CH",
	"business_name" => "AboutBlank",
	"email" => "info@aboutblank.cz"
));

print_r($create_account);
*/
?>

<?php
/* Update an account */
/*
\Stripe\Stripe::setApiKey("sk_test_TbxpkoPCLrpAJNSp6Fqf10uK");
$account = \Stripe\Account::retrieve("acct_1AkXVbFD6oBwbWwQ");
$account->legal_entity->type = "company";
$account->legal_entity->additional_owners = null;
$account->legal_entity->business_name = "AboutBlank";
$account->legal_entity->first_name = "Jonas";
$account->legal_entity->last_name = "Macke";
$account->legal_entity->business_tax_id = "12345678";
$account->legal_entity->verification->document = null;
	
$account->legal_entity->address->city = "Prague";
$account->legal_entity->address->country = "CH";
$account->legal_entity->address->line1 = "Las Palmas 123";
$account->legal_entity->address->line2 = null;
$account->legal_entity->address->postal_code = "9056";
$account->legal_entity->address->state = null;

$account->legal_entity->personal_address->city = "Prague";
$account->legal_entity->personal_address->line1 = "Nad Obecníkem 698";
$account->legal_entity->personal_address->postal_code = "9056";

$account->legal_entity->dob->day = 18;
$account->legal_entity->dob->month = 4;
$account->legal_entity->dob->year = 1983;
$account->tos_acceptance->ip = "178.111.148.213";
$account->tos_acceptance->date = time();
echo $account->save();
*/
?>

<?php
/* List all uploads */
#\Stripe\Stripe::setApiKey("sk_test_TbxpkoPCLrpAJNSp6Fqf10uK");
#echo \Stripe\FileUpload::all(array("limit" => 3));
?>

<?php
/* Delete an account */

\Stripe\Stripe::setApiKey("sk_live_CSk75NRTjBtujRdoSzdKrDAx");
$account = \Stripe\Account::retrieve("acct_1BJ5iaIRceSpoKLf");
$account->delete();

?>

<?php
/*
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
*/
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