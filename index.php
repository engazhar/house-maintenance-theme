<?php

/**
 * Main template files
 * 
 * @package Home-Repair-and-Maintenance
 */
    get_header();
?>


<div class="container">
    <div class="row mt-3 d-flex flex-row justify-content-center align-items-center">
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
                ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                       <?php get_template_part('template-parts/content'); ?>
                    </div>
                <?php
                endwhile;
            else:
                get_template_part('template-parts/content-none'); 
            endif;
        ?>
    </div>
    <div class="d-flex flex-row justify-content-center align-items-center">
     <?php pagination_bar(); ?>
    </div>
</div>

    
<?php 
    get_footer();

