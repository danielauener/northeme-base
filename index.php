<?php get_header(); ?>

	<section class="page-content primary" role="main"> 

		<?php 
			if ( have_posts() ): 
				while ( have_posts() ): the_post();
					get_template_part('loop', get_post_format() );
				endwhile; 
			else:
				get_template_part('loop','empty');
			endif; 
			
			if ( $custom_sidebar_exists = ((locate_template( 'sidebar-'.get_post_format().'.php' )) != '') ) :
				get_sidebar(get_post_format());
			endif;
		?>

	</section>

	<?php 
		if ( !$custom_sidebar_exists ) :
			get_sidebar();
		endif;
	?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
