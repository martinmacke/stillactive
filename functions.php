<?php

require_once 'inc/custom_vendor_fields.php';

add_theme_support( 'title-tag' );
/* Custom excerpt lenght */
function custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
/* Custom excerpt ending */
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
/* Register menu/s */
function register_my_menus() {
  register_nav_menus(
	  array(
      'main-menu' => __( 'Main Menu' ),
	  'menu-topleft' => __( 'Menu Top Left' ),
	  'menu-topright' => __( 'Menu Top Right' ),
      'footer-customer-service' => __( 'Customer Service' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );
/* Sidr + custom scripts */
function add_scripts() {
	wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_register_style( 'bootstrap.css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7', 'screen' );
	wp_enqueue_style( 'slick.css',  get_template_directory_uri() . '/slick/slick.css', array(), '1.5', 'screen' );
	wp_enqueue_style( 'slick-theme.css',  get_template_directory_uri() . '/slick/slick-theme.css', array(), '1.5', 'screen' );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), '1.5', false );
	wp_enqueue_style( 'jquery.sidr.dark.css',  get_template_directory_uri() . '/sidr/jquery.sidr.dark.css', array(), '1.2.1', 'screen' );
	wp_enqueue_script( 'sidr', get_template_directory_uri() . '/sidr/jquery.sidr.min.js', array('jquery'), '1.2.1', false );
	wp_enqueue_script( 'matchheight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), '0.5.2', false );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.1', true );
	wp_register_style( 'stillactive', get_stylesheet_uri() . "?2", array( 'bootstrap.css' ));
    wp_enqueue_style( 'stillactive' );
	wp_register_script('masonryInit', get_stylesheet_directory_uri() . '/js/masonry.js', array('masonry'), '2.1.6', true);
	wp_enqueue_script('masonryInit');
	// if( is_single() ){
		// wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAhzp_yBTUwNMT9QIXZImsuM6pRu0rXdNM', array(), '3', true );
		// wp_register_script('google-sa-maps', get_template_directory_uri() . '/js/sa_maps.js', array(), '1.0.0', true);
		// wp_enqueue_script('google-sa-maps');
	// }
}
add_action( 'wp_enqueue_scripts', 'add_scripts' );
/* Add Font Awesome */
add_action('wp_head', function(){ echo '<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >'; }, 99999 );
/* Register sidebar */
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));
/* Register widget areas */
function addWidgets() {
    $footer_widgets = array(
        'name'          => 'Footer %d',
        'id'            => "footer_widget_$i",
        'description'   => '',
        'class'         => '',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    );
	$widget_credit = array(
        'name'          => 'Credit',
        'id'            => "footer_credit",
        'description'   => 'Bottom of the page.',
        'class'         => '',
        'before_widget' => '',
        'after_widget'  => '',
    );
	$widget_credit = array(
        'name'          => 'Footer Bottom Right',
        'id'            => "footer_right",
        'description'   => 'Bottom right corner of the site.',
        'class'         => '',
        'before_widget' => '',
        'after_widget'  => '',
    );
	$widget_topleft = array(
		'name'          => 'Top Left',
        'id'            => "header_top_left",
        'description'   => 'Area in the top left corner of the page.',
        'class'         => '',
        'before_widget' => '',
        'after_widget'  => '',
    );
	$widget_cart = array(
        'name'          => 'Shopping cart',
        'id'            => "cart_hover",
        'description'   => 'Shopping cart visible on hover over icon in the header.',
        'class'         => '',
        'before_widget' => '',
        'after_widget'  => '',
    );
	$post_sidebar = array(
        'name'          => 'Blog post sidebar',
        'id'            => "post_sidebar",
        'description'   => 'Sidebar next to a blog post content.',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
        'before_widget' => '',
        'after_widget'  => '',
    );
    register_sidebars( 4, $footer_widgets );
	register_sidebar( $widget_credit );
	register_sidebar( $widget_topleft );
	register_sidebar( $widget_cart );
	register_sidebar( $post_sidebar );
}
add_action( 'widgets_init', 'addWidgets' );
/* Enable post thumbnails */
add_theme_support( 'post-thumbnails' );
/* Enable custom editor styles */
function my_theme_add_editor_styles() {
    add_editor_style( 'style-editor.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
/* Custom login CSS stylesheet */
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
/* Declare WooCommerce Support */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'woocommerce-product-vendors' );
}
/* Custom thumbnail sizes */
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( '400x300', 400, 300, array( 'center', 'center' ) );
	add_image_size( 'square', 400, 400, array( 'center', 'center' ) );
	add_image_size( 'Blogpost', 800, 300, array( 'center', 'center' ) );
	add_image_size( '600x450', 600, 450, array( 'center', 'center' ) );
	add_image_size( '1200x400', 1200, 400, array( 'center', 'center' ) );
}
add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
         '400x300' => __('400x300'),
		'square' => __('Square'),
		'800x300' => __('Blogpost'),
		 '600x450' => __('600x450'),
		'1200x400' => __('1200x400'),
    ) );
}
// Display 24 products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );
/*replace text in top right admin panel*/
function replace_admintext( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
	$newtitle = str_replace( 'Howdy', 'Welcome back', $my_account->title );
    $wp_admin_bar->add_node(array(
        'id' => 'my-account',
        'title' => $newtitle,
    ));
}
add_filter( 'admin_bar_menu', 'replace_admintext',25 );
/*get user group*/
function get_user_group() {
    global $current_user;
    $guser=get_userdata($current_user->ID);
    if($guser->roles[0]=='wc_product_vendors_admin_vendor'){
        return 'vendor';
    }else{
        return 'other';
    }
}
/*custom admin panel styles*/
function custom_admin_theme_style() {
    wp_enqueue_style('icons-animation-style', get_template_directory_uri() . '/css/animation.css');
    wp_enqueue_style('icons-stillactive-style', get_template_directory_uri() . '/css/stillactive.css');
    wp_enqueue_style('icons-stillactive-codes-style', get_template_directory_uri() . '/css/stillactive-codes.css');
    wp_enqueue_style('icons-stillactive-embedded-style', get_template_directory_uri() . '/css/stillactive-embedded.css');
    wp_enqueue_style('icons-stillactive-ie7-style', get_template_directory_uri() . '/css/stillactive-ie7.css');
    wp_enqueue_style('icons-stillactive-ie7-codes-style', get_template_directory_uri() . '/css/stillactive-ie7-codes.css');
    wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/css/admin.css');
	wp_enqueue_script( 'admin-scripts', get_template_directory_uri() . '/js/admin.js', array('jquery'), '1.0.1', true );
    /*custom styles for vendor admin panel*/
    if(get_user_group()=='vendor'){
        wp_enqueue_style('custom-admin-vendor-style', get_template_directory_uri() . '/css/admin_vendor.css');
    }
}
add_action('admin_enqueue_scripts', 'custom_admin_theme_style');
/*remove send notification for vendors*/
function remove_note_vendor(){
//    print_r($GLOBALS['submenu']['edit.php?post_type=wc_booking'][13]);
    if(get_user_group()=='vendor'){
        remove_submenu_page('edit.php?post_type=wc_booking','booking_notification');
    }
}
add_action('admin_menu','remove_note_vendor','999');

