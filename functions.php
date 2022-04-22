<?php

/**
 * Theme Functions
 * @package Home-Repair-and-Maintenance
 */

if(!defined('HRAM_DIR_PATH')){
    define('HRAM_DIR_PATH', untrailingslashit(get_template_directory()));
}
if(!defined('HRAM_DIR_URI')){
    define('HRAM_DIR_URI', untrailingslashit(get_template_directory_uri()));
}
if(!defined('HRAM_BUILD_URI')){
    define('HRAM_BUILD_URI', untrailingslashit(get_template_directory_uri().'/assets/build'));
}
if(!defined('HRAM_BUILD_JS_URI')){
    define('HRAM_BUILD_JS_URI', untrailingslashit(get_template_directory_uri().'/assets/build/js'));
}
if(!defined('HRAM_BUILD_JS_DIR_PATH')){
    define('HRAM_BUILD_JS_DIR_PATH', untrailingslashit(get_template_directory().'/assets/build/js'));
}
if(!defined('HRAM_BUILD_IMG_URI')){
    define('HRAM_BUILD_IMG_URI', untrailingslashit(get_template_directory_uri().'/assets/build/src/img'));
}
if(!defined('HRAM_BUILD_CSS_URI')){
    define('HRAM_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri().'/assets/build/css'));
}
if(!defined('HRAM_BUILD_CSS_DIR_PATH')){
    define('HRAM_BUILD_CSS_DIR_PATH', untrailingslashit(get_template_directory().'/assets/build/css'));
}




require_once HRAM_DIR_PATH. '/inc/helpers/autoloader.php';
require_once HRAM_DIR_PATH. '/inc/helpers/template-tags.php';
function hram_get_theme_instance(){
    \HRAM_THEME\Inc\HRAM_THEME::get_instance();
}
hram_get_theme_instance();

?>

