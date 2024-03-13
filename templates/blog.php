<?php /*Template Name: Blog */ get_header() ?>
<?php
$author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));
$post_id = get_queried_object_id();
$selected_blog = get_field('selected_blog');
$first_blogs = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => 4,
	'post__not_in' => [get_the_ID()],
]);
$second_blogs = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => 6,
	'post__not_in' => [get_the_ID()],
]);
$slider_blogs = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => 6,
	'                                                                                                                                                                                                  post__not_in' => [get_the_ID()],
]);
$all_blogs_page_id = get_option('page_for_posts');
?>
<main class="container blog-archive">
	<div class="blog-head">
		<ul>
			<li><a href="<?= get_permalink($all_blogs_page_id) ?>"><?= pll__('all') ?></a></li>
			<?php wp_list_categories(
				[
					'orderby' => 'id',
					'hide_empty' => false,
					'title_li' => "",
					'current_category' => 1
				]
			) ?>
		</ul>
		<p class="search-blog"> <i class="iconsax" icon-name="search-normal-2"></i><input placeholder="<?= pll__('search') ?>" /> </p>
	</div>

	<div class="blog-main">
		<?php
		if ($selected_blog) {
			if (count(array_filter($selected_blog)) > 0) {
				foreach ($selected_blog as  $blog_id) {
					get_template_part('/templates/components/cards/blogs', '2', ['post_id' => $blog_id]);
				}
			}
		} else {
			while ($first_blogs->have_posts()) {
				$first_blogs->the_post();
				$post_id = get_the_ID();
				get_template_part('/templates/components/cards/best', 'blog', ['post_id' => $post_id]);
			}
		}
		?>
		<!-- <?php while ($first_blogs->have_posts()) {
					$first_blogs->the_post();
					$post_id = get_the_ID();
					get_template_part('/templates/components/cards/blogs', '2', ['post_id' => $post_id]);
				}
				?> -->
		<?php wp_reset_postdata() ?>
	</div>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php
			while ($slider_blogs->have_posts()) {
				$slider_blogs->the_post();
				$post_id = get_the_ID();
				get_template_part('/templates/components/cards/blog', 'slider', ['post_id' => $post_id]);
			}
			?>
			<?php wp_reset_postdata() ?>
		</div>
		<div class="swiper-pagination"></div>

	</div>
	<div class="best-blog even-columns">
		<?php while ($second_blogs->have_posts()) {
			$second_blogs->the_post();
			$post_id = get_the_ID();
			get_template_part('/templates/components/cards/blogs', 'card', ['post_id' => $post_id]);
		}
		?>
		<?php wp_reset_postdata() ?>
	</div>
	<div class="more">
		<a href="<?= get_permalink($all_blogs_page_id) ?>"><?= pll__('view-all') ?></a>
	</div>
</main>
<?php get_footer() ?>