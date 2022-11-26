<?php  
/*Template Name: blog*/
?>


<?php get_header() ?>
<?php dynamic_sidebar('sidebar-main-image') ?>
<div class="blog__wrapper">
  <main class="blog">
    <?php
$args = array(
	'numberposts' => 10,
	'post_status' => 'publish',
);

$result = wp_get_recent_posts( $args );

foreach( $result as $p ){
  $post = get_post( $p['ID'] );
    $params = [
    'permalink' => get_permalink($p['ID']),
    'thumbnail' => get_the_post_thumbnail_url($p['ID']),
    'title' => $p['post_title'],
    'intro' =>CFS()->get('intro')
  ];
    get_template_part('src/components/post', null, $params);
	?>

    <?php 
}
?>
  </main>
  <?php get_template_part('src/components/sidebar')?>
</div>
<?php get_footer() ?>