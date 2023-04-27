<?php

/*https://stackoverflow.com/questions/3947979/fatal-error-call-to-undefined-function-add-action*/
/*require(dirname(__FILE__) . '/wp-load.php');*/

/*** Child Theme Function  ***/

/*if ( ! function_exists( 'conall_edge_child_theme_enqueue_scripts' ) ) {*/
	function conall_edge_child_theme_enqueue_scripts() {
		$parent_style = 'conall-edge-default-style';
		
		wp_enqueue_style( 'conall-edge-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'conall_edge_child_theme_enqueue_scripts' );
/*}*/