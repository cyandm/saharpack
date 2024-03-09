<?php
get_header() ?>
<?php
$author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));
$post_id = get_queried_object_id();

$blog = [
	'post_type' => 'page',
	'fields' => 'ids',
	'nopaging' => true,
	'meta_key' => '_wp_page_template',
	'meta_value' => 'templates/blog.php'
];
$blog_link = get_permalink(get_posts($blog)[0]);
?>
<main>
	<?php if (function_exists('rank_math_the_breadcrumbs')) : ?>
		<section class="breadcrumb-wrapper">
			<div class="breadcrumb-product container">
				<?php rank_math_the_breadcrumbs(); ?>
			</div>
			<i class="divider"></i>
		</section>
	<?php endif ?>
	<section class="container blog-archive">
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
			<p class="search-blog"> <i class="iconsax" icon-name="search-normal-2"></i><input placeholder=<?= pll__('search') ?> /></p>
		</div>

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
			<a href="<?= $blog_link ?>"><?= pll__('view-all') ?></a>
		</div>
	</section>
</main>
<?php get_footer() ?>