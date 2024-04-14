<p class="search-blog"> <i class="iconsax" icon-name="search-normal-2"></i><input placeholder="جستجو" /></p>

<h4 class="mb-hide"><?= pll__('categories') ?></h4>
<ul>
	<?php wp_list_categories(
		[
			'orderby' => 'id',
			'hide_empty' => false,
			'title_li' => "",
			'current_category' => 1
		]
	) ?>
</ul>

<div class="mb-hide">
	<h4><?= pll__('suggestion-for-us') ?></h4>

	<?php
	$new_blogs = new WP_Query([
		'post_type' => 'post',
		'posts_per_page' => 3,
		'post__not_in' => [get_the_ID()],
	]);

	$favorites_blog = new WP_Query([
		'post_type' => 'post',
		'post_per_page' => 3,
		'post__not_in' => [get_the_ID()],
		'tag' => ['favorites', 'محبوب-ترین-ها']
	]);

	?>

	<div class="blogs">

		<?php
		if ($favorites_blog->post_count < 1) {
			while ($new_blogs->have_posts()) {
				$new_blogs->the_post();
				$post_id = get_the_ID();
				get_template_part('/templates/components/cards/blogs', 'card', ['post_id' => $post_id]);
			}
		} else {
			while ($favorites_blog->have_posts()) {
				$favorites_blog->the_post();
				$post_id = get_the_ID();
				get_template_part('/templates/components/cards/blogs', 'card', ['post_id' => $post_id]);
			}
		}
		?>

	</div>
	<?php wp_reset_postdata() ?>

</div>