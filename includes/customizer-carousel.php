<?php
function theme_customizer_carousel($wp_customize) {
    $wp_customize->add_section('carousel_section', [
      'title' => 'Carrousel d’accueil',
      'priority' => 30
    ]);
  
    for ($i = 1; $i <= 3; $i++) {
      $wp_customize->add_setting("carousel_image_$i");
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "carousel_image_$i", [
        'label' => "Image Slide $i",
        'section' => 'carousel_section',
        'settings' => "carousel_image_$i"
      ]));
    }
  }
  add_action('customize_register', 'theme_customizer_carousel');
  
  function custom_carousel_customizer($wp_customize) {
    // Slide 1 - Texte
    $wp_customize->add_setting('carousel_title_1', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('carousel_title_1', [
        'label' => 'Titre slide 1',
        'section' => 'title_tagline',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('carousel_text_1', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('carousel_text_1', [
        'label' => 'Texte slide 1',
        'section' => 'title_tagline',
        'type' => 'text',
    ]);

    // Slide 2 - Texte
    $wp_customize->add_setting('carousel_title_2', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('carousel_title_2', [
        'label' => 'Titre slide 2',
        'section' => 'title_tagline',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('carousel_text_2', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('carousel_text_2', [
        'label' => 'Texte slide 2',
        'section' => 'title_tagline',
        'type' => 'text',
    ]);

    // Slide 3 - Texte
    $wp_customize->add_setting('carousel_title_3', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('carousel_title_3', [
        'label' => 'Titre slide 3',
        'section' => 'title_tagline',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('carousel_text_3', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('carousel_text_3', [
        'label' => 'Texte slide 3',
        'section' => 'title_tagline',
        'type' => 'text',
    ]);
}
add_action('customize_register', 'custom_carousel_customizer');
?>