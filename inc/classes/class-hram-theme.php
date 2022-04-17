<?php
/**
 * Bootstraps the Theme.
 *
 * @package  Home-Repair-and-Maintenance
 */

namespace HRAM_THEME\Inc;
use HRAM_THEME\Inc\Traits\Singleton;

class HRAM_THEME {
    use Singleton;

    protected function __construct() {

        //Autoload classes
        Assets::get_instance();
        Menus::get_instance();

        $this->setup_hooks();
    }
    protected function setup_hooks(){

        //Hooks

        // Actions
        add_action('after_setup_theme', [$this, 'setup_theme']);

    }
    public function setup_theme(){
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo', [
            'header-text'          => ['site-title', 'site-description'],
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => true, 
        ] );
        add_theme_support( 'custom-background', [
            'default-color' => '#fff',
            'default-image' => ''
        ] );
        add_theme_support( 'post-thumbnails', ['post', 'page']);
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 
            'html5', 
            [
                'comment-list', 
                'comment-form', 
                'search-form', 
                'gallery', 
                'caption', 
                'style', 
                'script'
            ]
        );
        add_editor_style();
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');

        global $content_width;
        if( ! isset($content_width)){
            $content_width = 1240;
        }
    }

}