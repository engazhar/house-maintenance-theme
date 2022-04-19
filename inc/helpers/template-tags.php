<?php
/**
 * Template tags
 * 
 * @package Home-Repair-and-Maintenance
 */

 function get_the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = []){
    $custom_thumbnail = "";
    if($post_id === null){
        $post_id = get_the_ID();
    }

    if(has_post_thumbnail($post_id)){
        $default_attributes = [
            'loading' => 'lazy'
        ];
        $attributes = array_merge($additional_attributes, $default_attributes);
        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id($post_id),
            $size,
            false,
            $attributes
        );
    }
    return $custom_thumbnail;
 }

 function the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = []){
     echo get_the_post_custom_thumbnail($post_id, $size, $additional_attributes);
 }

function max_post_title_length( $title ) {
    $max = 35;
    if( strlen( $title ) > $max ) {
        return substr( $title, 0, $max ). " &hellip;";
    } else {
        return $title;
    }
}