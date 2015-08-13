<?php
wp_nav_menu([
    'theme_location' => 'sidebar',
    'menu_class' => 'nav-sidebar'
]);
?>

<p><a href="<?php echo get_post_type_archive_link('portfolio'); ?>">[archive] Tous mes portfolios</a></p>

<?php
if( is_active_sidebar('al_widget_sidebar')) :

    dynamic_sidebar('al_widget_sidebar');

endif;
