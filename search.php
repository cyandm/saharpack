<?php
global $wp_query;

$radios = [
	[
		'name' => pll__('all'),
		'value' => 'default'
	],
	[
		'name' => pll__('products'),
		'value' => 'product'
	],
	[
		'name' => pll__('blogs'),
		'value' => 'post'
	],
]

?>

<?php get_header() ?>



<main id="searchPage">

	<div class="breadcrumb-wrapper">
		<div class="breadcrumb-product container">
			<?php if (function_exists('rank_math_the_breadcrumbs'))
				rank_math_the_breadcrumbs(); ?>
		</div>
		<!-- <i class="divider"></i> -->
	</div>

	<div class="search-bar ">
		<div class="search-bar__wrapper | container">
			<form action="<?= get_bloginfo('url') ?>" class="search-bar__form" id="searchPageForm">
				<div class="input-primary">
					<i class="iconsax" icon-name="search-normal-1"></i>
					<input placeholder="<?= pll__('search') ?>" type="text" id="searchPageInput" name="s" value="<?php the_search_query() ?>">
				</div>
				<div class="search-bar__radio-wrapper">
					<span class="search-bar__radio-title">
						<?= pll__('search-in') . ' :' ?>
					</span>
					<div class="input-radio-wrapper">
						<?php foreach ($radios as $radio) : ?>

							<label for="<?= $radio['value'] ?>">
								<input type="radio" class="input-radio" name="post_type" id="<?= $radio['value'] ?>" value="<?= $radio['value'] ?>">
								<?= $radio['name'] ?>

							</label>

						<?php endforeach; ?>
					</div>
				</div>
			</form>

			<div class="search-bar__result">
				<span id="foundPosts"><?= $wp_query->found_posts ?></span>
				<span><?= pll__('result') ?></span>
			</div>
		</div>
	</div>

	<div class="search-posts container" id="postsContainer">
		<?php
		if ($wp_query->have_posts()) :
			while ($wp_query->have_posts()) :
				$wp_query->the_post();

				get_template_part(
					'/templates/components/cards/search',
					null,
					['complete' => true]
				);
			endwhile;
		else :
			echo '<div class="empty-search-result">';
			pll_e('no-results-found-for-empty-frame');
			echo '</div>';

		endif;
		?>
	</div>

</main>

<?php get_footer() ?>