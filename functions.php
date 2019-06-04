<?php

/*==================================================
=            Define Template Directory             =
==================================================*/

if( !defined('TMPL_DIR')):
	define('TMPL_DIR' , get_template_directory() );
endif;

if( !defined('TMPL_DIR_URI')):
	define('TMPL_DIR_URI' , get_template_directory_uri() );
endif;


/*===================================
=            THEME SETUP            =
===================================*/

include TMPL_DIR . '/inc/functions.php';  //Inclide RM Functions in inc/functions.php (must be included before anything else)

// Nav Walker 
if(file_exists(TMPL_DIR . '/inc/walkers/walkerpagecustom.php')):
	include TMPL_DIR . '/inc/walkers/walkerpagecustom.php';
endif;


function __themesetup(){
	add_theme_support('post-thumbnails'); // Add thumbnail functionality
}

add_action( 'after_setup_theme', '__themesetup' , 2 );

/*==================================
=            Theme CSS             =
==================================*/

function __themecss(){
	// wp_register_style( 'flickity' , TMPL_DIR_URI . '/js/libs/flickity.css');
	wp_register_style( 'owl' , TMPL_DIR_URI . '/js/libs/owl-carousel/assets/owl.carousel.css');
	wp_register_style( 'fancybox' , TMPL_DIR_URI . '/js/libs/fancybox3/jquery.fancybox.css');
	wp_register_style( 'fontawesome' , TMPL_DIR_URI . '/fonts/fontawesome5/css/all.css' );
	// wp_register_style( 'twenty' , TMPL_DIR_URI . '/js/libs/twentytwenty-master/css/twentytwenty.css' );

	wp_register_style( 'rm-theme' , get_stylesheet_uri() , array('fancybox' , 'fontawesome', 'owl') , '1' );

	wp_enqueue_style( 'rm-theme' );

}
add_action('wp_enqueue_scripts','__themecss');


/*=========================================
=            Theme Javascripts            =
=========================================*/

function __themejs(){
	global $wp_scripts;

	// Deregister 
	wp_deregister_script('jquery'); // Disable jquery loaded by WordPress 
	wp_deregister_script( 'wp-embed' ); // Disable wp-embed.js   

	// Required
	wp_register_script('jquery', "https" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js", false, "3.3.1", true);
	wp_register_script( 'modernizr', TMPL_DIR_URI . '/js/libs/modernizr.min.js', false, '2.8.3', false );
	// Optional
	wp_register_script('rm-cookie', TMPL_DIR_URI . '/js/libs/jquery.cookie.min.js', array('jquery','modernizr'), '1.0', true );
	wp_register_script('rm-blazy', TMPL_DIR_URI . '/js/libs/blazy/blazy.js', array('jquery','modernizr'), '1.0', true );
	wp_register_script('rm-blazy-polyfill', TMPL_DIR_URI . '/js/libs/blazy/polyfills/closest.js', array('jquery','modernizr'), '1.0', true );
	wp_register_script('rm-fancybox', TMPL_DIR_URI . '/js/libs/fancybox3/jquery.fancybox.min.js', array('jquery','modernizr'), '1.0', true );
	// wp_register_script('rm-flickity', TMPL_DIR_URI . '/js/libs/flickity.pkgd.min.js', array('jquery','modernizr'), '1.0', true );
	
	// wp_register_script('rm-match', TMPL_DIR_URI . '/js/libs/match-height/jquery.matchHeight-min.js', array('jquery','modernizr'), '1.0', true );

	// wp_register_script('rm-isotope', TMPL_DIR_URI . '/js/libs/isotope.pkgd.js', array('jquery','modernizr'), '1.0', true );
	// wp_register_script( 'rm_loaded', TMPL_DIR_URI . '/js/libs/imagesLoaded.min.js', array('jquery'), '1', true );
		

	wp_register_script('rm-owl', TMPL_DIR_URI . '/js/libs/owl-carousel/owl.carousel.min.js', array('jquery','modernizr'), '1.0', true );
	wp_register_script('rm-parallax', TMPL_DIR_URI . '/js/libs/parallax/jquery.parallax.js', array('jquery','modernizr'), '1.0', true );
	wp_register_script('rm-waypoints', TMPL_DIR_URI . '/js/libs/parallax/jquery.waypoints.min.js', array('jquery','modernizr'), '1.0', true );
	// wp_register_script('rm-search', TMPL_DIR_URI . '/js/libs/hideseek/jquery.hideseek.min.js', array('jquery','modernizr'), '1.0', true );

	wp_register_script('rm-wow', TMPL_DIR_URI . '/js/libs/wow/wow.min.js', array('jquery','modernizr'), '1.0', true );
	// wp_register_script('rm-harvey', TMPL_DIR_URI . '/js/libs/harvey.min.js', array('jquery','modernizr'), '1.0', true );

	// twentytwenty  slide show
	// wp_register_script('rm-twenty', TMPL_DIR_URI . '/js/libs/twentytwenty-master/js/jquery.twentytwenty.js', array('jquery','modernizr'), '1.0', true );
	// wp_register_script('rm-move', TMPL_DIR_URI . '/js/libs/twentytwenty-master/js/jquery.event.move.js', array('jquery','modernizr'), '1.0', true );


	//RM Scripts
	wp_register_script('rm-menu', TMPL_DIR_URI . '/js/rm-menu.js', array('jquery','modernizr'), '1.0', true );
	wp_register_script('theme-js', TMPL_DIR_URI . '/js/scripts.js', array('jquery','modernizr'), '1.0', true );


	$data_array = rm_data_array();
	wp_localize_script( $handle = 'theme-js', $object_name = 'rm_data', $l10n = $data_array ); //found in rm-functions.php
	wp_enqueue_script( 'rm_js_data' );

	//Enqueue All Scripts

	//Enqueue Required
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'rm_modernizr');
	//Enqueue Optional
	wp_enqueue_script( 'rm-cookie');
	wp_enqueue_script( 'rm-blazy');
	wp_enqueue_script( 'rm-blazy-polyfill');
	wp_enqueue_script( 'rm-fancybox');
	// wp_enqueue_script( 'rm-match');
	// wp_enqueue_script( 'rm-isotope');
	wp_enqueue_script( 'rm-owl');
	// wp_enqueue_script( 'rm-flickity');
	wp_enqueue_script( 'rm-parallax');
	wp_enqueue_script( 'rm-waypoints');
	// wp_enqueue_script( 'rm-search');
	wp_enqueue_script( 'rm-wow');
	// wp_enqueue_script( 'rm-twenty');
	// wp_enqueue_script( 'rm-move');
	// wp_enqueue_script( 'rm-harvey');
	//Enqueue RM Scripts
	wp_enqueue_script( 'rm-menu');
	// wp_enqueue_script( 'rm-maps');
	

	wp_enqueue_script( 'theme-js');
}

