<?php

add_filter('manage_post_posts_columns', 'al_add_post_columns');

function al_add_post_columns($columns)
{
    unset($columns['tags']);
    $newColumns = [];

    foreach ($columns as $name => $label) {

        if ($name == 'author') {
            $newColumns['thumbnail'] = 'Miniature';
        }

        if ($name == 'comments') {
            $newColumns['country'] = 'pays';
        }
        $newColumns[$name] = $label;
    }

    return $newColumns;
}

add_action('manage_post_posts_custom_column', 'al_add_post_column', 10, 2);

function al_add_post_column($column, $postId)
{
    if (has_post_thumbnail($postId) && $column == 'thumbnail') {
        the_post_thumbnail('thumbnail-column');
    }

    if ($column == 'country') {
        $terms = get_the_terms($postId, $column);

        if ($terms && !is_wp_error($terms)) {

            $termsNames = [];
            foreach ($terms as $term) {
                $termsNames[] = sprintf('<a href="edit.php?%s=%s">%s</a>', $column, $term->name, $term->name);
            }

            echo implode(", ", $termsNames);
        }
    }
}


add_filter('manage_portfolio_posts_columns', 'al_add_portfolio_columns');

function al_add_portfolio_columns($columns)
{
    unset($columns['tags']);
    $newColumns = [];

    foreach ($columns as $name => $label) {

        if ($name == 'author') {
            $newColumns['thumbnail'] = 'Miniature';
        }

        if ($name == 'comments') {
            $newColumns['country'] = 'pays';
        }
        $newColumns[$name] = $label;
    }

    return $newColumns;
}

add_action('manage_portfolio_posts_custom_column', 'al_add_portfolio_column', 10, 2);

function al_add_portfolio_column($column, $postId)
{
    if (has_post_thumbnail($postId) && $column == 'thumbnail') {
        the_post_thumbnail('thumbnail-column');
    }

    if ($column == 'country') {
        $terms = get_the_terms($postId, $column);

        if ($terms && !is_wp_error($terms)) {

            $termsNames = [];
            foreach ($terms as $term) {
                $termsNames[] = sprintf('<a href="edit.php?%s=%s">%s</a>', $column, $term->name, $term->name);
            }

            echo implode(", ", $termsNames);
        }
    }
}
