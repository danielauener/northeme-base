<article id="post-<?php the_ID(); ?>" <?php post_class('format-image'); ?>>

	<div class="post-content">
		<?php the_content( __('Read more &raquo;') ); ?>
	</div>

	<footer class="post-footer">
		<h1 class="post-title"><?php the_title(); ?></h1>
		<?php get_template_part( 'postmeta', 'image' ); ?>
	</footer>

</article>