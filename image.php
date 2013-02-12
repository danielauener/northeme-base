<?php get_header(); ?>
	
	<section class="page-content primary" role="main"><?php 

		while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
				<header class="post-header">
					<h1 class="post-title"><?php the_title(); ?></h1>

					<footer class="post-meta">
						<?php get_template_part( 'postmeta', get_post_format() ); ?>
					</footer>

					<nav class="post-nav" role="navigation">
						<span class="previous-image">
							<?php previous_image_link( false, __( '&larr; Previous' ) ); ?>
						</span>
						<span class="next-image">
							<?php next_image_link( false, __( 'Next &rarr;' ) ); ?>
						</span>
					</nav>
				</header>

				<div class="post-content">

					<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
						$attachment_size = apply_filters( 'northeme_attachment_size', array( 960, 960 ) );
						echo wp_get_attachment_image( $post->ID, $attachment_size );?>
					</a>

					<div class="post-description">
						<?php the_content(); ?>
					</div>

				</div>
				
				<?php comments_template(); ?>
			
			</article><?php 

		endwhile; ?>

	</section>

<?php get_footer(); ?>