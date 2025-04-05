<?php
// Chargement des styles et scripts
function pulsecrea_enqueue_assets()
{
    wp_enqueue_style('pulsecrea-style', get_stylesheet_uri());
    // Exemple pour charger un JS dans assets/js/main.js
    // wp_enqueue_script('pulsecrea-script', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'pulsecrea_enqueue_assets');

// Déclaration du menu principal
function pulsecrea_register_menus()
{
    register_nav_menus(array(
        'main_menu' => 'Menu principal'
    ));
}
add_action('after_setup_theme', 'pulsecrea_register_menus');
