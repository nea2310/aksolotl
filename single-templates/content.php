<div><?php the_date(); ?></div>
<?php the_post_thumbnail( 'medium' ) ?>
<h2><?php the_title() ?></h2>
<div><?php the_content() ?> </div>
<div><?php the_tags() ?> </div>
<div><?php wp_list_categories() ?> </div>