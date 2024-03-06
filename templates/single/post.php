<?php get_header() ?>
<?php
$author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));


$post_id = get_queried_object_id();

function custom_share_buttons()
{

	global $post;

	$post_url = urlencode(get_permalink());

	$post_title = urlencode(get_the_title());

	$linkedin_url = 'LinkedIn Login, Sign in | LinkedIn' . $post_url . '&title=' . $post_title;

	echo '<div class="custom-share-buttons">';

	echo '<a href="' . $linkedin_url . '" target="_blank" class="custom-share-button custom-share-button-linkedin"><i class="iconsax"
	icon-name="share"></i></a>';

	echo '</div>';
}

$new_blogs = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => 4,
	'post__not_in' => [get_the_ID()],
]);

?>


<main class="container single-post-page">

	<div class="breadcrumb-wrapper">
		<div class="breadcrumb-product container">
			<?php if (function_exists('rank_math_the_breadcrumbs'))
				rank_math_the_breadcrumbs(); ?>
		</div>
		<i class="divider"></i>
	</div>

	<div class="single-blog">
		<div class="sidebar">

			<?php
			get_template_part(
				'templates/components/sidebar-blog',
				null,
			);
			?>
		</div>

		<div class="post-main">
			<div class="post-images">

				<?php $thumbnail_id = get_post_thumbnail_id($post_id); ?>
				<?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>

			</div>
			<div>
				<div class="postmeta">
					<div class="postmeta-r mb-hide">
						<span class="meta-date meta"> <i class="iconsax" icon-name="calendar-2"></i><?= get_the_date() ?></span>

						<span class="meta-author meta"><i class="iconsax" icon-name="edit-1"></i><?= $author_name ?></span>
					</div>
					<div class="postmeta-l">

						<span class="meta-comment meta"><i class="iconsax" icon-name="message-dots"></i><?php echo get_comments_number($post_id); ?></span>
						<span class="author-single-blog meta"><i class="iconsax" icon-name="heart"></i><?= $author_name ?></span>
						<span class="author-single-blog meta"> <?php custom_share_buttons(); ?></span>
					</div>
				</div>
				<h1><?= get_the_title($post_id) ?></h1>
				<div class="mb-meta mb-flex">
					<span class="meta-date"> <i class="iconsax" icon-name="calendar-2"></i><?= get_the_date() ?></span>

					<span class="meta-author"><i class="iconsax" icon-name="edit-1"></i><?= $author_name ?></span>
				</div>
			</div>
			<div class="post-content"><?php the_content() ?></div>

			<div class="blog-comments">
				<div class="single-comment-number">
					<h6><span> <?php echo get_comments_number($post_id); ?></span> دیدگاه</h6>
				</div>
				<?php echo comments_template();	?>
			</div>

		</div>

		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php
				while ($new_blogs->have_posts()) {
					$new_blogs->the_post();
					$post_id = get_the_ID();
					get_template_part('/templates/components/cards/blog', 'slider', ['post_id' => $post_id]);
				}
				?>
				<?php wp_reset_postdata() ?>

			</div>
		</div>
	</div>

</main>

<?php get_footer() ?>