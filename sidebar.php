<?php if ( is_active_sidebar( 'widgets-sidebar' ) ) : ?>
	<aside class="secondary widgets" role="complementary">
		<?php dynamic_sidebar( 'widgets-sidebar' ); ?>
	</aside>
<?php endif; ?>