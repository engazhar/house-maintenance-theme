<?php

/**
 * Content None template
 * 
 * @package Home-Repair-and-Maintenance
 */
?>
<section class="no-result not-found">
    <div class="container">
        <div class="alert alert-secondary" role="alert">
            <h4><?php esc_html_e('Nothing Found', 'house-repair') ?></h4>
        </div>
        <div class="content" role="content">
            <?php

                if(is_home() && current_user_can('publish_posts')){
                    ?>
                    <p>
                        <?php printf(
                            wp_kses(
                                __('Ready to publish your first post? <a href="%s">Get Started Here<a>', 'house-repair'), [
                                    'a' => [
                                        'href' => []
                                    ]
                                ]
                            ),
                            esc_url(admin_url( 'post-new.php' ))
                        ); ?>
                    </p>
                    <?php
                }elseif (is_search()){
                    ?>
                        <h5><?php esc_html_e('Nothing match to your search item.', 'house-repair') ?></h5>
                    <?php
                        get_search_form();
                }else{
                    ?>
                        <h5><?php esc_html_e('It seems that we cannot find what you are looking for. Perhaps serach can help:', 'house-repair') ?></h5>
                    <?php
                        get_search_form();
                }

            ?>
        </div>
    </div>
</section>