/*set custom dashboard title*/
function custom_dashboard_title(){
    if(get_user_group()=='vendor'){
        if ( $GLOBALS['title'] != 'Dashboard' ){
            return;
        }
        global $current_user;
        $guser=get_userdata($current_user->ID);
        $GLOBALS['title'] = 'Welcome back, '.$guser->user_login;
    }
}
add_action( 'admin_head', 'custom_dashboard_title' );

//add_action('admin_menu', array( &$this,'rc_scd_register_menu') );
//add_action('load-index.php', array( &$this,'rc_scd_redirect_dashboard') );
add_action('admin_init', 'remove_product_editor');
function remove_product_editor() { remove_post_type_support('product', 'editor'); }
 function manage_available_gateways( $gateways ) {
		unset($gateways['wc-booking-gateway']);
		return $gateways;
	}
add_filter( 'woocommerce_available_payment_gateways', 'manage_available_gateways' );
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
$hide_booking_status	= '';
if( !current_user_can('manage_options') ){
	if( 'wc_booking' == $_GET['post_type'] ){
		$hide_booking_status = 'ul.subsubsub {
			display:none;
		}';
	}
}
echo '<style>
#wp-user-avatars-user-settings  { position:relative !important;width: 76%;}
#wp-user-avatars-user-settings p.submit { text-align: left }
body.wp-admin #adminmenu .wp-submenu-head, #adminmenu a.menu-top{font-size:14px;}
'. $hide_booking_status .'
  </style>';
}
 add_action( 'woocommerce_product_options_general_product_data', 'hiding_and_set_product_settings' );
