<?php get_header(); ?>

	<section class="page-content primary" role="main"> 

		<?php 
			if ( have_posts() ): the_post(); ?>
				<h1 class="archive-title"><?php 
					printf( __( 'Author Archives: %s', 'twentytwelve' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?>
				</h1><?php

				rewind_posts();

				if ( get_the_author_meta( 'description' ) ) : ?>
					<div class="author" itemscope itemtype="http://schema.org/Person">
						
						<h2 class="author-about">
							<?php _e( 'About ' ); ?>
							<span class="author-name" itemprop="name">
								<?php echo get_the_author(); ?>
							</span>
						</h2>

						<div class="author-description" itemprop="description">
							<p><?php the_author_meta( 'description' ); ?></p>
						</div>
					
					</div><?php 
				endif; 

				while ( have_posts() ): the_post();
					get_template_part( 'loop', get_post_format() );
				endwhile; 
			else:
				get_template_part('loop','empty');
			endif; 

			if ( $custom_sidebar_exists = ((locate_template( 'sidebar-author.php' )) != '') ) :
          		get_sidebar('author');
          	endif;
		?>

	</section>

	<?php 
		if ( !$custom_sidebar_exists ) :
			get_sidebar();
		endif;
	?>

<?php get_footer(); ?>