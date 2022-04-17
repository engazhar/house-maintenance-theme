<?php

/**
 * Content template
 * 
 * @package Home-Repair-and-Maintenance
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('mb-3')?>>
    <?php
        get_template_part( 'template-parts/components/blog/entry-header' );
        get_template_part( 'template-parts/components/blog/entry-meta' );
        get_template_part( 'template-parts/components/blog/entry-content' );
        get_template_part( 'template-parts/components/blog/entry-footer' );
    ?>
</article>
