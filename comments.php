<div class="post-comments"><?php 
	
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number()),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		a<ul class="comments-list"><?php 
			wp_list_comments(array(
				'callback' => 'northeme_comment',
				'style' => 'article',
				'end-callback' => 'northeme_comment_end'
			)); ?>
		</ul>b<?php 

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		
			<nav class="comments-nav" role="navigation">
				<h2 class=""><?php _e( 'Comment navigation'); ?></h2>
				<div class="prev"><?php previous_comments_link( __( '&larr; Older Comments') ); ?></div>
				<div class="next"><?php next_comments_link( __( 'Newer Comments &rarr;') ); ?></div>
			</nav><?php 
		
		endif;
	elseif ( ! comments_open() && get_comments_number() != '0' && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		
		<p class="no-comments">
			<?php _e( 'Comments are closed.'); ?>
		</p><?php 
	
	endif; ?>

	<?php comment_form(); ?>

</div>