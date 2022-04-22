<?php

/**
 * Single post template files
 * 
 * @package Home-Repair-and-Maintenance
 */
    get_header();
?>


<div class="container">
    <div class="row mt-3 ">
        
        <div class="col-lg-8 col-md-8 col-sm-12">
            <?php
                if( have_posts() ):
                    if(is_home() && ! is_front_page()){
                        ?>
                        <div class="col-lg-12 mb-5">
                            <h1 class="page-title"><?php single_post_title() ?></h1>
                        </div>
                        <?php
                    }
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content');
                    endwhile;
                else:
                    get_template_part('template-parts/content-none'); 
                endif;
                posts_nav_link();
            ?>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
                <?php get_sidebar(); ?>
        </div>
        
        <div class="col-lg-6 col-md-6 col-sm-6 text-center mb-4">
            <?php
            previous_post_link();
            ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 text-center mb-4">
            <?php
                next_post_link();
            ?>
        </div>
    </div>
</div>

    
<?php 
    get_footer();

