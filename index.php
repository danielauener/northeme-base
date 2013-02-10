<?php get_header(); ?>

	<section class="page-content primary" role="main"> 

		<?php 
			if ( have_posts() ): 
				while ( have_posts() ): the_post();
					get_template_part('loop');
				endwhile; 
			else:
				get_template_part('loop','empty');
			endif; 
		?>

	</section>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
