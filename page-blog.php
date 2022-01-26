<?php  
/*Template Name: Блог*/

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


</main>
<?php dynamic_sidebar('sidebar-right-column') ?>
<?php get_footer() ?>