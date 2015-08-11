<?php get_header(); ?>
<div class="main-container tag">
    <div class="main wrapper clearfix">
        <h1>Mot clef: <?php single_tag_title(); ?></h1>
        <?php get_template_part('loop', 'excerpt'); ?>
        <aside>
            <?php get_sidebar(); ?>
        </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>