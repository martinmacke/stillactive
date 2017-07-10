<?php
if( isset($_GET['action']) == 'register' ) {
    woocommerce_get_template( 'myaccount/form-register.php' );
} else {
    woocommerce_get_template( 'myaccount/form-login-single.php' );
}
