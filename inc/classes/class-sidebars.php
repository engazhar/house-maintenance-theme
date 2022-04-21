<?php
/**
 * Theme Side Bars Template.
 *
 * @package  Home-Repair-and-Maintenance
 */

namespace HRAM_THEME\Inc;
use HRAM_THEME\Inc\Traits\Singleton;

class SideBars{
    use Singleton;
    
    protected function __construct() {

        //load classes
        $this->setup_hooks();
    }
    protected function setup_hooks(){


        // Actions
        add_action('widgets_init', [$this, 'register_sidebars']);
    }
}