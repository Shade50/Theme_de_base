<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <link rel="stylesheet" href="style/style.css">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header>
<!--     <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
    <p><?php bloginfo('description'); ?></p> -->
    <div class="logo" >
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/asset/img/logo.png" alt="<?php bloginfo('name'); ?>">
      </a>

    </div>
    <nav class="menu-principal">
  <?php
  wp_nav_menu([
    'theme_location' => 'header-menu',
    'container' => false,
    'menu_class' => 'menu',
  ]);
  ?>
</nav>

  </header>
