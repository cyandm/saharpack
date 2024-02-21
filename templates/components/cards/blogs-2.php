<?php
$author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
?>
<div class="blog-posts">
	<a href="<?php the_permalink($post_id) ?>" class="blog-cards">
		<?php $thumbnail_id = get_post_thumbnail_id($post_id); ?>
		<?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
		<div class="blog-detail">
			<div class="postmeta">
				<div class="postmeta-r">
					<span class="meta-date meta"> <i class="iconsax" icon-name="calendar-2"></i><?= get_the_date() ?></span>
					<span class="meta-author meta"><i class="iconsax" icon-name="edit-1"></i><?= $author_name ?></span>
				</div>
			</div>
			<h5><?= get_the_title($post_id) ?></h5>
			<div class="paragraph"> <?php the_content() ?></div>
		</div>
	</a>
</div>