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


function post_posted_by() {
	$byline = sprintf(
		esc_html_x( ' by %s', 'post author', 'house-repair' ),
		'<span class="author vcard"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline text-secondary">' . $byline . '</span>';
}


function post_posted_date(){
    $year                        = get_the_date( 'Y' );
	$month                       = get_the_date( 'n' );
	$day                         = get_the_date( 'j' );
	$post_date_archive_permalink = get_day_link( $year, $month, $day );

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	// Post is modified to Update ( when post published date is not equal to post modified time )
	if ( get_the_date() === get_the_modified_date() ) {
		$time_string = '<time class="updated" datetime="%1$s">%2$s</time>';
        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_attr( get_the_date() ),
	    );
        $update_or_post = 'Posted';
	}else{
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        $time_string = sprintf( $time_string,
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_attr( get_the_modified_date() )
        );
        $update_or_post = 'Updated'; 
    }
    $posted_on = sprintf(
        esc_html_x( $update_or_post.' on: %s', 'post date', 'house-repair' ),
        '<a href="' . esc_url( $post_date_archive_permalink ) . '" rel="bookmark">' . $time_string . '</a>'
    );

	echo '<span class="posted-on text-secondary">' . $posted_on . '</span>';
}

function custom_post_excerpt( $trim_char_count = 0 ){
    if( !has_excerpt() || $trim_char_count === 0){
        the_excerpt();
        return;
    }
    $excerpt = wp_strip_all_tags(get_the_excerpt());
    $excerpt = substr($excerpt, 0, $trim_char_count);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

    echo $excerpt . "..."; 
}

function post_excerpt_more( $more='' ){
    if( ! is_single()){
        $more = sprintf('<a class="mt-4 btn btn-info" href="%1$s">%2$s</a>',
            get_the_permalink(get_the_ID()),
            __('Read more', 'house-repair')
        );
    }
    echo $more;
}