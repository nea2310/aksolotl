<?php  
/*Template Name: Лендинг*/

?>


<?php get_header() ?>

<main class="landing">
  <?php dynamic_sidebar('sidebar-main-image') ?>
  <?php dynamic_sidebar('sidebar-infoblock-top') ?>
  <section class="posts">

    <?php
			$args = array( 'posts_per_page' => '3',
			'post_status' => 'publish',
			'category_name' => 'landing'
			);

			$query = new WP_Query( $args );
			?>



    <?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post();
		
		$imgLargeLeft= CFS()->get('img-large-left');
		$imgSmallLeft= CFS()->get('img-small-left');
		$imgLargeRight= CFS()->get('img-large-right');
		$imgSmallRight= CFS()->get('img-small-right');
    $imgPreview= CFS()->get('img-preview');
    $imgIcon= CFS()->get('post-icon');

		$imgLargeLeftEmblem= CFS()->get('img-large-left-emblem');
		$imgSmallLeftEmblem= CFS()->get('img-small-left-emblem');
		$imgLargeRightEmblem= CFS()->get('img-large-right-emblem');
		$imgSmallRightEmblem= CFS()->get('img-small-right-emblem');
		?>



    <article class="post">





      <?php if ( $imgLargeLeft): ?>
      <div class="post-img post-img_position_left post-img_size_large">

        <div class="post-img-picture">
          <img src="<?php echo $imgLargeLeft ?>">
        </div>

        <?php if ( $imgLargeLeftEmblem): ?>
        <div class="post-img-emblem">
          <img src="<?php echo $imgLargeLeftEmblem ?>">
        </div>
        <?php endif ?>

      </div>
      <?php endif ?>




      <?php if ( $imgSmallLeft): ?>
      <div class="post-img post-img_position_left post-img_size_small"><img src="<?php echo $imgSmallLeft ?>">

        <?php if ( $imgSmallLeftEmblem): ?>
        <div class="post-img-emblem"><img src="<?php echo $imgSmallLeftEmblem ?>">
        </div>
        <?php endif ?>

      </div>
      <?php endif ?>





      <div class="post-content">
        <div class="post-text-wrap">
          <div class="post-icon"><img src="<?php echo $imgIcon ?>"></div>
          <div class="post-title"><?php the_title() ?></div>
          <div class="post-intro"> <?php echo CFS()->get('intro') ?> </div>
        </div>
        <div class="post-preview"><img src="<?php echo $imgPreview ?>"></div>
      </div>



      <?php if ( $imgLargeRight): ?>
      <div class="post-img post-img_position_right post-img_size_large"><img src="<?php echo $imgLargeRight ?>">

        <?php if ( $imgLargeRightEmblem): ?>
        <div class="post-img-emblem"><img src="<?php echo $imgLargeRightEmblem ?>">
        </div>
        <?php endif ?>

      </div>
      <?php endif ?>




      <?php if ( $imgSmallRight): ?>
      <div class="post-img post-img_position_right post-img_size_small"><img src="<?php echo $imgSmallRight?>">

        <?php if ( $imgSmallRightEmblem): ?>
        <div class="post-img-emblem"><img src="<?php echo $imgSmallRightEmblem ?>">
        </div>
        <?php endif ?>

      </div>
      <?php endif ?>


    </article>

    <?php endwhile;
            wp_reset_postdata();
            ?>
    <?php else: ?>

    <p>Записей нет.</p>

    <?php endif; ?>
  </section>





  <section class="slider">
    <?php
			$args1 = array( 'posts_per_page' => '3',
			'post_status' => 'publish',
			'terms'    => ['post-format-aside'],
			);
			$query1 = new WP_Query([
				'tax_query' => [
					 [
						  'taxonomy' => 'post_format',
						  'field'    => 'slug',
						  'terms'    => ['post-format-aside'],
					 ]
				]
		  ]);
			?>
    <?php if ( $query1->have_posts() ) : ?>
    <?php while ( $query1->have_posts() ) : $query1->the_post();
		?>
    <article class="post">
      <div class="post-content">
        <div class="post-text-wrap">
          <div><?php the_title() ?></div>
          <div> <?php echo CFS()->get('intro') ?> </div>
        </div>
      </div>
    </article>
    <?php endwhile;
            wp_reset_postdata();
            ?>
    <?php else: ?>
    <p>Записей нет.</p>
    <?php endif; ?>
  </section>











</main>
<?php get_footer() ?>