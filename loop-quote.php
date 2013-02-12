<article id="post-<?php the_ID(); ?>" <?php post_class('format-quote'); ?>>

	<div class="post-content">
		<?php the_content( __( 'Read more &raquo;' ) ); ?>
	</div>

	<footer class="post-footer">
		<?php get_template_part( 'postmeta', 'quote' ); ?>
	</footer>

</article>