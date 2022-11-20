<?php  
/*Template Name: cv*/

?>


<?php get_header() ?>

<main>
  <section class="cv">
    <?php the_content(); ?>
  </section>

  <section class="js-slider">
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
    $linkJavascript= CFS()->get('link-javascript');
    $linkScss= CFS()->get('link-scss');
    $linkPug= CFS()->get('link-pug');
    $linkWebpack5= CFS()->get('link-webpack5');
    $linkTypescript= CFS()->get('link-typescript');
    $linkReact= CFS()->get('link-react');
    $linkJest= CFS()->get('link-jest');
		?>
    <article class="carousel">



      <div class="portfolio-card">
        <div class="post-text-wrap">
          <div class="post-icon"><img src="<?php echo $imgIcon ?>"></div>

          <h2 class="post-title"><?php the_title() ?></h2>
          <span class="stack-caption">Использованные технологии</span>
          <div class="stack">
            <?php if ( $linkJavascript):?> <div class="link-stack-wrapper link-javascript"><?php echo $linkJavascript;?>
            </div>
            <?php endif; ?>
            <?php if ( $linkScss):?> <div class="link-stack-wrapper link-scss"><?php  echo $linkScss;?> </div>
            <?php endif; ?>
            <?php if ( $linkPug):?> <div class="link-stack-wrapper link-pug"><?php  echo $linkPug;?> </div>
            <?php endif; ?>
            <?php if ( $linkWebpack5):?> <div class="link-stack-wrapper link-webpack5"><?php  echo $linkWebpack5;?>
            </div><?php endif; ?>
            <?php if ( $linkTypescript):?> <div class="link-stack-wrapper link-typescript">
              <?php  echo $linkTypescript;?> </div>
            <?php endif; ?>
            <?php if ( $linkReact):?> <div class="link-stack-wrapper link-react"><?php  echo $linkTypescript;?> </div>
            <?php endif; ?>
            <?php if ( $linkJest):?> <div class="link-stack-wrapper link-jest"><?php  echo $linkJest;?> </div>
            <?php endif; ?>
          </div>


          <div class="post-links">

            <div class="post-link post-demo-link">
              <?php if ( $linkDemo): echo CFS()->get('link-demo'); endif; ?>
            </div>
            <div class="post-link post-details-link">
              <a href="<?php the_permalink() ?>"> Подробнее</a>
            </div>
            <div class="post-link post-github-link">
              <?php if ( $linkGithub): echo CFS()->get('link-github'); endif; ?>
            </div>
          </div>
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