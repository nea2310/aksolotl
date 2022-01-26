<!doctype html>
<html <?php language_attributes() ?>>

<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>
	<div class="wrapper">
		<header class="header">
			<nav class="topmenu">
				<div class="menu-button">MENU</div>
				<?php wp_nav_menu(['theme_location' => 'top',
											'container' => null,
											'items_wrap' => '<ul>%3$s</ul>'])
												?>
			</nav>

			<?php get_sidebar('header') ?>
		</header>
		<div class="content-wrapper clearfix">