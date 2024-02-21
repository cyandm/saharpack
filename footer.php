<?php
$front_page_id = get_option('page_on_front');
$social = get_field('social_media', $front_page_id);
$phone = get_field("phone", $front_page_id);
$logo = get_field('logo', $front_page_id);
$enamad = get_field('enamad', $front_page_id);

if (isset($social)) {
	$whats_app_link = $social['whats_app'];
	$instagram_link = $social['instagram'];
	$pintrest_link = $social['pintrest'];
}

if (isset($logo)) {
	$img_logo = $logo;
}

if (isset($phone)) {
	$phone_number_1 = $phone['phone_1'];
	$phone_number_2 = $phone['phone_2'];
	$phone_number_3 = $phone['phone_3'];
}


if (isset($enamad)) {
	$enamad_img = $enamad;
}

?>


<footer>

	<section class="footer">

		<div class="container">

			<div class="footer__items">

				<div class="footer__items__right">

					<?php wp_nav_menu([
						'theme_location' => 'footer_col_1',
						'menu_class' => 'f-menu'
					]) ?>

					<?php wp_nav_menu([
						'theme_location' => 'footer_col_2',
						'menu_class' => 'f-menu'
					]) ?>

					<div class="footer__items__right__social-media">

						<?php wp_nav_menu([
							'theme_location' => 'footer_col_3',
							'menu_class' => 'f-menu'
						]) ?>

						<?php if (isset($phone_number_1)) : ?>

							<a href="<?= 'tel:' . $phone_number_1; ?>" class="phone-number">
								<?= $phone_number_1 ?>
							</a>

						<?php endif; ?>

						<?php if (isset($phone_number_2)) : ?>

							<a href="<?= 'tel:' . $phone_number_2; ?>" class="phone-number">
								<?= $phone_number_2 ?>
							</a>

						<?php endif; ?>

						<?php if (isset($phone_number_3)) : ?>

							<a href="<?= 'tel:' . $phone_number_3; ?>" class="phone-number">
								<?= $phone_number_3 ?>
							</a>

						<?php endif; ?>

						<div class="footer__items__right__social-media__items">

							<?php if (isset($whats_app_link)) : ?>

								<a href="<?= $whats_app_link['url']; ?>" class="social-icon">
									<i class="whatsapp"><?php get_template_part("/assets/img/svg/whatsapp") ?></i>
								</a>

							<?php endif; ?>

							<?php if (isset($instagram_link)) : ?>

								<a href="<?= $instagram_link['url']; ?>" class="social-icon">
									<i class="instagram"><?php get_template_part("/assets/img/svg/instagram") ?></i>
								</a>

							<?php endif; ?>

							<?php if (isset($pintrest_link)) : ?>

								<a href="<?= $pintrest_link['url']; ?>" class="social-icon">
									<i class="pintrest"><?php get_template_part("/assets/img/svg/pintrest") ?></i>
								</a>

							<?php endif; ?>

						</div>


					</div>

				</div>



				<div class="footer__items__left">

					<div class="enamad">
						<?= $enamad_img ?>
					</div>

					<?= wp_get_attachment_image($img_logo, 'full') ?>
				</div>

			</div>

		</div>

	</section>

</footer>

<div class="wp-scripts">
	<?php wp_footer() ?>
</div>

</body>

</html>