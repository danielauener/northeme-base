<?php get_header(); ?>

	<section class="page-content primary" role="main"> 

		<?php 
			if ( have_posts() ): ?>
				<header class="archive-header">
					<h1 class="archive-title"><?php
						printf( __( 'Category Archives: %s' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
					</h1><?php	

					if ( $category_description = category_description() ) : ?>
						<div class="archive-description"><?php echo $category_description; ?></div><?php
					endif; ?>
				</header><?php

				while ( have_posts() ): the_post();
					get_template_part( 'loop', get_post_format() );
				endwhile; 
			else:
				get_template_part('loop','empty');
			endif; 

			if ( $custom_sidebar_exists = ((locate_template( 'sidebar-category.php' )) != '') ) :
          		get_sidebar('category');
          	endif;
		?>

	</section>

	<?php 
		if ( !$custom_sidebar_exists ) :
			get_sidebar();
		endif;
	?>

<?php get_footer(); ?>