<?php get_header(); ?>

	<section class="page-content primary" role="main"> 

		<?php 
			if ( have_posts() ): ?>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1><?php

				while ( have_posts() ): the_post();
					get_template_part('loop', get_post_format() );
				endwhile; 
			else:
				get_template_part('loop','empty');
			endif; 
			
			if ( $custom_sidebar_exists = ((locate_template( 'sidebar-search.php' )) != '') ) :
          		get_sidebar('search');
          	endif;
		?>

	</section>

	<?php 
		if ( !$custom_sidebar_exists ) :
			get_sidebar();
		endif;
	?>

<?php get_footer(); ?>