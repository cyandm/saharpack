<?php
/*Template Name: Category */
get_header() ?>
<?php
$author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));
$post_id = get_queried_object_id();
?>
<main class="container blog-archive">
	<div class="blog-head">
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
		<p class="search-blog"> <i class="iconsax" icon-name="search-normal-2"></i><input placeholder="جستجو" /></p>
	</div>
	<!-- @TODO breadcrumb change to rank math-->
	<hr />
	<div class="blogs-2">
		<?php
		while (have_posts()) {
			the_post();
			$post_id = get_the_ID();
			get_template_part('/templates/components/cards/blogs', 'card', ['post_id' => $post_id]);
		}
		?>
		<?php wp_reset_postdata() ?>
	</div>
	<div class="more">
		<a href="#"> مشاهده همه </a>
	</div>
</main>
<?php get_footer() ?>