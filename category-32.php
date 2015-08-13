<?php get_header(); ?>
<div class="main-container">
    <div class="main wrapper clearfix">
        <?php get_template_part('loop', 'attachment'); ?>
        <aside>
            <?php get_sidebar(); ?>
        </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>
