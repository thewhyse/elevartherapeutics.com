<?php
/*
Plugin Name: Edgef Instagram Feed
Description: Plugin that adds Instagram feed functionality to our theme
Author: Edge Themes
Version: 2.0.1
*/
define('EDGEF_INSTAGRAM_FEED_VERSION', '2.0.1');

include_once 'load.php';

if ( ! function_exists( 'conall_instagram_feed_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function conall_instagram_feed_text_domain() {
		load_plugin_textdomain( 'edgtf-instagram-feed', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'conall_instagram_feed_text_domain' );
}