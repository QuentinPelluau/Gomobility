<?php if(have_posts()): ?>
<article>
    <?php while(have_posts()): the_post(); ?>
        <section>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </section>
    <?php endwhile; ?>
</article>
<?php else: ?>
<p>Désolé pas d'article pour l'instant...</p>
<?php endif; ?>