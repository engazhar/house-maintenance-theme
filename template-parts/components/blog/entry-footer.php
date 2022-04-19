<?php
/**
 * Template for post entry footer
 * 
 * To be used inside the Wordpress The Loop.
 * 
 * @package Home-Repair-and-Maintenance
 */
$article_id = get_the_ID();
$article_terms = wp_get_post_terms($article_id, ['category', 'post_tag']);
if( empty($article_terms) || ! is_array($article_terms)){
    return;
}

?>


<div class="entry-footer mt-4">
    <p class='mb-2 fw-bold'><?php echo esc_html__('Tags & Categories:', 'house-repair') ?></p>
    <?php
        foreach($article_terms as $key => $article_term){
            ?>
            <a href="<?php echo esc_url(get_term_link($article_term)); ?>" class="btn border mb-2 mr-2 btn-blog-tags">
                <?php echo esc_html($article_term->name); ?>
            </a>
            <?php
        }
    ?>
</div>