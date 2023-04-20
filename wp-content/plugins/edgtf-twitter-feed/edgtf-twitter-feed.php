<?php
/*
Plugin Name: Edgef Twitter Feed
Description: Plugin that adds Twitter feed functionality to our theme
Author: Edge Themes
Version: 1.0.3
*/
define('EDGEF_TWITTER_FEED_VERSION', '1.0.3');

include_once 'load.php';

if ( ! function_exists( 'conall_twitter_feed_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function conall_twitter_feed_text_domain() {
		load_plugin_textdomain( 'edgtf-twitter-feed', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'conall_twitter_feed_text_domain' );
}