<?php get_header(); ?>
<?php dynamic_sidebar('sidebar-main-image') ?>
<h2 class="page-posts-header"><?php single_cat_title('Посты по рубрикам: '); ?></h2>
<div class="page-posts-wrapper">

  <main class="posts">

    <?php if (have_posts()): 
	while (have_posts()):the_post() ?>
    <div class="post">
      <a class="post__link" href="<?php echo get_permalink($p['ID']) ?>">
        <img class="post__image" src="<?php echo get_the_post_thumbnail_url($p['ID']) ?>">
      </a>
      <div class="post__info">
        <h3 class="post__title"><?php echo $p['post_title'] ?></h3>
        <div class="post__text"> <?php echo CFS()->get('intro') ?> </div>
      </div>
    </div>
    <?php endwhile; ?>
    <?php else: ?>
    Записей нет!

    <?php endif; ?>
    <?php the_posts_pagination() ?>
  </main>
  <aside>
    <?php dynamic_sidebar('sidebar-right-column') ?>
  </aside>
</div>
<?php get_footer() ?>