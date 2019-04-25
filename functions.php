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

require_once(get_template_directory().'/account-tabs.php');

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
