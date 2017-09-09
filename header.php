<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">

<meta name="author" content="aboutblank - creative web solutions" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php
$liveserver = "www.stillactive.se"; // Your Sub domain
if ($_SERVER['HTTP_HOST'] == $liveserver):
?>
<!-- Hotjar Tracking Code for www.stillactive.se -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:610313,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<?php endif; ?>

<?php wp_head(); ?>
</head>

<?php
global $woo_options;
global $woocommerce;
$my_home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) );
?>

<body <?php body_class( $class ); ?>> 

<header id="siteheader">
<div class="container">

<div class="col-xs-12">
	<a href="<?php echo $my_home_url; ?>" class="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo-stillactive-blue.svg" width="140" height="140" alt="Logo Still Active"></a>
	<div class="text-right pull-right sa_nav_div">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => 'nav', 'menu_class' => 'menu menu-main-menu', 'container_class' => 'hidden-xs', 'fallback_cb' => false ) ); ?>

		
		
		<div class="menu_except_search">
			
			<?php
			$account_page_url = get_permalink( get_option('woocommerce_myaccount_page_id') );
			if ( is_user_logged_in() ) {
					$current_user = wp_get_current_user();
					$dashboard_url = get_dashboard_url($current_user);
				  if ( ($current_user instanceof WP_User) ) {
					  echo '<a class="btn btn-primary sa_loggedin_username" href="' . $dashboard_url . '" >';
								  echo get_avatar( $current_user->user_email, 32 );

					echo  $current_user->first_name;
					echo '</a>';
				}

			}
			else {
			?>		 
			<!--<a class="sa_mobile_menu user_login_menu" href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login"><i class="fa fa-user" aria-hidden="true"></i> <div class='sa_menu_text'>Login</div></a>-->
			<a class="sa_mobile_menu user_login_menu" href="<?php echo $account_page_url; ?>">
				<i class="fa fa-user" aria-hidden="true"></i>
				<div class='sa_menu_text'>Login</div>
			</a>  
			<?php } ?>

			<?php
				global $woocommerce;
				$amount = $woocommerce->cart->cart_contents_total+$woocommerce->cart->tax_total;
				$currency_symbol = get_woocommerce_currency_symbol();
				if ( sizeof( WC()->cart->cart_contents) > 0 ) :
				echo '<a class="cart-contents" href="' . WC()->cart->get_cart_url() . '" title="' . __( 'View shopping cart' ) . '">' . $amount . $currency_symbol . '</a>';
				endif;
			?>

			<a id="sa_mobile_menu" class="visible-xs sa_mobile_menu" href="javascript:void(0);" data-target="#sa_mobile_menu_div" data-toggle="collapse" class="navbar-toggle">
				<i class="fa fa-bars" aria-hidden="true"></i>
				<div class='sa_menu_text'>Menu</div>
			</a>
			<?php
				wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_id' => 'main_menu_mobile', 'container' => 'div', 'menu_class' => 'sa_ul_mobile_menu nav navbar-nav', 'container_id' => 'sa_mobile_menu_div', 'container_class' => 'sa_mobile_menu_nav collapse', 'fallback_cb' => false) );
			?>
		</div>
		
		<ul class="blognav hidden-xs">
		<?php
			$args = array('hide_empty' => 0, 'depth' => 1, 'title_li' => '', 'show_option_all' => 'All');
			wp_list_categories($args);	
		?>
		</ul>
		
		<a class="sa_mobile_search sa_mobile_menu user_login_menu" data-toggle="modal" href="#search-popup">
			<i class="fa fa-search" aria-hidden="true"></i>
			<div class='sa_menu_text'><?php _e('Search', 'stillactive'); ?></div>
		</a>
	</div>
</div>

</div>
</header>