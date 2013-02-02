<?php 

	function northeme_setup() {
		
	}
	add_action( 'after_setup_theme', 'northeme_setup' );


	function northeme_css_js() {
		
		wp_enqueue_style( 'layout', get_template_directory_uri().'/css/layout.css' );

		wp_enqueue_script( 'jquery', '/js/jquery-1.9.0.js' );
		wp_enqueue_script( 'modenizr', '/js/modernizr-2.6.2.js' );


		//TODO: alternative cdns

	}
	add_action( 'wp_enqueue_scripts', 'northeme_css_js' );