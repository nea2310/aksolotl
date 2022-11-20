<?php  
/*Template Name: hobby*/
?>

<?php get_header() ?>

<main>
  <section class="gallery">
    <a class="gallery__link" href="<?php echo get_page_link( 12 ) ?>"></a>
    <?php dynamic_sidebar('sidebar-infoblock-bottom') ?>
  </section>

  <section class="cv">
    <?php the_content(); ?>
  </section>
</main>

<?php get_footer() ?>