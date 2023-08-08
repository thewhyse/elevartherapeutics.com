<?php

/*https://stackoverflow.com/questions/3947979/fatal-error-call-to-undefined-function-add-action*/
/*require(dirname(__FILE__) . '/wp-load.php');*/

/*** Child Theme Function  ***/

/*if ( ! function_exists( 'conall_edge_child_theme_enqueue_scripts' ) ) {*/
function conall_edge_child_theme_enqueue_scripts()
{
    $parent_style = 'conall-edge-default-style';

    wp_enqueue_style('conall-edge-child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}

add_action('wp_enqueue_scripts', 'conall_edge_child_theme_enqueue_scripts');
/*}*/

function elevar_assets()
{
    wp_register_style('elevar-stylesheet', get_theme_file_uri() . '/dist/css/bundle.css', array(), '1.0.0', 'all');
    wp_enqueue_style('elevar-stylesheet');
    wp_enqueue_script('elevar_js', get_theme_file_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'elevar_assets');

function elevar_javascript_footer()
{
?>
    <script>
        function set_check() {
            var popid = document.querySelector('div.dh-popup.vc_non_responsive').id;
            console.log(popid);
            if (popid == 'dh_popup_17354') {
                console.log('checked 17354');
                Cookies.set('dh_popup_1_17354', 'show');
            } else if (popid == 'dh_popup_17327') {
                console.log('checked 17327');
                Cookies.set('dh_popup_1_17327', 'show');
            } else if (popid == 'dh_popup_17359') {
                console.log('checked 17359');
                Cookies.set('dh_popup_1_17359', 'show');
            } else if (popid == 'dh_popup_17331') {
                console.log('checked 17331');
                Cookies.set('dh_popup_2_17331', 'show');
            } else if (popid == 'dh_popup_17357') {
                console.log('checked 17357');
                Cookies.set('dh_popup_2_17357', 'show');
            } else if (popid == 'dh_popup_17363') {
                console.log('checked 17363');
                Cookies.set('dh_popup_2_17363', 'show');
            } else {
                console.log('no popups found');
            }
        }
    </script>
<?php
}
add_action('wp_footer', 'elevar_javascript_footer');
