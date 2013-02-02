<?php get_header(); ?>

	<div class="page-content"> 

		<div class="content" role="main">
			<?php 
				if ( have_posts() ): 
					while ( have_posts() ): the_post();
						get_template_part('loop');
					endwhile; 
				else:
					get_template_part('loop','empty');
				endif; 
			?>
		</div>

	</div>

	<aside class="secondary" role="complementary">

		<div class="widgets area-1">
			<?php // TODO: widgets ?>
		</div>

	</aside>

<?php get_footer(); ?>
