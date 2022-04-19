<?php
/**
 * Template for post entry content
 * 
 * To be used inside the Wordpress The Loop.
 * 
 * @package Home-Repair-and-Maintenance
 */
?>
<div class="entry-content">
    <?php 
        if(is_single())
        {
            the_content(
                sprintf(
                    wp_kses(
                        __(' Continue Reading %s <span class="meta-arrow-right"> &rarr </span>', 'house-repair' ), 
                        [
                            'span' => [
                                'class' => []
                            ]
                        ],

                    ),the_title( '<span class="screen-reader-text">', '</span>', false )

                ),
            );
            wp_link_pages( [
                'before' => '<div class="page-links">'.esc_html__('Pages:', 'house-repair' ).'</div>',
                'after' => '</div>',
            ] );
        }else{
            custom_post_excerpt();
            post_excerpt_more();
        }

        
    ?>
</div>