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
        wp_die('hello');

        //load classes
        $this->set_hooks();
    }
    protected function set_hooks(){
        // filters and actions
    }
    public function register_style(){
        // filters and actions
    }
    public function register_scripts(){
        // filters and actions
    }
}