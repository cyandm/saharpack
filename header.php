<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>
	<?php wp_body_open() ?>

	<header class="header">

		<section class="container">

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


				<a href="#" class="left-header__login-btn">
					<i class="iconsax" icon-name="login-2"></i>
				</a>

				<a href="#" class="left-header__search-btn">
					<i class="iconsax" icon-name="search-normal-2"></i>
				</a>

				<a href="#" class="left-header__cart-btn btn" variant="primary">
					<i class="iconsax" icon-name="shopping-cart"></i>
					سبد خرید
				</a>

			</div>

		</section>


	</header>