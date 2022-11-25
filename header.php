<!doctype html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width">
  <meta name="keywords" content="никифорова, екатерина, блог, front-end, разработка">
  <meta name="description" content="Никифорова Екатерина: блог">
  <meta property="og:title" content="Никифорова Екатерина: блог">
  <meta property="og:description" content="Никифорова Екатерина: блог">
  <meta property="og:image" content="https://nea2310.github.io/Metalamp-2nd-task/_social/social-image.jpg">
  <meta property="og:url" content="https://nea2310.github.io/Metalamp-2nd-task/landing-page.html">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta link rel="icon" href="/favicon.ico" sizes="any">
  <meta link rel="icon" href="/favicons/icon.svg" type="image/svg+xml">
  <meta link rel="apple-touch-icon" href="/favicons/apple-touch-icon.png">
  <meta link rel="manifest" href="/favicons/manifest.json">
  <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
  <header class="header">
    <a class="header__logo" href="<?php echo get_site_url() ?>">
      <?php include 'components/logo.php'?>
    </a>

    <button class="header__burger-button" aria-label="навигация">
      <span class="header__burger"></span>
    </button>
    <nav class="topmenu">
      <?php wp_nav_menu(['theme_location' => 'top',
											'container' => null,
											'items_wrap' => '<ul>%3$s</ul>',
											'walker' => new My_Walker_Nav_Menu()
											])
												?>
    </nav>
  </header>