function hiding_and_set_product_settings(){
     $roles = wp_get_current_user()->roles;
 if ( $roles['0'] == 'wc_product_vendors_admin_vendor'){
        ## CSS RULES ## (change the opacity to 0 after testing)
        // HERE Goes OUR CSS To hide 'virtual' and 'downloadable' and 'Enable person types' checkboxes
        ?>
        <style>
            label[for="_virtual"], label[for="_downloadable"], ._wc_booking_has_person_types_field { display: none !important; }
			 ._wc_booking_calendar_display_mode_field , ._wc_booking_requires_confirmation_field { display: none; }
			._wc_booking_user_can_cancel_field  {}
         </style>
        <?php
        ## JQUERY SCRIPT ##
        // Here we set as selected the 'virtual' and 'downloadable' checkboxes
        ?>
        <script>
            (function($){
                $('input[name=_virtual]').prop('checked', true);
				// $('input[name=_wc_booking_requires_confirmation]').prop('checked', true);
             })(jQuery);
        </script>
        <?php
}
}
add_action('show_user_profile', 'numediaweb_custom_user_profile_fields');
function numediaweb_custom_user_profile_fields($user) {
?>
 <style>
           .description { display: block!important;}
	 #your-profile h2:nth-child(5n) ,.user-language-wrap { display: none!important;}
         </style>
		 <script>
		  (function($){
                $('.user-sessions-wrap > th').html('Security');
             })(jQuery);
		 </script>
<?php
}
add_action('wp_head', 'vendors_css');
function vendors_css() {
	$queried_object = get_queried_object();
	// print_r( $queried_object );
	$hide_sold_by	= '';
	if( 'wcpv_product_vendors' == $queried_object->taxonomy ){
		$hide_sold_by = 'em.wcpv-sold-by-loop {
				display:none;
			}';
	}
	echo '<style>
		ul.vendor_details_ul {
			padding: 0;
			margin: 0;
			list-style: none;
		}
		ul.vendor_details_ul li {
			font-size: 20px;
			line-height: normal;
			color: #005678;
			padding: 10px;
			margin: 0;
			border-bottom: 1px solid #ececec;
		}
		ul.vendor_details_ul li:last-child {
			border-bottom: none;
		}
		ul.vendor_details_ul li i {
			color: #33ccff;
			font-size: 15px;
			width: 35px;
			height: 35px;
			display: inline-block;
			border: 1px solid #33ccff;
			text-align: center;
			border-radius: 100%;
			line-height: 35px;
			margin: 0 10px 0 0;
		}
		'.$hide_sold_by.'
	</style>';
}
/*
	Remove Visual Composer Page link for all non-admin users
*/
add_action('admin_menu', 'remove_visual_composer');
function remove_visual_composer() {
	if( !current_user_can('manage_options') ){
		remove_menu_page('vc-general');
		remove_menu_page('vc-welcome');
		global $pagenow;
		if( 'admin.php' == $pagenow && isset( $_GET['page'] ) && ($_GET['page'] == 'vc-general' || $_GET['page'] == 'vc-general') ){
			wp_redirect( admin_url() );
		}
	}
}

add_action( 'user_register', 'myplugin_registration_save', 10, 1 );
function myplugin_registration_save( $user_id ) {
  update_user_meta($user_id, 'prefix_first_login_my', '1');

  if ( isset( $_POST['first_name'] ) && isset( $_POST['last_name'] ) ) {
    update_user_meta( $user_id, 'first_name', $_POST['first_name'] );
    update_user_meta( $user_id, 'last_name', $_POST['last_name'] );
  }

}


