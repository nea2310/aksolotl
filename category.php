<?php get_header(); ?>
<?php dynamic_sidebar('sidebar-main-image') ?>

<div class="blog__wrapper">
  <main class="blog">

    <?php if (have_posts()): 
	while (have_posts()):the_post();
  $params = [
    'permalink' => get_permalink(),
    'thumbnail' => get_the_post_thumbnail_url(),
    'title' => get_the_title(),
    'intro' =>CFS()->get('intro')
  ];
    get_template_part('src/components/post', null, $params);
  ?>
    <?php endwhile; ?>
    <?php else: ?>
    Записей нет!

    <?php endif; ?>
    <?php the_posts_pagination() ?>
  </main>
  <?php get_template_part('src/components/sidebar')?>
</div>
<?php get_footer() ?>