<?php 
	
	add_action( 'after_setup_theme', 'northeme_setup' );
	function northeme_setup() {
		
	}
	

	add_action( 'wp_enqueue_scripts', 'northeme_css_js' );
	function northeme_css_js() {
		
		wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles.css' );

		wp_enqueue_script( 'jquery', '/js/jquery-1.9.0.js' );
		wp_enqueue_script( 'modenizr', '/js/modernizr-2.6.2.js' );


		//TODO: alternative cdns

	}
	

	add_filter( 'body_class', 'northeme_body_classes' );
	function northeme_body_classes($classes) {
		$classes[] = (is_active_sidebar( 'widgets-sidebar' )) ? ' two-column' : ' one-column';
		return $classes;
	}
	
	
	add_action( 'widgets_init', 'northeme_widgets_init' );
	function northeme_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Sidebar Widgets', 'northeme' ),
			'id' => 'widgets-sidebar',
			'description' => __( 'Shows on all posts and pages except the frontpage (see Front Page widget area).', 'northeme' ),
			'before_widget' => '<article id="%1$s" class="widget %2$s">',
			'after_widget'  => '</article>',			
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( 'Footer Widgets', 'northeme' ),
			'id' => 'widgets-footer',
			'description' => __( 'Shows in the footer.', 'northeme' ),
			'before_widget' => '<article id="%1$s" class="widget %2$s">',
			'after_widget'  => '</article>',			
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );	
		register_sidebar( array(
			'name' => __( 'Front Page Widgets', 'northeme' ),
			'id' => 'widgets-front',
			'description' => __( 'Shows on the front page, if there is one.', 'northeme' ),
			'before_widget' => '<article id="%1$s" class="widget %2$s">',
			'after_widget'  => '</article>',			
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );	
	}


	function northeme_widget_count_classes( $widget_area ) {
		$sidebars = wp_get_sidebars_widgets();
		if ( !array_key_exists( $widget_area, $sidebars ) || !is_array( $sidebars[ $widget_area ] ))
			return '';

		$widget_count = count( $sidebars[ $widget_area ] );
		$classes = 'widget-count-'.$widget_count;

		if ($widget_count >= 4)
			$classes .= ' widget-count-many';

		return $classes;
	}