<?php


/**
 * Example functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Example
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

function example_theme_setup()
{

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'main-menu' => esc_html__('Main Menu', 'example-theme'),

        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'example_theme_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );


    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );


// This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'main-menu' => esc_html__('Main Menu', 'example-theme'),

        )
    );
}

add_action('after_setup_theme', 'example_theme_setup');

function fn_name()
{
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'fn_name');

/**
 * Enqueue scripts and styles.
 */
function example_theme_scripts()
{
    wp_enqueue_style('example-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('example-theme-style', 'rtl', 'replace');

    wp_enqueue_script('example-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    // Load js bundle.
    $main_asset = include(get_template_directory() . '/assets/js/main.asset.php');

    wp_enqueue_script( 'example-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true );

    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/slick/slick.min.js');
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/slick/slick.css');


    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');

    global $wp_query;

}
add_action('wp_enqueue_scripts', 'example_theme_scripts');

/* Remove WP version */
function remove_version_info()
{
    return '';
}

add_filter('the_generator', 'remove_version_info');

/* Remove version for scripts and styles */
function remove_wp_version_strings($src)
{
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if (!empty($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

add_filter('script_loader_src', 'remove_wp_version_strings');


// VIEWS
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);
function posts_column_views($defaults)
{
    $defaults['post_views'] = __('Views');
    return $defaults;
}

function posts_custom_column_views($column_name, $id)
{
    if ($column_name === 'post_views') {
        echo getPostViews(get_the_ID());
    }
}


