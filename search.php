<?php get_header(); ?>

	<section class="page-content primary" role="main"> 

		<?php 
			if ( have_posts() ): ?>
				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><?php

				while ( have_posts() ): the_post();
					get_template_part('loop', get_post_format() );
				endwhile; 
			else:
				get_template_part('loop','empty');
			endif; 
		?>

	</section>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>