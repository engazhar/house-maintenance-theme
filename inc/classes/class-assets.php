<?php
/**
 * Enqueue theme assets.
 *
 * @package  Home-Repair-and-Maintenance
 */

namespace HRAM_THEME\Inc;
use HRAM_THEME\Inc\Traits\Singleton;

class Assets{
    use Singleton;
    
    protected function __construct() {

        //load classes
        $this->setup_hooks();
    }
    protected function setup_hooks(){


        // Actions
        add_action('wp_enqueue_scripts', [$this, 'register_style']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_style(){
        // Register Styles
        wp_register_style('theme-style-sheet', get_stylesheet_uri(), [], filemtime(HRAM_DIR_PATH . '/style.css'), 'all');
        wp_register_style('bootstrap-style-sheet', HRAM_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

         // Enqueue Styles
        wp_enqueue_style('theme-style-sheet');
        wp_enqueue_style('bootstrap-style-sheet');
    }

    public function register_scripts(){
        // Register Scripts
        wp_register_script('theme-main', HRAM_DIR_URI . '/assets/main.js', ['jquery'], filemtime(HRAM_DIR_PATH . '//assets/main.js'), true);
        wp_register_script('bootstrap-jquery', HRAM_DIR_URI . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true);
        
        // Enqueue Scripts
        wp_enqueue_script('theme-main');
        wp_enqueue_script('bootstrap-jquery');
    }
}