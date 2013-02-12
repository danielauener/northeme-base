<article id="post-<?php the_ID(); ?>" <?php post_class('format-status'); ?>>

	<h1 class="post-title"><?php the_author(); ?></h1>

	<div class="post-content">
		<?php the_content( __( 'Read more &raquo;' ) ); ?>
	</div>

	<footer class="post-footer">
		<?php get_template_part( 'postmeta', 'status' ); ?>
	</footer>

</article>