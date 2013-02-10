<?php get_header(); ?>

	<section class="page-content primary" role="main"> 

		<?php 
			if ( have_posts() ): ?>
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s'), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s'), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format') ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s'), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format') ) . '</span>' );
					else :
						_e( 'Archives');
					endif; ?>
				</h1><?php	

				while ( have_posts() ): the_post();
					get_template_part( 'loop', get_post_format() );
				endwhile; 
			else:
				get_template_part('loop','empty');
			endif; 
		?>

	</section>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>