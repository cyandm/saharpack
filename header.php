<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>
</head>


<!-- if change position header -->
<?php
$backabsolute = false;
isset($args['backabsolute']) && $backabsolute = $args['backabsolute'];
?>

<body <?php body_class() ?>>
	<?php wp_body_open() ?>

	<header class="header">

		<section class="container <?php echo $backabsolute == true ? 'backabsolute' : '' ?>">

			<?php get_template_part('/templates/components/mobile-menu') ?>


			<div class="right-header">

				<div class="right-header__logo">
					<?php the_custom_logo(); ?>
				</div>

				<div class="right-header__menu">
					<?php wp_nav_menu(
						[
							'theme_location' => 'header',
							'menu_class' => 'header-menu',
						]
					); ?>
				</div>

			</div>

			<div class="left-header">

				<?php if (!is_user_logged_in()) : ?>
					<a href="/login" class="left-header__login-btn">
						<i class="iconsax" icon-name="login-2"></i>
					</a>
				<?php endif ?>

				<?php if (is_user_logged_in()) : ?>
					<div class="left-header__login-btn has-children menu-item-has-children">
						<i class="iconsax" icon-name="user-2"></i>

						<div class="children sub-menu">
							<div>
								<ul>
									<li>
										<a href="#">
											<?php pll_e("پیگیری سفارش") ?>
										</a>
									</li>

									<li>
										<a href="<?= wp_logout_url(); ?>">
											<?php pll_e("خروج از حساب") ?>
										</a>
									</li>
								</ul>
							</div>
						</div>

					</div>

				<?php endif ?>

				<a href="/?s" class="left-header__search-btn">
					<i class="iconsax" icon-name="search-normal-2"></i>
				</a>

				<a href="<?= esc_url(wc_get_cart_url()); ?>" class="left-header__cart-btn btn" variant="primary">
					<i class="iconsax" icon-name="shopping-cart"></i>
					<span><?php pll_e('سبد خرید'); ?></span>
				</a>

			</div>

		</section>


	</header>

	<body <?php body_class() ?>>
		<?php wp_body_open() ?>