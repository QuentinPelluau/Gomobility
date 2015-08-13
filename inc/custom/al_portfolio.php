<?php

add_action('init', 'al_create_portfolio_custom');

function  al_create_portfolio_custom()
{
    $labels = [
        'name'          => 'portfolios',
        'singular_name' => 'portfolios',
        'search_items'  => 'rechercher un portfolio',
        'all_items'     => 'tous les portfolios',
        'edit_item'     => 'éditer un portfolio',
        'update_item'   => 'mettre à jour un portfolio',
        'add_new_item'  => 'ajouter un portfolio',
        'menu_name'     => 'Portfolio',
        'view' => 'voir',
        'not_found' => 'aucune portfolios trouvé',
        'not_found_in_trash' => 'aucune portfolio trouvé dans la poubelle',
    ];

    register_post_type('portfolio', [
        'labels' => $labels,
        'public' => true,
        'show_in_menu' => true, // tools bar
        'show_in_nav_menus',
        'exclude_from_search' => false, //
        'rewrite' => true,
        'has_archive' => 'portfolios',
        //'menu_icon' => get_template_directory_uri() . '/images/py.png',
        'menu_position' => 5,
        'supports' => ['title', 'excerpt', 'thumbnail']
    ]);
}