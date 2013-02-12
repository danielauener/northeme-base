<?php get_header(); ?>

	<section class="page-content primary" role="main"> 

		<?php 
			if ( have_posts() ): ?>
				<header class="archive-header">
					<h1 class="archive-title"><?php
						printf( __( 'Tag Archives: %s' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
					</h1><?php	

					if ( $tag_description = tag_description() ) : ?>
						<div class="archive-description"><?php echo $tag_description; ?></div><?php
					endif; ?>
				</header><?php

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