<?php  
/*Template Name: portfolio*/
?>

<?php get_header() ?>

<main class="portfolio">
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
    $imgIcon= CFS()->get('post-icon');
    $imgPreview= CFS()->get('img-preview');
    $linkDemo= CFS()->get('link-demo');
    $linkGithub= CFS()->get('link-github');
    $slider= CFS()->get('slider');
    $linkJavascript= CFS()->get('javascript');
    $linkScss= CFS()->get('scss');
    $linkPug= CFS()->get('pug');
    $linkWebpack= CFS()->get('webpack');
    $linkTypescript= CFS()->get('typescript');
    $linkReact= CFS()->get('react');
    $linkRedux= CFS()->get('redux');
    $linkJest= CFS()->get('jest');
    $linkJquery= CFS()->get('jquery');
    $linkCRA= CFS()->get('cra');
    $linkFirebase= CFS()->get('firebase');
  ?>

  <article class="portfolio-item">
    <?php if ( $imgLargeLeft): ?>
    <div class="portfolio-item__img-large">
      <img src="<?php echo $imgLargeLeft ?>">
    </div>
    <?php endif ?>
    <?php if ( $slider): ?>
    <div class="portfolio-item__slider">
      <?php get_template_part('src/components/slider')?>
      <?php get_template_part('src/components/slider')?>
      <?php get_template_part('src/components/slider')?>
    </div>
    <?php endif ?>
    <?php if ( $imgSmallLeft): ?>
    <div class="portfolio-item__img-small"><img src="<?php echo $imgSmallLeft ?>">
    </div>
    <?php endif ?>

    <?php 
    $params = [
      'imgIcon' => $imgIcon,
      'imgPreview' => $imgPreview,
      'linkDemo' => $linkDemo,
      'linkGithub' => $linkGithub,
      'slider' => $slider,
      'linkJavascript' => $linkJavascript,
      'linkScss' => $linkScss,
      'linkPug' => $linkPug,
      'linkWebpack' => $linkWebpack,
      'linkTypescript' => $linkTypescript,
      'linkReact' => $linkReact,
      'linkRedux' => $linkRedux,
      'linkJest' => $linkJest,
      'linkJquery' => $linkJquery,
      'linkCRA' => $linkCRA,
      'linkFirebase' => $linkFirebase
    ];


    get_template_part('src/components/portfolio-card', null, $params);

    ?>


    <?php if ( $imgLargeRight): ?>
    <div class="portfolio-item__img-large"><img src="<?php echo $imgLargeRight ?>">
    </div>
    <?php endif ?>
    <?php if ( $imgSmallRight): ?>
    <div class="portfolio-item__img-small"><img src="<?php echo $imgSmallRight?>">
    </div>
    <?php endif ?>
  </article>

  <?php endwhile;
            wp_reset_postdata();
            ?>
  <?php else: ?>
  <p>Записей нет.</p>
  <?php endif; ?>
</main>
<?php get_footer() ?>