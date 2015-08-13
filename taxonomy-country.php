<?php get_header(); ?>
<div class="main-container">
    <h1>[taxonomy template]<?php single_cat_title(); ?></h1>

    <div class="main wrapper clearfix">
        <?php get_template_part('loop', 'excerpt'); ?>
        <aside>
            <?php get_sidebar(); ?>
        </aside>
    </div>
    <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>
