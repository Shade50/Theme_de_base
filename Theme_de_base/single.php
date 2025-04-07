<?php get_header(); ?>

<main class="contenu-article">
  <?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
  ?>
      <article>
        <h1><?php the_title(); ?></h1>
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="thumbnail">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>

        <div class="texte">
          <?php the_content(); ?>
        </div>
      </article>
  <?php
    endwhile;
  else :
    echo '<p>Aucun contenu trouvé.</p>';
  endif;
  ?>
</main>

<?php get_footer(); ?>
