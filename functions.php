<?php

/**
 * Theme Functions
 * @package Home-Repair-and-Maintenance
 */

if(!defined('HRAM_DIR_PATH')){
    define('HRAM_DIR_PATH', untrailingslashit(get_template_directory()));
}

require_once HRAM_DIR_PATH. '/inc/helpers/autoloader.php';

function hram_get_theme_instance(){
    \HRAM_THEME\Inc\HRAM_THEME::get_instance();
}
hram_get_theme_instance();
function hram_enqueue_scripts(){
    // Register Styles
    wp_register_style('theme-style-sheet', get_stylesheet_uri(), [], filemtime(HRAM_DIR_PATH . '/style.css'), 'all');
    wp_register_style('bootstrap-style-sheet', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

    // Register Scripts
    wp_register_script('theme-main', get_template_directory_uri() . '/assets/main.js', [], filemtime(HRAM_DIR_PATH . '//assets/main.js'), true);
    wp_register_script('bootstrap-jquery', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true);

    // Enqueue Styles
    wp_enqueue_style('theme-style-sheet');
    wp_enqueue_style('bootstrap-style-sheet');

    // Enqueue Scripts
    wp_enqueue_script('theme-main');
    wp_enqueue_script('bootstrap-jquery');
}
add_action('wp_enqueue_scripts', 'hram_enqueue_scripts');

?>