add_action('wp_enqueue_scripts','__themejs');



/*============================================================
=            INLINE JS, ACTIVATE AFTER GOING LIVE            =
============================================================*/

// add_filter('removefromurl/protocol' , function($url = ''){
// 	$url = preg_replace('(^https?://)', '', $url ); // removes protocol
// 	return $url;
// },10,1);
// add_filter('removefromurl/query' , function($url = ''){
// 	$url = preg_replace('/\?.*/', '', $url); //removes query
// 	return $url;
// },10,1);
// add_filter('removefromurl/www' , function($url = ''){
// 	$url = preg_replace('/www./i' , '' , $url ); // removes 'www.' from url
// 	return $url;
// },10,1);
// add_filter('removefromurl/protocol-www' , function($url = ''){
// 	$url = preg_replace('(^https?://)', '', $url ); // removes protocol
// 	$url = preg_replace('/www./i' , '' , $url ); // removes www
// 	return $url;
// },10,1);
// add_filter('removefromurl/protocol-www-query' , function($url = ''){
// 	$url = preg_replace('(^https?://)', '', $url ); // removes protocol
// 	$url = preg_replace('/www./i' , '' , $url ); // removes wwww
// 	$url = preg_replace('/\?.*/', '', $url); //removes query
// 	return $url;
// },10,1);
// add_filter('script_loader_tag' , function( $tag , $handle , $src ){
// 	global $wp_version;
// 	if($wp_version >= '4.1.0'):
// 		if(!preg_match('/<!--/i' , $tag )):
// 				$homeurl  = apply_filters('removefromurl/protocol-www' , home_url() );
// 				$cleansrc = apply_filters('removefromurl/protocol-www-query' , $src );
// 				$regexurl = preg_replace('/\//i' , '\/' , $homeurl );
// 				if(preg_match("/$regexurl/" , $cleansrc )):
// 					$cleansrc = preg_replace("/$regexurl/" , '' , $cleansrc );
// 					$filepath = rtrim(ABSPATH , '/') .'/'. ltrim($cleansrc , '/');
// 					if(file_exists($filepath)):
// 						/*
// 							rm_cookie , rm_scripts
// 						*/
// 						if(in_array( $handle , array('theme-js'))):
// 							$filecontents = file_get_contents($filepath);
// 							$newtag = "<script class=\"inlinejs_{$handle}\">{$filecontents}</script>";
// 							return $newtag;
// 						endif;

// 					endif;
// 				endif;
// 			return $tag;
// 		endif;
// 	endif;
// 	return $tag;
// }, 100 , 3);



/*========================================================================
=            Inline CSS Function - Activate After Going Live             =
========================================================================*/


// add_filter('inline/css' , function($tag = null ,$handle = null ,$src = null){

// 	$newtag = '';
// 	if($_SERVER['HTTP_HOST'] != 'rosemontdev.com'):
// 		/*
// 			RUN ONLY ON LIVE (not dev)
// 		*/

// 		$templatepath = get_template_directory_uri();
// 		if(in_array($handle , array('rm-theme' , 'fancybox' , 'owl' , 'fontawesome')))://list the styles you want to target
// 			$templatepath2 = preg_replace('/https?:\/\//i' , '' , $templatepath);
// 			$src2 = preg_replace('/https?:\/\/|\?(.*)/i','',$src);
// 			$src2 = str_replace("$templatepath2", '' , $src2 );
// 			$newtag = miniCSS::file( $src2 , array('echo'=>false));
// 		endif;

