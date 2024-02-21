<?php
/*Template Name: Blog */
get_header() ?>
<?php
$author_name = get_the_author_meta( 'display_name', get_post_field( 'post_author', get_the_ID() ) );
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

		<p class="search-blog"> <i class="iconsax"
			   icon-name="search-normal-2"></i><input placeholder="جستجو" /></p>

	</div>

	<!-- @TODO breadcrumb change to rank math-->

	<hr />


	<!-- Swiper JS -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper( ".mySwiper", {
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		} );
	</script>
	<div class="blog-main">


		<?php
		$new_blogs = new WP_Query( [ 
			'post_type' => 'post',
			'posts_per_page' => 4,
			'post__not_in' => [ get_the_ID() ],
		] );
		?>

		<?php
		while ( $new_blogs->have_posts() ) {
			$new_blogs->the_post();
			$post_id = get_the_ID();
			get_template_part( '/templates/components/cards/blogs', '2', [ 'post_id' => $post_id ] );
		}
		?>
		<?php wp_reset_postdata() ?>
	</div>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php
			while ( $new_blogs->have_posts() ) {
				$new_blogs->the_post();
				$post_id = get_the_ID();
				get_template_part( '/templates/components/cards/blog', 'slider', [ 'post_id' => $post_id ] );
			}
			?>
			<?php wp_reset_postdata() ?>

		</div>
	</div>

	<div class="blogs-2">

		<?php
		$new_blogs = new WP_Query( [ 
			'post_type' => 'post',
			'posts_per_page' => 6,
			'post__not_in' => [ get_the_ID() ],
		] );
		?>


		<?php
		while ( $new_blogs->have_posts() ) {
			$new_blogs->the_post();
			$post_id = get_the_ID();
			get_template_part( '/templates/components/cards/blogs', 'card', [ 'post_id' => $post_id ] );
		}
		?>
		<?php wp_reset_postdata() ?>
	</div>
	<div class="more">
		<a href="#"> مشاهده همه </a>
	</div>
</main>

<?php get_footer() ?>