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
        }else{
            custom_post_excerpt();
            post_excerpt_more();
        }
    ?>
</div>