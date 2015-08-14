<?php get_header('portfolio'); ?>
<div class="main-container">
    <div class="main wrapper clearfix">
        <?php if (have_posts()): ?>
            <article>
                <?php while (have_posts()): the_post(); ?>
                    <section>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <?php if (has_post_thumbnail()): ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', ['class' => 'portfolio__img-thumbnail portfolio__pull-left',]); ?>
                            </a>
                        <?php endif; ?>
                        <p><?php the_excerpt(); ?></p>
                        <?php $meta = get_post_meta($post->ID, '_al_portfolio_meta', true);
                        if (!empty($meta['subtitle']))
                            echo '<h2>type: ' . $meta['subtitle'] . '</h2>';
                        ?>
                    </section>
                <?php endwhile; ?>
            </article>
        <?php else: ?>
            <p>Désolé pas de portfolio pour l'instant...</p>
        <?php endif; ?>
    </div>
    <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>

