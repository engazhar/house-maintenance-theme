<?php
/**
 * Footer Template
 * @package Home-Repair-and-Maintenance
 */
?>

<div id="site-footer" class="container">
    <footer>
        <h3>Footer</h3>
        <?php
            if(is_active_sidebar('sidebar-2')){
                ?>
                    <aside class="row" id="secondaary" role="complementary">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    </aside>
                <?php
            }
         ?>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>