<?php get_header(); ?>

<main>
  <h2><?php the_title(); ?></h2>
  <div class="content">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        the_content();
      endwhile;
    else :
      echo '<p>Contenu non trouvé.</p>';
    endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>