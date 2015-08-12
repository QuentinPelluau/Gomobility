<?php
wp_nav_menu([
    'theme_location' => 'sidebar',
    'menu_class' => 'nav-sidebar'
]);

if( is_active_sidebar('al_widget_sidebar')) :

    dynamic_sidebar('al_widget_sidebar');

endif;
