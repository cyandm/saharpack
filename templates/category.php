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
			<li> <a href="#"><?= pll__('all') ?></a></li>
			<?php wp_list_categories(
				[
					'orderby' => 'id',
					'hide_empty' => false,
					'title_li' => "",
				]
			) ?>
		</ul>
		<p class="search-blog"> <i class="iconsax" icon-name="search-normal-2"></i><input placeholder=<?= pll__('search') ?> /></p>
	</div>
	<!-- @TODO breadcrumb change to rank math-->
	<hr />
	<div class="best-blog">
		<?php
		while (have_posts()) {
			the_post();
			get_template_part('/templates/components/cards/blogs', 'card', []);
		}
		?>
		<?php wp_reset_postdata() ?>
	</div>

</main>
<?php get_footer() ?>