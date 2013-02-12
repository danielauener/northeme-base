<?php 
	printf(
		__(
			'<div class="meta-info">'.
			'	Posted on <span class="meta-date">%1$s</span>'.
			'	by <a href="%2$s" class="meta-author">%2$s</a>'.
			'</div>' 
		),
		get_the_date(),
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		get_the_author()
	);
?>