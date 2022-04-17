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



require_once HRAM_DIR_PATH. '/inc/helpers/autoloader.php';
require_once HRAM_DIR_PATH. '/inc/helpers/template-tags.php';
function hram_get_theme_instance(){
    \HRAM_THEME\Inc\HRAM_THEME::get_instance();
}
hram_get_theme_instance();

?>