// 	endif;
// 	if(!empty($newtag)): return $newtag; endif;
// 	return $tag;
// },1,3);


/*======================================================================================
=            Defer Modernir Load for Site Speed  - Activate for Site Speed             =
======================================================================================*/

// add_filter('script_loader_tag', 'add_defer_attribute', 11, 2);
// function add_defer_attribute($tag, $handle) {
//     if ( 'modernizr' !== $handle )
//         return $tag;
//     return str_replace( ' src', ' defer="defer" src', $tag );
// }



/*======================================================================
=            Theme Options Page for Advanced Custom Fields             =
======================================================================*/

$siteName = get_bloginfo('name') . ' Settings';

if( function_exists('acf_add_options_page') ) {

	$page = acf_add_options_page(array(
		'page_title' 	=> $siteName,
		'menu_title' 	=> $siteName,
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false,
		'icon_url' => 'dashicons-admin-customizer'
	));

}


/*===========================================
=            Inline SVG Function            =
===========================================*/

function inline_svg($name) {
  $file = get_template_directory();
  $file .= "/images/svg/" . $name . ".svg";
  include($file);
}


/*==================================================
=            Is Page or Parent Function            =
==================================================*/

function is_tree($pid) {
	global $post;
	if(is_page()&&($post->post_parent==$pid||is_page($pid)))
		return true;
	else
		return false;
};


/*=============================================
=            Custom Excerpt Length            =
=============================================*/

function my_excerpt($excerpt_length = 55, $id = false, $echo = true) {

    $text = '';

	  if($id) {
	  	$the_post = & get_post( $my_id = $id );
	  	$text = ($the_post->post_excerpt) ? $the_post->post_excerpt : $the_post->post_content;
	  } else {
	  	global $post;
	  	$text = ($post->post_excerpt) ? $post->post_excerpt : get_the_content('');
    }

		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
	  $text = strip_tags($text);

		$excerpt_more = '[...]';
		$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $excerpt_length ) {
			array_pop($words);
			$text = implode(' ', $words);
			$text = $text . $excerpt_more;
		} else {
			$text = implode(' ', $words);
		}
	if($echo)
  echo apply_filters('the_content', $text);
	else
	return $text;
}

function get_my_excerpt($excerpt_length = 55, $id = false, $echo = false) {
 return my_excerpt($excerpt_length, $id, $echo);
}


/*=========================================
=            Sitemap ShortCode            =
=========================================*/

// use like [sitemap omit="1051,432"]

function sitemap_function( $atts ){
ob_start();  ?>

  <ul>
  <?php wp_list_pages(
    array(
     'title_li' => '',
     'exclude' => $atts['omit'],
     'depth' => $atts['depth']
   ) ); ?>
  </ul>
<?php
$sitemap = ob_get_clean();
return $sitemap;
}

add_shortcode( 'sitemap', 'sitemap_function' );



/*===================================================================================
=            Displays navigation to next/previous pages when applicable.            =
===================================================================================*/

if ( ! function_exists( 'mishas_happenstance_content_nav' ) ) {
	function mishas_happenstance_content_nav( $html_id ) {
		global $wp_query;
		$html_id = esc_attr( $html_id );
		if ( $wp_query->max_num_pages > 1 ) : ?>
			<div id="<?php echo $html_id; ?>" class="navigation" role="navigation">
				<div class="navigation-inner">
					<!-- <h2 class="navigation-headline section-heading"><?php //_e( 'Post navigation', 'happenstance' ); ?></h2> -->
					<div class="nav-wrapper">
						<p class="navigation-links">
							<?php $big = 999999999;
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'prev_text' => __( '&larr; Previous', 'happenstance' ),
								'next_text' => __( 'Next &rarr;', 'happenstance' ),
								'total' => $wp_query->max_num_pages,
								'add_args' => false
							) );
							?>
						</p>
					</div>
				</div>
			</div>
		<?php endif;
	}
}


/*==================================================================
=            Navigation Mobile 2nd itemp Duplication            =
==================================================================*/



function custom_start_el( $item_output, $item, $depth, $args ) {

	if ( $args->menu_id == 'menu-main' && in_array( 'menu-item-has-children', $item->classes ) ) {
		$item_output = $item_output .'<div class="nav-dropdown-button"><div class="nav-expander"><span></span><span></span></div></div>';
	}

	return $item_output;

}
add_filter( 'walker_nav_menu_start_el', 'custom_start_el', 10, 4 );

add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2 );

function my_wp_nav_menu_objects( $items, $args ) {

// loop
	foreach( $items as &$item ) {

	// vars
		$duplicate = get_field('duplicate', $item);

	// append duplicate
		if ( !empty( $duplicate ) ) {
			$item->classes[]	= 'duplicate-item';
		}
	}
// return
	return $items;
}




/*==========================================================
=            Disable the WordPress Core Emoji's            =
==========================================================*/

function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}

add_action( 'init', 'disable_emojis' );


