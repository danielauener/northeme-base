<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<h1 class="post-title"><?php the_title(); ?></h1>

	<div class="post-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:'	), 'after' => '</div>' ) ); ?>
	</div>

	<?php
		if ( comments_open() || get_comments_number() > 0 ) :
			comments_template( '', true );
		endif;	
	?>

</article>