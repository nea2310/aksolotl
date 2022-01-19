<?php  
/*Template Name: Лендинг*/

?>


<?php get_header() ?>

<main class="clearfix">
	<div class="postsFlow clearfix">
		<?php the_post() ?>
		<article class="page-full">
			<h2><?php the_title() ?></h2>
			<div> <?php the_content() ?> </div>
		</article>
	</div>
	<div><?php dynamic_sidebar('sidebar-present') ?></div>

</main>
<?php get_footer() ?>