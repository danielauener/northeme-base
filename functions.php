<?php 
	
	/**
	 * [northeme_setup description]
	 * @return [type] [description]
	 */
	function northeme_setup() {
		
	}
	add_action( 'after_setup_theme', 'northeme_setup' );
	

	/**
	 * [northeme_css_js description]
	 * @return [type] [description]
	 */
	function northeme_css_js() {
		
		//wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles.css' );

		wp_enqueue_script( 'jquery', '/js/jquery-1.9.0.js' );
		wp_enqueue_script( 'modenizr', '/js/modernizr-2.6.2.js' );


		//TODO: alternative cdns

	}
	add_action( 'wp_enqueue_scripts', 'northeme_css_js' );
	

	/**
	 * [northeme_body_classes description]
	 * @param  [type] $classes [description]
	 * @return [type]          [description]
	 */
	function northeme_body_classes($classes) {
		$classes[] = (is_active_sidebar( 'widgets-sidebar' )) ? ' two-column' : ' one-column';
		return $classes;
	}
	add_filter( 'body_class', 'northeme_body_classes' );


	/**
	 * [northeme_widgets_init description]
	 * @return [type] [description]
	 */
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
	add_action( 'widgets_init', 'northeme_widgets_init' );

	if ( ! function_exists('northeme_widget_count_classes') ) {

		/**
		 * [northeme_widget_count_classes description]
		 * @param  [type] $widget_area [description]
		 * @return [type]              [description]
		 */
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

	}


	if ( ! function_exists('northeme_comment') ) {

		/**
		 * [northeme_comment description]
		 * @param  [type] $comment [description]
		 * @param  [type] $args    [description]
		 * @param  [type] $depth   [description]
		 * @return [type]          [description]
		 */
		function northeme_comment( $comment, $args, $depth ) {
			$GLOBALS['comment'] = $comment;

			$element = ($args['style'] == 'article') ? '<article' : '<div';

			if ($comment->comment_type != 'pingback' && $comment->comment_type != 'trackback'): ?>
				<li><?php
					
					if ($args['style'] == 'article') : ?> 
						<article id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>><?php
					else : ?>
						<div id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>><?php
					endif; ?>
					
						<div class="comment-author vcard">
							<?php echo get_avatar( $comment, 40 ); ?>
							<?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
						</div><!-- .comment-author .vcard -->
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
							<br />
						<?php endif; ?>

						<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<?php
								/* translators: 1: date, 2: time */
								printf( __( '%1$s at %2$s' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), ' ' );
							?>
						</div><!-- .comment-meta .commentmetadata -->

						<div class="comment-body"><?php comment_text(); ?></div>

						<div class="reply">
							<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</div><?php

					if ($args['style'] == 'article') : ?> 
						</article><?php
					else : ?>
						</div><?php
					endif;

				// replies get listed here

			else: ?>
				<li class="post pingback">
					<p>
						<?php _e( 'Pingback:' ); ?> 
						<?php comment_author_link(); ?>
						<?php edit_comment_link( __( '(Edit)' ), ' ' ); ?>
					</p><?php
			endif;
		}

	}


	if ( ! function_exists('northeme_comment_end') ) {

		/**
		 * [twentyten_comment_end description]
		 * @param  [type] $comment [description]
		 * @param  [type] $args    [description]
		 * @param  [type] $depth   [description]
		 * @return [type]          [description]
		 */
		function northeme_comment_end($comment, $args, $depth) {

			switch($args['style']) {
				case 'article': 
					echo "</article>\n</li>\n";
					break;
				default:
					echo "</li>\n";
			}
		
		}

	}