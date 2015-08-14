<?php if (have_posts()): ?>
    <article class="post">
        <?php while (have_posts()): the_post(); ?>
            <section <?php echo (is_sticky()) ? 'class="post__sticky"' : ''; ?> >
                <h1><?php echo (has_post_format('video')) ? '<span class="post__video">[video]</span>' : ''; ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail', ['class' => 'post__img-thumbnail post__pull-left',]); ?>
                    </a>
                <?php endif; ?>
                <p><?php the_excerpt(); ?></p>
                <?php the_category(); ?>
                <?php the_tags('<ul class="post__tag" >mot(s) clef(s):<li>', '</li><li>', '</li></ul>'); ?>
                <?php the_terms($post->ID, 'country', '<ul class="post__tax" >pays:<li>', '</li><li>', '</li></ul>'); ?>
                <?php the_terms($post->ID, 'genre', '<ul class="post__tax" >pays:<li>', '</li><li>', '</li></ul>'); ?>
                <?php the_author_posts_link(); ?>
            </section>
        <?php endwhile; ?>
    </article>
<?php else: ?>
    <p>Désolé pas d'article pour l'instant...</p>
<?php endif; ?>