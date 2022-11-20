<?php  
/*Template Name: Лендинг*/

?>


<?php get_header() ?>

<main class="landing">
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

    $linkDemo= CFS()->get('link-demo');
    $linkGithub= CFS()->get('link-github');

		$imgLargeLeftEmblem= CFS()->get('img-large-left-emblem');
		$imgSmallLeftEmblem= CFS()->get('img-small-left-emblem');
		$imgLargeRightEmblem= CFS()->get('img-large-right-emblem');
		$imgSmallRightEmblem= CFS()->get('img-small-right-emblem');

    $slider= CFS()->get('slider');

    $linkJavascript= CFS()->get('link-javascript');
    $linkScss= CFS()->get('link-scss');
    $linkPug= CFS()->get('link-pug');
    $linkWebpack5= CFS()->get('link-webpack5');
    $linkTypescript= CFS()->get('link-typescript');
    $linkReact= CFS()->get('link-react');
    $linkJest= CFS()->get('link-jest');
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


      <?php if ( $slider): ?>
      <div class="post-slider-horizontal">
        <div class='slider-wrapper'>
          <div class='js-slider-demo1'></div>
        </div>
        <div class='slider-wrapper'>
          <div class='js-slider-demo2'></div>
        </div>
        <div class='slider-wrapper'>
          <div class='js-slider-demo3'></div>
        </div>
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
              <?php if ( $linkDemo): echo $linkDemo; endif; ?>
            </div>
            <div class="post-link post-details-link">
              <a href="<?php the_permalink() ?>"> Подробнее</a>
            </div>
            <div class="post-link post-github-link">
              <?php if ( $linkGithub): echo $linkGithub; endif; ?>
            </div>
          </div>
        </div>
        <?php if ( $imgPreview): ?>
        <div class="post-preview"><img src="<?php echo $imgPreview ?>"></div>
        <?php endif ?>
        <?php if ( $slider): ?>
        <div class="post-slider-vertical">
          <div class='slider-wrapper'>
            <div class='js-slider-demo4'></div>
          </div>
          <div class='slider-wrapper'>
            <div class='js-slider-demo5'></div>
          </div>
          <div class='slider-wrapper'>
            <div class='js-slider-demo6'></div>
          </div>
        </div>
        <?php endif ?>
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




</main>
<?php get_footer() ?>