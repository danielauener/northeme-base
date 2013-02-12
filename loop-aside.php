<article id="post-<?php the_ID(); ?>" <?php post_class('format-aside'); ?>>

	<h1 class="post-title"><?php the_title(); ?></h1>

	<div class="post-content">
		<?php the_content( __('Read more &raquo;') ); ?>
	</div>

</article>