<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

define('LC_THEME_DIR', WP_CONTENT_DIR . '/themes/lc-iology');
require_once LC_THEME_DIR . '/inc/lc-theme.php';


/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts()
{
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles()
{
    // Get the theme data.
    $the_theme = wp_get_theme();

    $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    // Grab asset urls.
    $theme_styles  = "/css/child-theme{$suffix}.css";
    $theme_scripts = "/js/child-theme{$suffix}.js";

    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get('Version'));
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.1.min.js', array(), '3.6.1', true);
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get('Version'), true);

    wp_enqueue_script('slick-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), '1.8.1', true);

    // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    // 	wp_enqueue_script( 'comment-reply' );
    // }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain()
{
    load_child_theme_textdomain('lc-iology', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version($current_mod)
{
    return 'bootstrap5';
}
add_filter('theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20);



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js()
{
    wp_enqueue_script(
        'understrap_child_customizer',
        get_stylesheet_directory_uri() . '/js/customizer-controls.js',
        array( 'customize-preview' ),
        '20130508',
        true
    );
}
add_action('customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js');


add_filter('cli_show_cookie_bar_only_on_selected_pages', 'webtoffee_custom_selected_pages', 10, 2);

function webtoffee_custom_selected_pages($html, $slug)
{
    global $post;

    // Check if the current page is using a specific template
    if (is_page_template('landing-page.php')) {
        $slug_array = array('review');
        if (in_array($slug, $slug_array)) {
            $html = '';
        }
    }

    return $html;
}

add_action('wp_enqueue_scripts', 'wt_cli_disable_gdpr_js_and_css', 999);

function wt_cli_disable_gdpr_js_and_css()
{
    global $post;

    if(class_exists('Cookie_Law_Info')) {
        $slug_array = array('review');
        $slug = $post->post_name;
        if (in_array($slug, $slug_array)) {
            wp_dequeue_style('cookie-law-info');
            wp_dequeue_style('cookie-law-info-gdpr');
            wp_dequeue_script('cookie-law-info');
        }
    }
}
