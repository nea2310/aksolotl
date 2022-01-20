<?php  
/*Template Name: Лендинг*/

?>


<?php get_header() ?>

<main class="clearfix">
	<div class="postsFlow clearfix">

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
		?>



		<article class="post">

			<?php if ( $imgLargeLeft): ?>
			<div class="post-img post-img_position_left post-img_size_large"><img src="<?php echo $imgLargeLeft ?>"></div>
			<?php endif ?>

			<?php if ( $imgSmallLeft): ?>
			<div class="post-img post-img_position_left post-img_size_small"><img src="<?php echo $imgSmallLeft ?>"></div>
			<?php endif ?>




			<div class="post-content">
				<div class="post-text-wrap">
					<div><?php the_title() ?></div>
					<div> <?php echo CFS()->get('intro') ?> </div>
				</div>
				<div class="post-preview"><?php the_post_thumbnail('thumbnail') ?></div>
			</div>


			<?php if ( $imgLargeRight): ?>
			<div class="post-img post-img_position_right post-img_size_large"><img src="<?php echo $imgLargeRight ?>">
			</div>
			<?php endif ?>

			<?php if ( $imgSmallRight): ?>
			<div class="post-img post-img_position_right post-img_size_small"><img src="<?php echo $imgSmallRight?>"></div>
			<?php endif ?>
		</article>

		<?php endwhile;
            wp_reset_postdata();
            ?>
		<?php else: ?>

		<p>Записей нет.</p>

		<?php endif; ?>

		<div><?php dynamic_sidebar('sidebar-present') ?></div>

</main>
<?php get_footer() ?>