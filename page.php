<?php get_header(); ?>

	<section class="page-content primary" role="main"><?php 
		if ( have_posts() ): the_post();
			get_template_part('loop', 'page' );	
		endif; ?>
	</section>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>