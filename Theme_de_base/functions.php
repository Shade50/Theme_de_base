<?php
/**
 * Fonctions du thème Theme_de_base
 */

// Chargement des styles
function theme_de_base_enqueue_assets() {
  wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_de_base_enqueue_assets');

// 🔄 Mise à jour personnalisée du thème
add_filter('site_transient_update_themes', 'pulsecrea_theme_update');
function pulsecrea_theme_update($transient) {
  if (empty($transient->checked)) return $transient;

  $theme_slug = 'Theme_de_base';
  $update_url = 'https://devtheme.pulsecrea.fr/MAJ/Theme_de_base/update.json';

  $response = wp_remote_get($update_url, ['timeout' => 10]);
  if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
    return $transient;
  }

  $data = json_decode(wp_remote_retrieve_body($response));
  $local_version = wp_get_theme($theme_slug)->get('Version');

  if (version_compare($local_version, $data->version, '<')) {
    $changelog = '';

    if (isset($data->changelog_url)) {
      $changelog_response = wp_remote_get($data->changelog_url, ['timeout' => 10]);
      if (!is_wp_error($changelog_response) && wp_remote_retrieve_response_code($changelog_response) === 200) {
        $changelog_json = json_decode(wp_remote_retrieve_body($changelog_response));
        if (!empty($changelog_json->changelog[0]->notes)) {
          $changelog = implode(', ', $changelog_json->changelog[0]->notes);
        }
      }
    }

    $transient->response[$theme_slug] = [
      'theme'         => $theme_slug,
      'new_version'   => $data->version,
      'url'           => $data->changelog_url ?? $update_url,
      'package'       => $data->download_url,
      'upgrade_notice'=> $changelog,
    ];
  }

  return $transient;
}

// 📁 Enregistrement du menu WP
function register_my_menu() {
  register_nav_menu('header-menu', 'Menu principal');
}
add_action('after_setup_theme', 'register_my_menu');

// ⬇️ Inclus les fichiers personnalisés (sécurité : vérifie ABSPATH)
if (defined('ABSPATH')) {
  require_once get_template_directory() . '/includes/customizer-carousel.php';
  $changelog_path = get_template_directory() . '/includes/changelog.php';
if (file_exists($changelog_path)) {
  require_once $changelog_path;
}
}