/* Remove Strong Password Requirement when registering */
add_action( 'wp_print_scripts', 'DisableStrongPW', 100 );
function DisableStrongPW() {
    if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
        wp_dequeue_script( 'wc-password-strength-meter' );
    }
}
/* Own API key for ACF maps field */
function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyAhzp_yBTUwNMT9QIXZImsuM6pRu0rXdNM';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
/* Make WooCommerce cancel booking 'Days' option selected */
add_action( 'admin_print_scripts-post-new.php', 'add_cancel_booking_script', 11 );
add_action( 'admin_print_scripts-post.php', 'add_cancel_booking_script', 11 );
function add_cancel_booking_script() {
	global $post_type;
	if( 'product' == $post_type && !current_user_can( 'manage_woocommerce' ) ){
		wp_enqueue_script(  'cancel_booking', get_stylesheet_directory_uri().'/js/cancel_booking.js' );
	}
}
// Sets all products as virtual by default //
function cs_wc_product_type_options( $product_type_options ) {
    $product_type_options['virtual']['default'] = 'yes';
    return $product_type_options;
}
add_filter( 'product_type_options', 'cs_wc_product_type_options' );
// update bookings menu bubble and upcoming bookings on dashboard page
add_action( 'admin_head', 'add_bookings_menu_bubble' );
function add_bookings_menu_bubble() {
	global $post, $wpdb, $menu;
	if( is_user_logged_in() ){
		$roles = wp_get_current_user()->roles;
		if( in_array( 'wc_product_vendors_admin_vendor', $roles ) ){
			if( class_exists('WC_Product_Vendors_Utils') ){
				$vendor_data = WC_Product_Vendors_Utils::get_vendor_data_from_user();
				$args	= array(
					'post_type'		=>	'product',
					'post_status'	=>	'publish',
					'tax_query'		=>	array(
											array(
												'taxonomy'	=> $vendor_data['taxonomy'],
												'field'		=> 'term_taxonomy_id',
												'terms'		=> $vendor_data['term_id'],
											),
										)
				);
				$booking_counter	= 0;
				$wc_vendor_products	= new WP_Query( $args );
				if( $wc_vendor_products->have_posts() ){
					while ( $wc_vendor_products->have_posts() ) {
						$wc_vendor_products->the_post();
						$product_id	= get_the_ID();
						$author_id	= get_the_author_ID();
						if( get_current_user_id() == $author_id ){
							$query				= "SELECT p.post_status FROM ". $wpdb->posts ." p, ". $wpdb->postmeta ." pm WHERE p.id = pm.post_id AND p.post_type='wc_booking' AND p.post_status='paid' AND pm.meta_key='_booking_product_id' AND pm.meta_value='$product_id'";
							$sa_results			= $wpdb->get_results($query, ARRAY_N);
							$booking_counter	+= count( $sa_results );
						}
					}
					wp_reset_postdata();
				}
				$booking_count	= '<span class="sa_bookings_count update-plugins count-'.$booking_counter.'" title="Upcoming bookings"><span class="plugin-count">'. $booking_counter .'</span></span>';
				$screen			= get_current_screen();
				if ( "dashboard" == $screen->id ) {
					?>
					<script>
						jQuery(document).ready(function(){
							if( jQuery('.wc_status_list .low-in-stock a strong').length > 0 ){
								jQuery('.wc_status_list .low-in-stock a strong').text('<?php echo $booking_counter; ?>');
							}
						});
					</script>
				<?php
				}
				if ( $booking_counter > 0 ) {
					foreach ( $menu as $key => $value ) {
						if ( $menu[$key][2] == 'edit.php?post_type=wc_booking' ) {
							$menu[$key][0] .= ' ' . $booking_count . '';
							return;
						}
					}
				}
			}
		}
	}
}
// check if YITH WooCommerce Wishlist Plugins is installed, show Saved for Later endpoint under WooCommerce My Account
if( shortcode_exists('yith_wcwl_wishlist') ){
	function sa_account_menu_items( $items ) {
		$items['saved'] = __( 'Saved for Later', 'woocommerce' );
		return $items;
	}
	add_filter( 'woocommerce_account_menu_items', 'sa_account_menu_items', 10, 1 );
	/**
	 * Add endpoint
	 */
	function sa_add_my_account_endpoint() {
		add_rewrite_endpoint( 'saved', EP_PAGES );
	}
	add_action( 'init', 'sa_add_my_account_endpoint' );
	/**
	 * Information content
	 */
	function sa_saved_endpoint_content() {
		echo do_shortcode('[yith_wcwl_wishlist]');
	}
	add_action( 'woocommerce_account_saved_endpoint', 'sa_saved_endpoint_content' );
	/**
	 * Helper: is endpoint
	 */
	function sa_is_endpoint( $endpoint = false ) {
		global $wp_query;
		if( !$wp_query )
			return false;
		return isset( $wp_query->query[ $endpoint ] );
	}
}
/*
	Review Submitted Popup
*/
add_action("init","comment_success_popup");
function comment_success_popup(){
	if ( false === ($review_added = get_transient("comment_added"))){
		//nothing
	}
	else{
		delete_transient("comment_added");
		add_action('wp_footer', 'review_modal_script');
	}
}
function review_modal_script(){
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#comment-popup").modal('show');
	});
