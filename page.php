<?php get_header(); ?>

	<section class="page-content primary" role="main"><?php 
		if ( have_posts() ): the_post();
			get_template_part('loop', 'page' );	
		endif;
		
		if ( $custom_sidebar_exists = ((locate_template( 'sidebar-page.php' )) != '') ) :
      		get_sidebar('page');
      	endif; ?>

	</section>

	<?php 
		if ( !$custom_sidebar_exists ) :
			get_sidebar();
		endif;
	?>

<?php get_footer(); ?>