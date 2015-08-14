<?php

add_action('add_meta_boxes', 'al_add_meta_portfolio');


function al_add_meta_portfolio()
{
    // protfolio => custom post type, normal et high position dans l'affichage
    add_meta_box('al-metaportfolio', '[Label] Portfolio', 'al_fields_portfolio', 'portfolio', 'normal', 'high');
}

function al_fields_portfolio($post)
{
    $meta_portfolio = get_post_meta($post->ID, '_al_portfolio_meta', true);

    $subtitle = (!empty($meta_portfolio['subtitle'])) ? $meta_portfolio['subtitle'] : '';
    $description = (!empty($meta_portfolio['description'])) ? $meta_portfolio['description'] : '';


    wp_nonce_field('al_meta_portfolio_nonce', 'al_meta_portfolio_field'); // token wordpress
    ?>
    <p>Sous-titre: <input type="text" name="al_portfolio_subtitle" value="<?php echo esc_attr($subtitle)?>"></p>
    <h2>Description</h2>
    <textarea name="al_portfolio_description" id="" cols="30" rows="10"><?php echo esc_attr($description)?></textarea>
<?php
}

add_action('save_post', 'al_meta_portfolio_save');


function al_meta_portfolio_save($post_ID)
{
    if (!wp_verify_nonce($_POST['al_meta_portfolio_field'], 'al_meta_portfolio_nonce'))
        return;

    if (!current_user_can('edit_post'))
        return;

    // on fait rien si auto save
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!empty($_POST['al_portfolio_subtitle']) && !empty($_POST['al_portfolio_description'])) {
        $subtitle = sanitize_text_field($_POST['al_portfolio_subtitle']);
        $description = sanitize_text_field($_POST['al_portfolio_description']);

        update_post_meta($post_ID, '_al_portfolio_meta', [
            'subtitle'    => $subtitle,
            'description' => $description
        ]);
    }
}