<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Enqueue scripts and styles for the back end.
 */
function capital_theme_admin_scripts() {
    
        global $wp_version;
    
        // Load our admin stylesheet.
	wp_enqueue_style( 'capital_theme-admin-style', get_template_directory_uri() . '/css/admin-style.css' );
        
        // Load our admin script.
	wp_enqueue_script( 'capital_theme-admin-script', get_template_directory_uri() . '/js/admin-script.js' );

        //localize script
        $newui = $wp_version >= '3.5' ? '1' : '0'; //check wp version for showing media uploader
        wp_localize_script( 'capital_theme-admin-script', 'capital_themeADMIN', array(
                                                                        'new_media_ui'	=>  $newui,
                                                                    ));
        wp_enqueue_media();
}

/**
 * Enqueue scripts and styles for the front end.
 */
function capital_theme_public_scripts() {

	// Load our public style stylesheet.
	wp_enqueue_style( 'capital_theme-public-style', get_template_directory_uri() . '/css/public-style.css', array(), NULL );

	// Load our main stylesheet.
	wp_enqueue_style( 'capital_theme-style', get_stylesheet_uri(), array(), NULL );
	
        // Load main jquery
        wp_enqueue_script( 'jquery', array(), NULL );
        
        // Load public script
	wp_enqueue_script( 'capital_theme-public-script', get_template_directory_uri() . '/js/public-script.js', array(), NULL );

	/*Disable block editor scripts for block and woocommerce block*/
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    //wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
}

//add action to load scripts and styles for the back end
add_action( 'admin_enqueue_scripts', 'capital_theme_admin_scripts' );

//add action load scripts and styles for the front end
add_action( 'wp_enqueue_scripts', 'capital_theme_public_scripts' );

//Disable Wordpress emojis and entra js and css
add_action( 'init', 'capital_theme_disable_emojis' );

function capital_theme_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
?>