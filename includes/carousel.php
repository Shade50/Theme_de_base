<section class="carousel">
    <div class="carousel-wrapper">

      <div class="carousel-slide active">
        <img src="<?php echo esc_url(get_theme_mod('carousel_image_1')); ?>" alt="Slide 1">
        <div class="slide-content">
          <h2><?php echo esc_html(get_theme_mod('carousel_title_1', 'Titre par défaut')); ?></h2>
          <p><?php echo esc_html(get_theme_mod('carousel_text_1', 'Texte par défaut')); ?></p>

        </div>
      </div>

      <div class="carousel-slide">
        <img src="<?php echo esc_url(get_theme_mod('carousel_image_2')); ?>" alt="Slide 2">
        <div class="slide-content">
          <h2><?php echo esc_html(get_theme_mod('carousel_title_2', 'Titre par défaut')); ?></h2>
          <p><?php echo esc_html(get_theme_mod('carousel_text_2', 'Texte par défaut')); ?></p>

        </div>
      </div>

      <div class="carousel-slide">
        <img src="<?php echo esc_url(get_theme_mod('carousel_image_3')); ?>" alt="Slide 3">
        <div class="slide-content">
          <h2><?php echo esc_html(get_theme_mod('carousel_title_3', 'Titre par défaut')); ?></h2>
          <p><?php echo esc_html(get_theme_mod('carousel_text_3', 'Texte par défaut')); ?></p>

        </div>
      </div>

      <button class="carousel-prev">&#10094;</button>
      <button class="carousel-next">&#10095;</button>

    </div>
  </section>