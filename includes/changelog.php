<?php
// Créer une page admin "Changelog du thème"
add_action('admin_menu', function () {
  add_theme_page(
    'Changelog du thème',
    '📝 Changelog',
    'edit_theme_options',
    'theme-changelog',
    'render_theme_changelog_page'
  );
});

// Afficher le contenu du changelog.json
function render_theme_changelog_page() {
  $json_url = 'https://devtheme.pulsecrea.fr/MAJ/Theme_de_base/changelog.json';
  $theme   = wp_get_theme();
  $version = $theme->get('Version');

  echo '<div class="wrap">';
  echo '<h1>📄 Historique des mises à jour</h1>';
  echo '<p>Thème : <strong>' . esc_html($theme->get('Name')) . '</strong> – version actuelle : <strong>' . esc_html($version) . '</strong></p>';
  echo '<hr>';

  $json = wp_remote_get($json_url);
  if (is_wp_error($json)) {
    echo '<p style="color:red;">⚠ Impossible de charger le changelog.</p>';
    echo '</div>';
    return;
  }

  $body = wp_remote_retrieve_body($json);
  $data = json_decode($body);
  echo '<pre>';
print_r($data);
echo '</pre>';

  echo '<pre>'; print_r($data); echo '</pre>';
  if (!isset($data->changelog) || !is_array($data->changelog)) {
  echo "<p>⚠️ Aucun changelog valide trouvé. (structure absente ou invalide)</p>";
  return;
}
  

  foreach ($data->changelog as $entry) {
    echo '<h2>Version ' . esc_html($entry->version) . ' <small style="color:#999;">(' . esc_html($entry->date) . ')</small></h2>';
    echo '<ul>';
    foreach ($entry->notes as $note) {
      echo '<li>' . esc_html($note) . '</li>';
    }
    echo '</ul>';
  }

  echo '</div>';
}