</script>
    <div id="comment-popup" class="modal fade still_active_popup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
               <center>
               <h1>Thank you for your feedback!</h1>
               <p>It helps us to further develop and improve our <br /> offerings. Would like to get in touch with us?</p>
               </center>
            </div>
            <div class="modal-footer">
            	<center>
            	<a href="mailto:hello@stillactive.se" class="btn btn-primary">Get in touch</a>
                <br />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </center>
            </div>
        </div>
    </div>
</div>
<?php
}
add_action( 'comment_post', 'show_message_function', 10, 2 );
function show_message_function( $comment_ID, $comment_approved ) {
	set_transient("comment_added","true");
}
/*
	Filter to change booking form fields
*/
add_filter('admin_footer','wswp_booking_form_fields');
function wswp_booking_form_fields() {
    if( is_user_logged_in() ){
		$roles = wp_get_current_user()->roles;
		if( in_array( 'wc_product_vendors_admin_vendor', $roles ) ){
		?>
			<script>
				jQuery(document).ready( function(){
					if( jQuery('#_wc_booking_user_can_cancel').length > 0 ){
						jQuery('#_wc_booking_user_can_cancel').prop('checked', true);
						jQuery('#_wc_booking_user_can_cancel').prop('disabled', true);
						// jQuery('#_wc_booking_user_can_cancel').attr('onclick', 'return false');
						// jQuery('#_wc_booking_user_can_cancel').prop('readonly', 'readonly');
					}
					if( jQuery('select#product-type').length > 0 ){
						jQuery('select#sc-field').change( function(){
							if('booking' == jQuery(this).val()){
								jQuery('#_wc_booking_user_can_cancel').prop('checked', true);
								jQuery('#_wc_booking_user_can_cancel').prop('disabled', true);
							}
						});
					}
					if( jQuery('#sc-field').length > 0 ){
						jQuery('#sc-field').parent().hide();
					}
				});
			</script>
		<?php
		}
	}
}


/**
 * move social login buttons on account form from "login" to "register
 */
function sa_social_login_move_register_buttons() {
  if ( function_exists( 'wc_social_login' ) && ! is_admin() ) {
    remove_action( 'woocommerce_login_form_end', array( wc_social_login()->get_frontend_instance(), 'render_social_login_buttons' ) );
    add_action( 'woocommerce_login_form_start', array( wc_social_login()->get_frontend_instance(), 'render_social_login_buttons' ) );

    remove_action( 'woocommerce_register_form_end', array( wc_social_login()->get_frontend_instance(), 'render_social_login_buttons' ) );
		add_action( 'woocommerce_register_form_start', array( wc_social_login()->get_frontend_instance(), 'render_social_login_buttons' ) );
  }

}
add_action( 'init', 'sa_social_login_move_register_buttons' );


function sa_extra_register_fields() { ?>

	<h4 class="selection-tag">OR</h4>

   <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
     <label for="reg_first_name"><?php _e( 'First name', 'woocommerce' ); ?></label>
     <input type="text" class="input-text" name="first_name" id="reg_first_name" value="<?php if ( ! empty( $_POST['first_name'] ) ) esc_attr_e( $_POST['first_name'] ); ?>" />
   </p>
   <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
     <label for="reg_last_name"><?php _e( 'Last name', 'woocommerce' ); ?></label>
     <input type="text" class="input-text" name="last_name" id="reg_last_name" value="<?php if ( ! empty( $_POST['last_name'] ) ) esc_attr_e( $_POST['last_name'] ); ?>" />
   </p>
   <div class="clear"></div>
   <?php
 }
 add_action( 'woocommerce_register_form_start', 'sa_extra_register_fields', 20 );

 // Add the code below to your theme's functions.php file to add a confirm password field on the register form under My Accounts.
