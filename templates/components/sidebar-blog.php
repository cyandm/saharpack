<?php get_header() ?>

<p class="search-blog"> <i class="iconsax"
	   icon-name="search-normal-2"></i><input placeholder="جستجو" /></p>

<h4 class="mb-hide">دسته بندی ها </h4>
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
	<h4> پیشنهاد برای ما</h4>

	<?php
	$new_blogs = new WP_Query( [ 
		'post_type' => 'post',
		'posts_per_page' => 3,
		'post__not_in' => [ get_the_ID() ],
	] );
	?>

	<div class="blogs">
		<?php
		while ( $new_blogs->have_posts() ) {
			$new_blogs->the_post();
			$post_id = get_the_ID();
			get_template_part( '/templates/components/cards/blogs', 'card', [ 'post_id' => $post_id ] );
		}
		?>
	</div>
	<?php wp_reset_postdata() ?>

</div>
<?php get_footer() ?>