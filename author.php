<?php get_header(); ?>
    <div class="main-container author">
        <div class="main wrapper clearfix">
            <h1>les articles de: <?php the_author(); ?></h1>
            <?php get_template_part('loop', 'excerpt'); ?>
            <aside>
                <?php get_sidebar(); ?>
            </aside>
        </div> <!-- #main -->
    </div> <!-- #main-container -->
<?php get_footer(); ?>