<?php get_header(); ?>

<?php if ( have_posts() ) :	while ( have_posts() ) : the_post(); ?>

<div class="all-posts">
	
	<div class="wrap-posts">
						
		<h3> <?php the_title(); ?></h3>
		
		<p><?php the_content(); ?></p>
		
	</div>
	
</div>

<?php endwhile; else : endif; ?>

<?php get_footer(); ?>