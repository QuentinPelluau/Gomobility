<?php if(have_posts()): ?>
<article>
    <?php while(have_posts()): the_post(); ?>
        <section>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p><?php the_excerpt(); ?></p>
        </section>
    <?php endwhile; ?>
</article>
<?php else: ?>
<p>Désolé pas d'article pour l'instant...</p>
<?php endif; ?>