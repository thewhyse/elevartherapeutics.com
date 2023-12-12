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

add_filter('body_class', 'custom_class');
function custom_class($classes)
{
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    if (is_page('partnering')) {
        $classes[] = 'partner-page';
    }
    if (is_page('mission-values')) {
        $classes[] = 'missionvalues-page';
    }
    if (is_page('elevar-leadership')) {
        $classes[] = 'leadership-page';
    }
    if (is_page('elevar-board-of-directors')) {
        $classes[] = 'bod-page';
    }
    if (is_page('camrelizumab')) {
        $classes[] = 'cam-page';
    }
    if (is_page('rivoceranib-apatinib-elevar')) {
        $classes[] = 'rivo-page';
    }
    if (is_page('elevar-expanded-access-program')) {
        $classes[] = 'exaccessprogram-page';
    }
    if (is_page('news')) {
        $classes[] = 'news-page';
    }
    if (is_page('elevar-publications')) {
        $classes[] = 'publications-page';
    }
    if (is_page('elevar-events') || is_page('elevar-events-2') || is_page('esmo-2023-backup')) {
        $classes[] = 'events-page';
    }
    if (is_page('investors')) {
        $classes[] = 'investors-page';
    }
    if (is_page('elevar-careers')) {
        $classes[] = 'careers-page';
    }
    if (is_page('contact-elevar')) {
        $classes[] = 'contact-page';
    }
    if (is_page('privacy-policy')) {
        $classes[] = 'privacypolicy-page';
    }
    if (is_page('european-privacy-notice')) {
        $classes[] = 'europeanprivacy-page';
    }
    if (is_page('cookie-policy')) {
        $classes[] = 'cookiepolicy-page';
    }
    if (is_page('aacr-2018')) {
        $classes[] = 'aacr2018-page';
    }
    if (is_page('aacr2023')) {
        $classes[] = 'aacr2023-page';
    }
    if (is_page('accp-2017')) {
        $classes[] = 'accp2017-page';
    }
    if (is_page('asco-2017')) {
        $classes[] = 'asco2017-page';
    }
    if (is_page('asco-2020')) {
        $classes[] = 'asco2020-page';
    }
    if (is_page('asco-2022')) {
        $classes[] = 'asco2022-page';
    }
    if (is_page('asco-sitc-2019')) {
        $classes[] = 'ascositc2019-page';
    }
    if (is_page('esmo-2016')) {
        $classes[] = 'esmo2016-page';
    }
    if (is_page('gynecological-oncology-2020')) {
        $classes[] = 'gyno-oncology-page';
    }
    if (is_page('maintenance-page')) {
        $classes[] = 'maintenance-page';
    }
    return $classes;
}

// Add marker.io script to page head
function marker_io_asco2024()
{
    if (is_page('elevar-events')) {
    ?>
        <script>
            window.markerConfig = {
                project: '6578ebe4661f67f7e53274cb',
                source: 'snippet'
            };

            ! function(e, r, a) {
                if (!e.__Marker) {
                    e.__Marker = {};
                    var t = [],
                        n = {
                            __cs: t
                        };
                    ["show", "hide", "isVisible", "capture", "cancelCapture", "unload", "reload", "isExtensionInstalled", "setReporter", "setCustomData", "on", "off"].forEach(function(e) {
                        n[e] = function() {
                            var r = Array.prototype.slice.call(arguments);
                            r.unshift(e), t.push(r)
                        }
                    }), e.Marker = n;
                    var s = r.createElement("script");
                    s.async = 1, s.src = "https://edge.marker.io/latest/shim.js";
                    var i = r.getElementsByTagName("script")[0];
                    i.parentNode.insertBefore(s, i)
                }
            }(window, document);
        </script>
    <?php
    }
}
add_action('wp_head', 'marker_io_asco2024');