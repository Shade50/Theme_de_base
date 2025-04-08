<?php
// Créer une page admin "Changelog du thème"
 add_action('admin_menu', function() {
   add_theme_page(
     'Changelog du thème',
     '📄 Changelog',
     'edit_theme_options',
     'theme-changelog',
     'render_theme_changelog_page'
   );
 });
 
 // Afficher le contenu du changelog.json
 function render_theme_changelog_page() {
     $json_url = 'https://devtheme.pulsecrea.fr/MAJ/Theme_de_base/changelog.json';
     $json_data = wp_remote_get($json_url);
     $theme = wp_get_theme();
     $current_version = $theme->get('Version');
   
     echo '<div class="wrap">';
     echo '<h1>📄 Historique des mises à jour</h1>';
     echo '<p>Thème : <strong>' . esc_html($theme->get('Name')) . '</strong> – version actuelle : <strong>' . esc_html($current_version) . '</strong></p>';
     echo '<hr>';
   
     if (is_wp_error($json_data)) {
       echo '<p style="color:red;">❌ Erreur lors du chargement du changelog.</p>';
       return;
     }
   
     $body = wp_remote_retrieve_body($json_data);
     $data = json_decode($body);
   
     if (empty($data->changelog)) {
       echo '<p>Aucun changelog disponible.</p>';
       return;
     }
   
     $has_new = false;
   
     foreach ($data->changelog as $entry) {
       if (true)) {
         $has_new = true;
         echo "<h2>🟢 Version {$entry->version} <small style='color:#999;'>({$entry->date})</small></h2>";
         echo '<ul>';
         foreach ($entry->notes as $note) {
           echo "<li>{$note}</li>";
         }
         echo '</ul>';
       }
     }
   
     if (!$has_new) {
       echo '<p>🎉 Vous êtes à jour. Aucune mise à jour disponible.</p>';
     }
   
     echo '</div>';
   }
   
   
 ?>