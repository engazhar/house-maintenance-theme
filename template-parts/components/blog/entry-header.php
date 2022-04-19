<?php

/**
 * Template for post entry header
 * 
 * @package Home-Repair-and-Maintenance
 */

$post_id = get_the_ID();
$hide_title = get_post_meta( $post_id, '_hide_page_title', true );
$heading_class = ! empty($hide_title) && 'yes' === $hide_title ? 'd-none' : '';
$has_post_thumbnail = get_the_post_thumbnail( $post_id );
?>
 <header class="entry-header">
    <?php
        if($has_post_thumbnail){
            ?>
                <div class="entry-image mb-3">
                    <?php
                        if( is_single() || is_page()){
                            the_post_custom_thumbnail(
                                $post_id,
                                'featured-thumbnail',
                                [
                                    'sizes' => '(max-width: 350px) 350px, 233px',
                                    'class' => 'attachment post-single-image img-thumbnail'
                                ]
                            ); 
                    ?>
                        
                        <?php
                        }else{
                           ?>
                           <a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark">
                            <?php the_post_custom_thumbnail(
                                $post_id,
                                'featured-thumbnail',
                                [
                                    'sizes' => '(max-width: 350px) 350px, 233px',
                                    'class' => 'attachment post-featured-thumbnail img-thumbnail'
                                ]
                            ); ?>
                        </a>
                           <?php
                        }
                    ?>
                </div>
                <div class="entry-title mb-3">
                    <?php
                        if( is_single() || is_page()){
                            printf(
                                '<h1 class="text-dark page-title %1$s">%2$s</h1>', 
                                esc_attr($heading_class),
                                wp_kses_post(get_the_title())
                            );
                        }else{
                            $post_title = max_post_title_length(get_the_title());
                            printf(
                                '<h5 class="page-title"><a href="%1$s">%2$s</a></h5>', 
                                esc_url(get_the_permalink()),
                                wp_kses_post($post_title)
                            );
                        }
                    ?>
                </div>
            <?php
        }
    ?>
 </header>