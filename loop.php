<?php if (have_posts()): ?>
    <article>
        <?php while (have_posts()): the_post(); ?>
            <section>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <p><?php the_content(); ?></p>
                <?php the_category(); ?>
                <?php the_author_posts_link(); ?>
            </section>
        <?php endwhile; ?>
    </article>
<?php else: ?>
    <p>Désolé pas d'article pour l'instant...</p>
<?php endif; ?>