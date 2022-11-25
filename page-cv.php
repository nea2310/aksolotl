<?php  
/*Template Name: cv*/

?>


<?php get_header() ?>

<main class="cv">
  <section class="cv__content">
    <?php the_content(); ?>
  </section>

  <section class="cv__slider js-cv__slider">
    <?php
      // Выведем в слайдер посты, которые имеют формат aside (заметка)
      // https://wp-kama.ru/function/wp_query

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

    $linkDemo= CFS()->get('link-demo');
    $linkGithub= CFS()->get('link-github');
    $imgIcon= CFS()->get('post-icon');
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
    <article class="carousel">
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