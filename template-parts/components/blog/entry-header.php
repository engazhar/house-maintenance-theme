<?php

/**
 * Template for post entry header
 * 
 * @package Home-Repair-and-Maintenance
 */
$post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail( $post_id );
?>
 <header class="entry-header">
    <?php
        if($has_post_thumbnail){
            ?>
                <div class="entry-image">
                <a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark">
                    <?php the_post_custom_thumbnail(
                        $post_id,
                        'featured-large',
                        [
                            'sizes' => '(max-width: 590px) 590px, 425px',
                            'class' => 'attachment featured-image img-thumbnail'
                        ]
                    ); ?>
                </a>
                </div>
            <?php
        }
    ?>
 </header>