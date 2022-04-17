<?php

/**
 * Main template files
 * 
 * @package Home-Repair-and-Maintenance
 */
    get_header();
?>


<div class="container">
    <div class="row mt-3">
        <?php
            if( have_posts() ){
                if(is_home() && ! is_front_page()){
                    ?>
                    <div class="col-md-12">
                        <h1 class="page-title"><?php single_post_title() ?></h1>
                    </div>
                    <?php
                }
                while (have_posts()) : the_post();
                ?>
                    <div class="col-md-4">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <?php the_excerpt(); ?>
                    </div>
                <?php
                endwhile;
            }
        ?>
    </div>
</div>

    
<?php 
    get_footer();

