<?php get_header(); ?>

	<div class="page-content primary" role="main"> 

		<article id="post-none" class="post error-404 empty">

			<h1 class="post-title"><?php _e("You got lost in space!"); ?></h1>

			<div class="post-content">
				<p>
					<?php _e('Ask Marvin: "Here I am, brain the size of a planet and they ask me to take you down to the bridge. Call that job satisfaction? \'Cos I don\'t."'); ?>
				</p>
				<p>
					<?php _e('Or, try out the searchform'); ?>
				</p>
				<?php get_search_form(); ?>				
			</div>

		</article>

	</div>

<?php get_footer(); ?>