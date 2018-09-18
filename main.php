<?php
/*
Plugin Name: Marvel Toolkit
Plugin URI: http://wordpress.org/plugins/marvel/
Description: This is not just a plugin, This plugin for marvel theme.
Author: spytoever
Version: 1.0
Author URI: http://imranhoshain.com/
Text Domain: marvel
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'ELEMENTOR_marvel__FILE__', __FILE__ );

/**
 * Load marvel Toolkit
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function marvel_load() {
	// Load localization file
	load_plugin_textdomain( 'marvel-toolkit' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'marvel_fail_load' );
		return;
	}

	// Check required version
	$elementor_version_required = '1.8.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'marvel_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'marvel_load' );


//Add Elementor Widget Categories
function marvel_elementor_widget_categories( $elements_manager ) {
    
	$elements_manager->add_category(
		'marvel',
		[
			'title' => __( 'Marvel Category', 'marvel-toolkit' ),
			'icon' => 'fa fa-plug',
		]
	);	

}
add_action( 'elementor/elements/categories_registered', 'marvel_elementor_widget_categories' );

function marvel_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Elementor marvel Toolkit is not working because you are using an old version of Elementor.', 'marvel-toolkit' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'marvel-toolkit' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}



//Plugin Css And JS
function marvel_toolkit_include_files() {    
    wp_enqueue_style('marvel-toolkit', plugins_url( '/assets/css/marvel-toolkit.css', __FILE__ ) );   
}
add_action( 'wp_enqueue_scripts','marvel_toolkit_include_files');

// If your string has a custom filter, add its tag name in an applicable add_filter function
add_filter( 'widget_text', 'do_shortcode' ); //For WP old version


/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/custom-post.php');

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/heading-shortcode.php');

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/about-box-shortcode.php');

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/who-we-are-shortcode.php');

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/feature-box-shortcode.php');
