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
function elevar_javascript_footer() {
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
function hotjar_javascript() {
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
function hubspot_javascript() {
    ?>
        <!-- Start of HubSpot Embed Code -->
        <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/24308407.js"></script>
        <!-- End of HubSpot Embed Code -->
        <?php
    }
add_action('wp_head', 'hubspot_javascript');

add_filter('body_class', 'custom_class');
function custom_class($classes) {
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
    if (is_page('elevar-events') || is_page('elevar-events-2') || is_page('generic-events-page')) {
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
function marker_io_asco2024() {
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

/*
 * Function for Post Duplication
 */
function elevar_duplicate_post_as_draft() {
  global $wpdb;
  if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'elevar_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
    wp_die('No Post Selected to Duplicate!');
  }

  /*
   * Nonce verification
   */
  if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
    return;

  /*
   * get the original post id
   */
  $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
  /*
   * and all the original post data then
   */
  $post = get_post( $post_id );

  /*
   * if you don't want current user to be the new post author,
   * then change next couple of lines to this: $new_post_author = $post->post_author;
   */
  $current_user = wp_get_current_user();
  $new_post_author = $current_user->ID;

  /*
   * if post data exists, create the post duplicate
   */
  if (isset( $post ) && $post != null) {

    /*
     * new post data array
     */
    $args = array(
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => $new_post_author,
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title,
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    );

    /*
     * insert the post by wp_insert_post() function
     */
    $new_post_id = wp_insert_post( $args );

    /*
     * get all current post terms ad set them to the new post draft
     */
    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
    foreach ($taxonomies as $taxonomy) {
      $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
      wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }

    /*
     * duplicate all post meta just in two SQL queries
     */
    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
    if (count($post_meta_infos)!=0) {
      $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
      foreach ($post_meta_infos as $meta_info) {
        $meta_key = $meta_info->meta_key;
        if( $meta_key == '_wp_old_slug' ) continue;
        $meta_value = addslashes($meta_info->meta_value);
        $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
      }
      $sql_query.= implode(" UNION ALL ", $sql_query_sel);
      $wpdb->query($sql_query);
    }
    /*
     * finally, redirect to the edit post screen for the new draft
     */
    wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
    exit;
  } else {
    wp_die('Post creation failed, could not find original post: ' . $post_id);
  }
}
add_action( 'admin_action_elevar_duplicate_post_as_draft', 'elevar_duplicate_post_as_draft' );
function elevar_duplicate_post_link( $actions, $post ) {
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=elevar_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this Post" rel="permalink">Duplicate Post</a>';
  }
  return $actions;
}
add_filter( 'post_row_actions', 'elevar_duplicate_post_link', 10, 2 );


/*
 * Function for Page Duplication
 */
function elevar_duplicate_page_as_draft() {
    global $wpdb;
    if (!(isset($_GET['post']) || isset($_POST['post'])  || (isset($_REQUEST['action']) && 'elevar_duplicate_page_as_draft' == $_REQUEST['action']))) {
        wp_die('No Page Selected to Duplicate!');
    }

    /*
   * Nonce verification
   */
    if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__)))
        return;

    /*
   * get the original page id
   */
    $page_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));
    /*
   * and all the original page data then
   */
    $page = get_post($page_id);

    /*
   * if you don't want current user to be the new page author,
   * then change next couple of lines to this: $new_page_author = $page->page_author;
   */
    $current_user = wp_get_current_user();
    $new_page_author = $current_user->ID;

    /*
   * if page data exists, create the page duplicate
   */
    if (isset($page) && $page != null) {

        /*
     * new page data array
     */
        $args = array(
            'comment_status' => $page->comment_status,
            'ping_status'    => $page->ping_status,
            'post_author'    => $new_page_author,
            'post_content'   => $page->post_content,
            'post_excerpt'   => $page->post_excerpt,
            'post_name'      => $page->post_name,
            'post_parent'    => $page->post_parent,
            'post_password'  => $page->post_password,
            'post_status'    => 'draft',
            'post_title'     => $page->post_title,
            'post_type'      => $page->post_type,
            'to_ping'        => $page->to_ping,
            'menu_order'     => $page->menu_order
        );

        /*
     * insert the page by wp_insert_post() function
     */
        $new_page_id = wp_insert_post($args);

        /*
     * get all current page terms ad set them to the new page draft
     */
        $taxonomies = get_object_taxonomies($page->post_type); // returns array of taxonomy names for page type, ex array("category", "page_tag");
        foreach ($taxonomies as $taxonomy) {
            $page_terms = wp_get_object_terms($page_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_page_id, $page_terms, $taxonomy, false);
        }

        /*
     * duplicate all page meta just in two SQL queries
     */
        $page_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$page_id");
        if (count($page_meta_infos) != 0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($page_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if ($meta_key == '_wp_old_slug') continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[] = "SELECT $new_page_id, '$meta_key', '$meta_value'";
            }
            $sql_query .= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }
        /*
     * finally, redirect to the edit page screen for the new draft
     */
        wp_redirect(admin_url('post.php?action=edit&post=' . $new_page_id));
        exit;
    } else {
        wp_die('Page creation failed, could not find original page: ' . $page_id);
    }
}
add_action('admin_action_elevar_duplicate_page_as_draft', 'elevar_duplicate_page_as_draft');
function elevar_duplicate_page_link($actions, $page) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=elevar_duplicate_page_as_draft&post=' . $page->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Duplicate this Page" rel="permalink">Duplicate Page</a>';
    }
    return $actions;
}
add_filter('page_row_actions', 'elevar_duplicate_page_link', 10, 2);
