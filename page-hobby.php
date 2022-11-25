<?php  
/*Template Name: hobby*/
?>

<?php get_header() ?>

<main class="hobby">
  <section class="gallery">
    <a class="gallery__link" href="<?php echo get_page_link( 12 ) ?>"></a>
    <?php dynamic_sidebar('sidebar-infoblock-bottom') ?>
  </section>
</main>

<?php get_footer() ?>