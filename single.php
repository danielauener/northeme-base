<?php get_header(); ?>

	<section class="page-content primary" role="main"> 

		<?php 
			if ( have_posts() ): the_post();
				
				get_template_part('loop', get_post_format() ); ?>

				<nav class="post-nav">
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><?php
		
			endif;
			
			if ( $custom_sidebar_exists = ((locate_template( 'sidebar-single.php' )) != '') ) :
          		get_sidebar('single');
          	endif;
		?>

	</section>

	<?php 
		if ( !$custom_sidebar_exists ) :
			get_sidebar();
		endif;
	?>

<?php get_footer(); ?>
