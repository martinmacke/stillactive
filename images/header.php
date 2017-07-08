<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">

<meta name="author" content="aboutblank - creative web solutions" />

<script src="https://use.typekit.net/wqp3wah.js"></script>
<script>try{Typekit.load({ async: false });}catch(e){}</script>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- Hotjar Tracking Code for beta.stillactive.se -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:525379,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<?php wp_head(); ?>
</head>

<?php
global $woo_options;
global $woocommerce;
?>

<body <?php body_class( $class ); ?>> 

<header id="siteheader">
<div class="container">

<div class="col-xs-12">
	<a href="/" class="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo-stillactive-blue.svg" width="140" height="140" alt="Logo Still Active"></a>
	<div class="text-right pull-right">
	<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => 'nav', 'menu_class' => 'menu menu-main-menu', 'container_class' => 'hidden-xs', 'fallback_cb' => false ) ); ?>

	<?php
	$account_page_url = get_permalink( get_option('woocommerce_myaccount_page_id') );
	if ( is_user_logged_in() ) {
			$current_user = wp_get_current_user();
			$dashboard_url = get_dashboard_url($current_user);
		  if ( ($current_user instanceof WP_User) ) {
			  echo '<a class="btn btn-primary" href="' . $dashboard_url . '" >';
						  echo get_avatar( $current_user->user_email, 32 );

			echo  $current_user->display_name ;
			echo '</a>';
		}

	}
	else {
	?>		 
	<!--<a class="btn btn-primary" href="<?php echo $account_page_url ?>">Login / Sign up</a>  -->
	<a class="btn btn-primary" href="<?php echo $account_page_url ?>">Login</a>  
	<?php } ?>

	<?php
		global $woocommerce;
		$amount = $woocommerce->cart->cart_contents_total+$woocommerce->cart->tax_total;
		$currency_symbol = get_woocommerce_currency_symbol();
		if ( sizeof( WC()->cart->cart_contents) > 0 ) :
		echo '<a class="cart-contents" href="' . WC()->cart->get_cart_url() . '" title="' . __( 'View shopping cart' ) . '">' . $amount . $currency_symbol . '</a>';
		endif;
	?>

	<a id="sa_mobile_menu" class="visible-xs" href="javascript:void(0);">
		<i class="fa fa-bars" aria-hidden="true"></i>
		<div class='sa_menu_text'>MENU</div>
	</a>

	</div>
</div>

</div>
</header>