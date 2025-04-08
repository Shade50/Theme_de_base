<?php
/**
 * Fonctions du thème Theme_de_base
 */

// Chargement des scripts et styles
function theme_de_base_enqueue_assets() {
  wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_de_base_enqueue_assets');

// Mise à jour personnalisée du thème (sécurisée)
add_filter('site_transient_update_themes', 'pulsecrea_theme_update');
function pulsecrea_theme_update($transient) {
  if (empty($transient->checked)) return $transient;

  $theme_slug = 'Theme_de_base';
  $update_url = 'https://devtheme.pulsecrea.fr/MAJ/Theme_de_base/update.json';

  $response = wp_remote_get($update_url, ['timeout' => 10]);
  if (is_wp_error($response)) return $transient;

  $body = wp_remote_retrieve_body($response);
  $data = json_decode($body);
  if (!$data || empty($data->version)) return $transient;

  $local_version = wp_get_theme($theme_slug)->get('Version');

  if (version_compare($local_version, $data->version, '<')) {
    $transient->response[$theme_slug] = [
      'theme'       => $theme_slug,
      'new_version' => $data->version,
      'url'         => $data->changelog_url ?? $update_url,
      'package'     => $data->download_url ?? '',
    ];
  }

  return $transient;
}

// Enregistrement du menu WordPress
function register_my_menu() {
  register_nav_menu('header-menu', 'Menu principal');
}
add_action('after_setup_theme', 'register_my_menu');

// Import sécurisé des fichiers supplémentaires
if (defined('ABSPATH')) {
  $carousel_file = get_template_directory() . '/includes/customizer-carousel.php';
  require_once get_template_directory() . '/includes/changelog.php';

  if (file_exists($carousel_file)) {
    require_once $carousel_file;
  }

  if (file_exists($changelog_file)) {
    require_once $changelog_file;
  }
}
