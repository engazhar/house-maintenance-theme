<?php
/**
 * Theme Side Bars Template.
 *
 * @package  Home-Repair-and-Maintenance
 */

namespace HRAM_THEME\Inc;
use HRAM_THEME\Inc\Traits\Singleton;
use HRAM_THEME\Inc\SocialIcons;

class SideBars{
    use Singleton;
    
    protected function __construct() {

        //load classes
        $this->setup_hooks();
    }
    protected function setup_hooks(){


        // Actions
        add_action('widgets_init', [$this, 'register_sidebars']);
        //add_action('widgets_init', [$this, 'register_social_widget']);
    }

    public function register_sidebars(){
        register_sidebar( [
            'name'          => __( 'Sidebar', 'house-repair' ),
            'id'            => 'sidebar-1',
            'description' => __( 'Main Sidebar', 'house-repair' ),
            'before_widget' => '<div id="%1$s" class="widget sidebar %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
         ] );
        register_sidebar( [
            'name'          => __( 'Footer', 'house-repair' ),
            'id'            => 'sidebar-2',
            'description' => __( 'Footer Sidebar', 'house-repair' ),
            'before_widget' => '<div id="%1$s" class="col-md-3 widget footer-sidebar %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] );
    }

    public function register_social_widget(){
        register_widget( '\HRAM_THEME\Inc\Social_Widget' );
    }
}