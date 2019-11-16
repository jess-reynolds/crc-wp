<?php
/**
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */
    
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php');

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php');

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php');

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php');

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php');

require_once(get_template_directory().'/custom-fields.php');
require_once(get_template_directory().'/settings.php');
require_once(get_template_directory().'/account-tabs.php');
require_once(get_template_directory().'/member-area-tab.php');
require_once(get_template_directory().'/woocommerce-tabs.php');

add_action('init', 'register_footer_menu');
function register_footer_menu()
{
    register_nav_menu('footer-menu', __('Footer Menu'));
}

add_action('init', 'register_social_menu');
function register_social_menu()
{
    register_nav_menu('social-menu', __('Social Menu'));
}

add_action('init', 'register_header_menu');
function register_header_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}

function load_news_ajax_handler()
{
    $args = json_decode(stripslashes($_POST['query']), true);
    $args['paged'] = $_POST['page'] + 1;
 
    query_posts($args);
 
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('parts/page', 'box');
        }
    }
    die;
}
  
add_action('wp_ajax_loadmore', 'load_news_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'load_news_ajax_handler');


function create_sponsor_post_type()
{
    register_post_type(
        'sponsor',
        array(
        'labels' => array(
          'name' => __('Sponsors'),
          'singular_name' => __('Sponsor')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail'),
      )
    );
}

add_action('init', 'create_sponsor_post_type');

function my_myme_types($mime_types)
{
    $mime_types['gpx'] = 'application/gpx+xml';
    $mime_types['tcx'] = 'application/tcx+xml';
    return $mime_types;
}

add_filter('upload_mimes', 'my_myme_types', 1, 1);

/*
 * Add 'data' for based64 enconcoded images for wp_allowed_protocols()
 * With this, Jetpack Lazy Images will not strip out "data" in the "src" attribute https://github.com/Automattic/jetpack/blob/6.8/modules/lazy-images/lazy-images.php/#L166
 */

add_filter( 'kses_allowed_protocols', 'htdat_kses_allowed_protocols', 10, 1 );
               
function htdat_kses_allowed_protocols( $protocols ) {
  $protocols[] = 'data';
  return $protocols;
}