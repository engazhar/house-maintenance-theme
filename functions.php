<?php

/**
 * Theme Functions
 * @package Home-Repair-and-Maintenance
 */

function hram_enqueue_scripts(){
    wp_enqueue_style('theme-style-sheet', get_stylesheet_uri(), [], filemtime(get_template_directory().'/syle.css'), 'all');
    wp_enqueue_script('theme-main-js', get_template_directory_uri().'/assets/main.js', [], filemtime(get_template_directory().'/syle.css'), 'all');
}
add_action('wp_enqueue_scripts', 'hram_enqueue_scripts');

?>

