<?php
/*
 * @author: Antoine
 * @tags: @tests @scripts @filter @theme
 */

/* ------------------------------------------------- *\
    @tests
\* ------------------------------------------------- */

//function al_test_hook( $post_ID ) {
//
//    die("publication d'un article ($post_ID)... ");
//}
//add_action( 'publish_post', 'al_test_hook' );

/* ------------------------------------------------- *\
    @scripts
\* ------------------------------------------------- */

add_action('wp_enqueue_scripts', 'al_setup_script');

function al_setup_script()
{

    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.min.css');
    // si le css dépends de normalize on le précise dans l'argument 3 :
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', ['normalize']);

    if (is_category(22))
        wp_enqueue_style('bike', get_template_directory_uri() . '/css/bike-elec.css');


    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js');

    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', ['jquery'], false, true);
}

/* ------------------------------------------------- *\
    @filter
\* ------------------------------------------------- */

add_filter('excerpt_more', 'al_read_more');

function al_read_more($more)
{
    global $post; // le post dans la boucle objet

//    var_dump($post);  // objet dans la boucle de WP

    return '<p><a href="' . get_permalink($post->ID) . '" >lire la suite</a></p>';
}

/* ------------------------------------------------- *\
    @theme  options dans le CMS
\* ------------------------------------------------- */

add_action('after_setup_theme', 'al_setup_theme');

function al_setup_theme()
{
    register_nav_menus([
        'main' => 'Mon menu principal',
        'footer' => 'Mon menu footer',
    ]);
}