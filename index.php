<?php get_header() ?>
<div class="page-single-wrapper">
  <main>
    <?php the_post() ?>
    <article class="page-full">
      <h2><?php the_title() ?></h2>
      <div> <?php the_content() ?> </div>
    </article>
  </main>
  <?php get_sidebar() ?>
</div>
<?php get_footer() ?>