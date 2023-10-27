<?php

/*https://stackoverflow.com/questions/3947979/fatal-error-call-to-undefined-function-add-action*/
/*require(dirname(__FILE__) . '/wp-load.php');*/

/*** Elevar/Conall Child-Theme Functions  ***/

// DH Pop-up to page head
function conall_edge_child_theme_enqueue_scripts()
{
    $parent_style = 'conall-edge-default-style';

    wp_enqueue_style('conall-edge-child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}
add_action('wp_enqueue_scripts', 'conall_edge_child_theme_enqueue_scripts');

// Register & Enqueue all CSS & JS
function elevar_assets()
{
    wp_register_style('elevar-stylesheet', get_theme_file_uri() . '/dist/css/bundle.css', array(), '1.0.0', 'all');
    wp_enqueue_style('elevar-stylesheet');
    wp_enqueue_script('elevar_js', get_theme_file_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('custom_js', get_stylesheet_directory_uri() . '/elevar-scripts.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'elevar_assets', 99);

// DH Pop-up to page head
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

// Prevent WP from adding <p> tags on all post types
/* remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
 */
// Add HotJar script to page head
function hotjar_javascript()
{
?>
    <!-- Hotjar Tracking Code for https://elevartherapeutics.com/ -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 3469432,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
<?php
}
add_action('wp_head', 'hotjar_javascript');

// Add HubSpot script to page head
function hubspot_javascript()
{
?>
    <!-- Start of HubSpot Embed Code -->
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/24308407.js"></script>
    <!-- End of HubSpot Embed Code -->
    <?php
}
add_action('wp_head', 'hubspot_javascript');