<?php

add_action('init', 'al_create_genre_tax');

function al_create_genre_tax()
{
    $labels = [
        'name'          => 'genre',
        'singular_name' => 'genre',
        'search_items'  => 'rechercher un genre',
        'all_items'     => 'tous les genre',
        'edit_item'     => 'éditer un genre',
        'update_item'   => 'mettre à jour un genre',
        'add_new_item'  => 'ajouter un genre',
        'menu_name'     => 'Genre'
    ];

    register_taxonomy('genre', ['post'], [
        'hierarchical' => true,
        'public'       => true, // afficher dans l'admin...
        'labels'       => $labels,
        'show_ui'      => true,
        'query_var'    => true,
        'rewrite'      => ['slug' => 'genre']
    ]);
}