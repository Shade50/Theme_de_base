<?php get_header(); ?>

<main>

  <section class="hero">
    <h1>Bienvenue à l'élevage des Vicklands</h1>
    <p>Des compagnons d'exception élevés avec passion.</p>
  </section>

  <?php include get_template_directory() . '/includes/carousel.php'; ?>


  <section class="actus">
    <h2>Nos dernières actualités</h2>

    <div class="grid-actus">
      <?php
      $articles = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 4
      ]);

      if ($articles->have_posts()) :
        while ($articles->have_posts()) : $articles->the_post();
      ?>
          <article class="carte-article">
            <?php if (has_post_thumbnail()) : ?>
              <div class="thumbnail">
                <?php the_post_thumbnail('medium'); ?>
              </div>
            <?php endif; ?>

            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn">Lire l’article</a>
          </article>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo "<p>Aucun article trouvé.</p>";
      endif;
      ?>
    </div>
  </section>


</main>
<?php include 'carrousel.js'; ?>

<?php get_footer(); ?>