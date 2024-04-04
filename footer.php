<?php
$front_page_id = get_option('page_on_front');
$social = get_field('social_media', $front_page_id);
$phone = get_field("phone", $front_page_id);
$logo = get_field('logo', $front_page_id);
$enamad = get_field('enamad', $front_page_id);

if (!empty($social) && count(array_filter($social)) > 0) {
	$whats_app_link = $social['whats_app'];
	$instagram_link = $social['instagram'];
	$pintrest_link = $social['pintrest'];
}


if (!empty($logo)) {
	$img_logo = $logo;
}

if (!empty($phone)) {
	$phone_number_1 = $phone['phone_1'];
	$phone_number_2 = $phone['phone_2'];
	$phone_number_3 = $phone['phone_3'];
}


if (!empty($enamad)) {
	$enamad_img = $enamad;
}

?>


<footer>

	<div class="footer-wrapper">

		<section class="footer">

			<div class="container">

				<div class="footer__items">

					<button id="scrolltotop">
						<i class="iconsax" icon-name="arrow-up"></i>
					</button>

					<div class="footer__items__right">

						<?php wp_nav_menu([
							'theme_location' => 'footer_col_1',
							'menu_class' => 'f-menu'
						]) ?>

						<?php wp_nav_menu([
							'theme_location' => 'footer_col_2',
							'menu_class' => 'f-menu'
						]) ?>

						<?php wp_nav_menu([
							'theme_location' => 'footer_col_3',
							'menu_class' => 'f-menu'
						]) ?>


						<?php wp_nav_menu([
							'theme_location' => 'footer_col_4',
							'menu_class' => 'f-menu'
						]) ?>

						<div class="footer__items__right__social-media">

							<?php wp_nav_menu([
								'theme_location' => 'footer_col_5',
								'menu_class' => 'f-menu'
							]) ?>

							<?php if (!empty($phone['phone_1'])) : ?>

								<a href="<?= 'tel:' . $phone['phone_1']; ?>" class="phone-number">
									<?= $phone['phone_1'] ?>
								</a>

							<?php endif; ?>

							<?php if (!empty($phone['phone_2'])) : ?>

								<a href="<?= 'tel:' . $phone['phone_2']; ?>" class="phone-number">
									<?= $phone['phone_2'] ?>
								</a>

							<?php endif; ?>

							<?php if (!empty($phone['phone_3'])) : ?>

								<a href="<?= 'tel:' . $phone['phone_3']; ?>" class="phone-number">
									<?= $phone['phone_3'] ?>
								</a>

							<?php endif; ?>

						</div>

					</div>

					<div class="footer__items__left">

						<?php if (isset($enamad_img)) : ?>

							<div class="enamad">
								<?= $enamad_img ?>
							</div>

						<?php endif ?>

					</div>

					<?php if (!empty($social["whats_app"])   || !empty($social["instagram"])  || !empty($social["pintrest"])) : ?>

						<div class="footer__items__right__social-media__items">

							<?php if (!empty($social["whats_app"])) : ?>

								<a href="<?= $social["whats_app"]; ?>" class="social-icon">
									<i class="whatsapp"><?php get_template_part("/assets/img/svg/whatsapp") ?></i>
								</a>

							<?php endif; ?>

							<?php if (!empty($social["instagram"])) : ?>

								<a href="<?= $social["instagram"]; ?>" class="social-icon">
									<i class="instagram"><?php get_template_part("/assets/img/svg/instagram") ?></i>
								</a>

							<?php endif; ?>

							<?php if (!empty($social["pintrest"])) : ?>

								<a href="<?= $social["pintrest"]; ?>" class="social-icon">
									<i class="pintrest"><?php get_template_part("/assets/img/svg/pintrest") ?></i>
								</a>

							<?php endif; ?>

						</div>

					<?php endif; ?>

				</div>

			</div>

		</section>

		<section class="footer paralax">

			<div class="container">

				<div class="footer__items">


					<button id="scrolltotop">
						<i class="iconsax" icon-name="arrow-up"></i>
					</button>

					<div class="footer__items__left">

						<?php if (isset($img_logo)) : ?>

							<?= wp_get_attachment_image($img_logo, 'full') ?>

						<?php endif ?>

					</div>

				</div>

			</div>

		</section>
	</div>
</footer>

<div class="wp-scripts">
	<?php wp_footer() ?>
</div>

</body>

</html>