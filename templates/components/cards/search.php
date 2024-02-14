<?php
$is_complete = isset( $args['complete'] ) ? $args['complete'] : null;
$post_type = get_post_type_labels( get_post_type_object( get_post_type() ) )->singular_name;

?>



<div class="search-result-item">
	<a href="<?= get_permalink() ?>">
		<?php the_title() ?>
	</a>
	<?php if ( $is_complete ) : ?>
		<span class="post-type">
			<?= $post_type ?>
		</span>
	<?php endif; ?>
</div>