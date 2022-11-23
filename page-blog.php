<?php  
/*Template Name: Блог*/
?>


<?php get_header() ?>
<?php dynamic_sidebar('sidebar-main-image') ?>
<div class="page-posts-wrapper">


  <main class="posts">

    <?php
$args = array(
	'numberposts' => 10,
	'post_status' => 'publish',
);

$result = wp_get_recent_posts( $args );

foreach( $result as $p ){
  $post = get_post( $p['ID'] )
	?>
    <div class="post">
      <a class="post__link" href="<?php echo get_permalink($p['ID']) ?>">
        <img class="post__image" src="<?php echo get_the_post_thumbnail_url($p['ID']) ?>">
      </a>
      <div class="post__info">
        <h3 class="post__title"><?php echo $p['post_title'] ?></h3>
        <div class="post__text"> <?php echo CFS()->get('intro') ?> </div>
      </div>
    </div>
    <?php 
}
?>
  </main>
  <?php get_template_part('src/components/sidebar/sidebar')?>
</div>
<?php get_footer() ?>