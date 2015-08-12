<?php get_header(); ?>
<div class="main-container">
    <div class="main wrapper clearfix">
        <h1><?php single_post_title();?></h1>
        <?php get_template_part('loop'); ?>
        <aside>
            <?php get_sidebar(); ?>
        </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>
