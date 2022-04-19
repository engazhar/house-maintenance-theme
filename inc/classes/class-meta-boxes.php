<?php
/**
 * Register Metaboxes Class.
 *
 * @package  Home-Repair-and-Maintenance
 */

namespace HRAM_THEME\Inc;
use HRAM_THEME\Inc\Traits\Singleton;

class Meta_Boxes{
    use Singleton;
    
    protected function __construct() {

        //load classes
        $this->setup_hooks();
    }
    protected function setup_hooks(){


        // Actions
        add_action( 'add_meta_boxes', [$this, 'add_custom_meta_box'] );
        add_action( 'save_post', [$this, 'save_post_meta_data'] );
    }

    public function add_custom_meta_box($post) {
        $screens = [ 'post'];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'hide-page-title',                 // Unique ID
                __('Hide Page Title', 'house-repair'),      // Box title
                [$this, 'custom_meta_box_html'],  // Content callback, must be of type callable
                $screen,                          // Post type
                'side'
            );
        }
    }
    
    public function custom_meta_box_html($post){
        $value = get_post_meta( $post->ID, '_hide_page_title', true );
        wp_nonce_field(plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name');

        ?>
        <label for="hram_hide_title_field"><?php esc_html_e('Hide the Page Title', 'house-repair') ?></label>
        <select name="hram_hide_title_field" id="hram-hide-title-field" class="postbox">
            <option value=""><?php esc_html_e('Select', 'house-repair') ?></option>
            <option value="yes" <?php selected( $value, 'yes' ); ?>>
                <?php esc_html_e('Yes', 'house-repair') ?>
            </option>
            <option value="no" <?php selected( $value, 'no' ); ?>>
                <?php esc_html_e('No', 'house-repair') ?>
            </option>
        </select>
        <?php
    }

    public function save_post_meta_data( $post_id ){

        if( ! current_user_can('edit_post', $post_id)){
            return;
        }
        if( ! isset($_POST['hide_title_meta_box_nonce_name'] ) || ! wp_verify_nonce($_POST['hide_title_meta_box_nonce_name'], plugin_basename(__FILE__)) ){
            return;
        }
        if ( array_key_exists( 'hram_hide_title_field', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['hram_hide_title_field']
            );
        }
    }

    
}