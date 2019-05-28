<?php  
/**
 * Custom Login Page 
 * @author David.A
*/
function login_logo_url() {
    return 'http://www.rosemontmedia.com/';
}
add_filter( 'login_headerurl', 'login_logo_url' );

function login_logo_url_title() {
    return 'Rosemont Media - A Modern Ad Agency';
}
add_filter( 'login_headertitle', 'login_logo_url_title' );

function my_custom_login() {
	echo '<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">';
	echo '<link rel="stylesheet" type="text/css" href="' . getThemeDirUrl( dirname(__FILE__)) . '/materialize.min.css" />';
	echo '<link rel="stylesheet" type="text/css" href="' . getThemeDirUrl( dirname(__FILE__) ) . '/custom-login-styles.css" />';
	echo '<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>';
	echo '<script type="text/javascript" src="' . getThemeDirUrl( dirname(__FILE__) ) . '/login-scripts.js"></script>';
	echo '<script type="text/javascript" src="' . getThemeDirUrl( dirname(__FILE__) ) . '/materialize.min.js"></script>';
}
add_action('login_head', 'my_custom_login');
