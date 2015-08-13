<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <article class="clearfix">
            <h1><?php the_title(); ?></h1>
            <?php
            $args = [
                'post_type'   => 'attachment',
                'numberposts' => -1, // tous <=> -1
                'post_parent' => $post->ID, // associé à notre article pour les images uploadé la première fois, voir parent_id dans la table posts
            ];

            $attachments = get_posts($args); // API SQL WP

            if ($attachments) {
                echo '<ul class="attachment">';
                foreach ($attachments as $attachment) {
                    echo '<li><a href="'.wp_get_attachment_url($attachment->ID).'">';
                    echo wp_get_attachment_image($attachment->ID, 'thumbnail');
                    echo '</a></li>';
                    echo '<span class="attachment__title">' . $attachment->post_title . '
                    </span>';
                }
                echo '</ul>';
            }
            ?>
        </article>
    <?php endwhile; ?>
<?php else: ?>
    <p>désolé aucun contenu pour l'instant</p>
<?php endif; ?>