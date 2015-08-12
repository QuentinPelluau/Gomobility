<?php if(have_posts()): ?>
<article>
    <?php while(have_posts()): the_post(); ?>
        <section>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <?php if (has_post_thumbnail()): ?>
               <a href="<?php the_permalink(); ?>" ><?php the_post_thumbnail('thumbnail', ['class' => 'img-thumbnail pull-left',]); ?></a>
            <?php endif; ?>
            <p><?php the_excerpt(); ?></p>
            <?php the_category(); ?>
            <?php the_tags('<ul class="tags" >mot(s) clef(s):<li>','</li><li>','</li></ul>'); ?>
            <?php the_author_posts_link(); ?>
        </section>
    <?php endwhile; ?>
</article>
<?php else: ?>
<p>Désolé pas d'article pour l'instant...</p>
<?php endif; ?>