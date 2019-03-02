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

add_filter('wp_nav_menu_items', 'your_custom_menu_item', 10, 2);
function your_custom_menu_item($items, $args)
{
    if ($args->theme_location == 'header-menu') {
        return '<li class="menu-item"><a href="/"><img title="Home" src="' . get_bloginfo('template_url') . '/assets/images/icon-club.png" /></a></li>' . $items;
    }
    return $items;
}