add_filter('woocommerce_registration_errors', 'sa_registration_errors_validation', 10,3);
function sa_registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'stillactive' ) );
	}
	return $reg_errors;
}


add_action( 'woocommerce_register_form', 'sa_register_form_password_repeat' );
function sa_register_form_password_repeat() {
	?>
	<p class="form-row form-row-wide">
		<label for="reg_password2"><?php _e( 'Password Repeat', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="password" class="input-text" name="password2" id="reg_password2" value="" required/>
	</p>
	<?php
}


// $term_args = apply_filters( 'wcpv_registration_term_args', array(
	// 'description' => 'aasasasa cvcvcvc hjhjhjhj kjkjkjk ssdsdsdsds',
// ) );
// wp_update_term( 20, WC_PRODUCT_VENDORS_TAXONOMY, $term_args );

// global $wp_filter;
// echo "<pre>";
// print_r($wp_filter['edited_term']);
// echo "</pre>";


/*
Only search products
*/
function searchfilter($query) {
	if ( $query->is_search && !is_admin() ) {
		$query->set('post_type', array('product'));
	}
	return $query;
}
add_filter('pre_get_posts','searchfilter');


function sa_update_referral_content_before() {?>

  <div class="row">
    <div class="col-xs-1">
      <i class="icon-add-friends"></i>
    </div>
    <div class="col-xs-11">
      <h3 class="vc_custom_heading"><?php _e( 'Tell your friends and family about Still Active and get rewarded!', 'stillactive' ) ?></h3>
    </div>
  </div>

	<div class="row">
    <div class="col-xs-12">
      <?php _e('This is your unique referral code - send this to your friends! For each friend that signs up and books an activity, you will receive 10% at Still Active! Your friend must use this specific URL when signing up to become a member.', 'stillactive' ) ?>
    </div>
	</div>

  <?php
}
add_action( 'woocommerce_before_my_account', 'sa_update_referral_content_before', 0 );


function sa_update_referral_content_after() {?>

  <div class="row">
    <div class="col-xs-12 text-center">
      <?php _e('Share this URL with everyone you know', 'stillactive' ) ?>
    </div>
  </div>

	<div class="row" style="margin-top: 50px;">
    <div class="col-xs-1">
      <i class="icon-coupon"></i>
    </div>
    <div class="col-xs-11">
      <h3 class="vc_custom_heading"><?php _e('Your earned referral coupons', 'stillactive' ) ?></h3>
    </div>
  </div>


  <?php
	$args = array(
    'posts_per_page'   => -1,
    'orderby'          => 'title',
    'order'            => 'asc',
    'post_type'        => 'shop_coupon',
    'post_status'      => 'publish',
  );

  $coupons = get_posts( $args );
  ?>

	<div class="row sa-refer-friend">
    <div class="col-xs-12">
      <table class="table">
        <thead>
          <tr>
            <th><?php _e('Coupon code', 'stillactive' ) ?></th>
            <th><?php _e('Coupon discount', 'stillactive' ) ?></th>
          </tr>
        </thead>

        <tbody>
          <?php if ( count( $coupons ) > 0 ) {

            $current_user = wp_get_current_user();

            foreach( $coupons as $key => $coupon ){

              $customer_email = get_post_meta( $coupon->ID, 'customer_email', true );
              $expiry_date    = get_post_meta( $coupon->ID, 'expiry_date', true );
              $coupon_amount  = get_post_meta( $coupon->ID, 'coupon_amount', true );
              $discount_type  = get_post_meta( $coupon->ID, 'discount_type', true );

              $is_expired   = 'no';
              if ( ! empty( $expiry_date ) && strtotime( $expiry_date ) < strtotime( date( 'Y-m-d H:i:s' ) ) ) {
                $is_expired   = 'yes';
              }

              if (
                'no' === $is_expired
                &&
                (
                  (
                    is_array( $customer_email )
                    &&
                    ( empty( $customer_email ) || in_array( $current_user->user_email, $customer_email ) )
                  )
                  ||
                  $customer_email === $current_user->user_email
                )
              ) {
                ?>

                <tr>
                  <td> <?php echo $coupon->post_title; ?> </td>
                  <td> <?php echo $coupon_amount; echo ( $discount_type == 'percent' ) ? '%' : ''; ?></td>
                </tr>

              <?php
              }
            }
          }?>
        </tbody>
      </table>
    </div>
	</div>
  <?php
}
#add_action( 'woocommerce_before_my_account', 'sa_update_referral_content_after' );


/**
 * Show booking data if a line item is linked to a booking ID.
 */
add_action( 'woocommerce_order_item_meta_end', 'sa_booking_display', 10, 3 );
function sa_booking_display( $item_id, $item, $order ) {
	$booking_ids = WC_Booking_Data_Store::get_booking_ids_from_order_item_id( $item_id );
	$WC_Booking_Order_Manager	= new WC_Booking_Order_Manager();

	if ( $booking_ids ) {
		foreach ( $booking_ids as $booking_id ) {
			$booking = new WC_Booking( $booking_id );
			?>
			<div class="wc-booking-summary sa_booking_summary">
				<strong class="wc-booking-summary-number">
					<?php printf( __( 'Booking #%s', 'woocommerce-bookings' ), esc_html( $booking->get_id() ) ); ?>
					<span class="status-<?php echo esc_attr( $booking->get_status() ); ?>">
						<?php echo esc_html( wc_bookings_get_status_label( $booking->get_status() ) ) ?>
					</span>
				</strong>
				<?php
					$product  = $booking->get_product();
					$resource = $booking->get_resource();
					$label    = $product && is_callable( array( $product, 'get_resource_label' ) ) && $product->get_resource_label() ? $product->get_resource_label() : __( 'Type', 'woocommerce-bookings' );
					?>
					<ul class="wc-booking-summary-list">
						<li><?php echo esc_html( sprintf(  __( '%1$s', 'woocommerce-bookings' ), 'Activity start time: ' . $booking->get_start_date() ) ); ?></li>
						<li style="border-right: none;"><?php echo esc_html( sprintf(  __( '%1$s', 'woocommerce-bookings' ), 'Activity end time: ' . $booking->get_end_date() ) ); ?></li>
						<br/>

						<?php if ( $resource ) : ?>
							<li><?php echo esc_html( sprintf( __( '%s: %s', 'woocommerce-bookings' ), $label, $resource->get_name() ) ); ?></li>
						<?php endif; ?>

						<?php
							if ( $product->has_persons() ) {
								$person_types  = $product->get_person_types();
								$person_counts = $booking->get_person_counts();

								if ( ! empty( $person_types ) && is_array( $person_types ) ) {
									foreach ( $person_types as $person_type ) {
										?>
										<li><?php echo esc_html( sprintf( '%s: %d', $person_type->get_name(), isset( $person_counts[ $person_type->get_id() ] ) ? $person_counts[ $person_type->get_id() ] : 0 ) ); ?></li>
										<?php
									}
								} else {
									?>
									<li><?php echo esc_html( sprintf( __( '%d Persons', 'woocommerce-bookings' ), array_sum( $booking->get_person_counts() ) ) ); ?></li>
									<?php
								}
							}
						?>
					</ul>
				<div class="wc-booking-summary-actions" style="margin: 0;">
					<?php if ( $booking_id && function_exists( 'wc_get_endpoint_url' ) && wc_get_page_id( 'myaccount' ) ) : ?>
						<a href="<?php echo esc_url( wc_get_endpoint_url( $WC_Booking_Order_Manager->get_endpoint(), '', wc_get_page_permalink( 'myaccount' ) ) ); ?>"><?php _e( 'View my bookings &rarr;', 'woocommerce-bookings' ); ?></a>
					<?php endif; ?>
				</div>
			</div>
			<?php
		}
	}
}

// add product advanced tab foe vendors
add_filter( 'woocommerce_product_data_tabs', 'filter_woocommerce_product_data_tabs', 10, 1 );
function filter_woocommerce_product_data_tabs( $array ) {
	if( is_user_logged_in() ){
		$guser	= get_userdata(get_current_user_id());
		if( 'wc_product_vendors_admin_vendor' == $guser->roles[0] || 'wc_product_vendors_manager_vendor' == $guser->roles[0] ){
			// make filter magic happen here...
			$array['advanced']	= array(
									'label'  => __( 'Advanced', 'woocommerce' ),
									'target' => 'advanced_product_data',
									'class'  => array(),
								);
		}
	}
	return $array;
};