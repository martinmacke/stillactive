<?php
/**
* My Account page
*
* This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
*
* HOWEVER, on occasion WooCommerce will need to update template files and you
* (the theme developer) will need to copy the new files to your theme to
* maintain compatibility. We try to do this as little as possible, but it does
* happen. When this occurs the version of the template file will be bumped and
* the readme will list any important changes.
*
* @see     https://docs.woocommerce.com/document/template-structure/
* @author  WooThemes
* @package WooCommerce/Templates
* @version 2.6.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

/**
* My Account navigation.
* @since 2.6.0
*/
do_action( 'woocommerce_account_navigation' ); ?>
<style>
	button.close {
		-webkit-appearance: none;
		padding: 5px 10px !important;
		cursor: pointer;
		background: #000;
		border: 4px sold #fff !important;
		right: 20px;
	}
	.close {
		float: right;
		font-size: 21px;
		font-weight: 700;
		line-height: 1;
		color: white;
		text-shadow: none;
		filter: alpha(opacity=20);
		opacity: 1;
		top: 11px;
		position: relative;
		border-radius: 50%;
		display: inline-block;
	}
	.carousel-inner>.item {
		height: 500px;
	}
	.carousel-caption h1 {
		color: #33ccff;
		text-shadow: none;
	}
	.carousel-caption h3 {
		color: #005677;
		font-size: 35px;
		font-weight: bold;
		text-shadow: none;
		margin-bottom: 40px;
	}
	.carousel-caption p {
		text-shadow: none;
		color:#333;
		margin-bottom: 5px;
	}
	.carousel-indicators li ,.carousel-indicators .active{
		border: 4px solid #47c6f3;
		height: 18px;
		width: 18px;
	}
	.carousel-indicators .active {
		background-color: #47c6f3;
	}
	.carousel-caption {
		top: 0;
	}
	.carousel-caption .btn:hover ,.carousel-caption .btn{
		background: #33ccff none repeat scroll 0 0;
		color:#fff;
		margin-top: 40px;
	}
	button.myclose {
		background: none;
		color:#33ccff;
		font-size: 70px;
		font-weight: normal;
	}
	#myModals {
		margin-top: 45px;
	}
</style>

<div class="woocommerce-MyAccount-content">
	<?php
	/**
	* My Account content.
	* @since 2.6.0
	*/
	do_action( 'woocommerce_account_content' );
	?>
</div>
<?php     $user_id = get_current_user_id();
$user_info = get_userdata($user_id);

// getting prev. saved meta

$first_login = get_user_meta($user_id, 'prefix_first_login_my', true);

$user_id = get_current_user_id();
$referralID = get_user_meta($user_id, "gens_referral_id", true);
$refLink = esc_url(add_query_arg( 'raf', $referralID, get_home_url() ));


// if first time login

if( $first_login == '1' ) {

	// update meta after first login

	update_user_meta($user_id, 'prefix_first_login_my', '0');
	?>

	<div id="myModals" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<div class="modal-content">
				<button type="button" class="close myclose" data-dismiss="modal">&times;</button>
				<div class="modal-body"  style="clear:both">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
							<li data-target="#myCarousel" data-slide-to="3"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">

								<div class="carousel-caption">

									<h3><?php _e('Tell your friends and family about Still Active and get rewarded!', 'stillactive'); ?></h3>
									<!--<img width="100" height="100" src="<?php bloginfo('template_url'); ?>/images/icon-welcome.png" alt="Welcome">-->
									<p><?php _e('Share your unique URL with them and when they register and book an activity, you will get a reward: 10% discount on your next purchase. Just use the below buttons to share it on your Social Media page, or send the link directly to your friends.', 'stillactive'); ?></p>
									<p class="textwidget">
									<a class="fa fa-facebook fa-2x" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $refLink; ?>" target="_blank"></a>
									<a class="fa fa-twitter fa-2x" href="https://twitter.com/home?status=<?php echo $refLink; ?>" target="_blank"></a>
									<a class="fa fa-envelope fa-2x" href="mailto:?&body=<?php echo $refLink; ?>" target="_blank"></a>
									</p>

									<a class="btn btn-lg" data-target="#myCarousel" data-slide-to="1"  ><?php _e('Next Tip', 'stillactive'); ?></a>
								</div>
							</div>
							
							<div class="item">

								<div class="carousel-caption">

									<h3><?php _e('Welcome to Still Active', 'stillactive'); ?>, <?php echo $user_info->first_name; ?></h3>
									<!--<img width="100" height="100" src="<?php bloginfo('template_url'); ?>/images/icon-welcome.png" alt="Welcome">-->
									<p><?php _e('You are now part of the Still Active community. We are happy that you have joined us!', 'stillactive'); ?></p>

									<a class="btn btn-lg" data-target="#myCarousel" data-slide-to="2"  ><?php _e('Next Tip', 'stillactive'); ?></a>
								</div>
							</div>

							<div class="item">

								<div class="carousel-caption">
									<h3><?php _e('Book Activites', 'stillactive'); ?></h3>
									<p><?php _e('Discover our wide range of activities and book and pay directly for them. Select a category to easily find the activities you love!', 'stillactive'); ?></p>

									<a class="btn btn-lg" data-target="#myCarousel" data-slide-to="3"><?php _e('Next Tip', 'stillactive'); ?></a>
								</div>
							</div>

							<div class="item">

								<div class="carousel-caption">
									<h3><?php _e('Meet Others', 'stillactive'); ?></h3>
									<p><?php _e('Connect with other activity-enthusiasts in your city.', 'stillactive'); ?></p>

									<a class="btn btn-lg" data-dismiss="modal"><?php _e('Got it', 'stillactive'); ?></a>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>

		</div>
	</div>
<?php    }


?>
