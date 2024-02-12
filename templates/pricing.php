<?php /* Template Name: Pricing */?>

<?php get_header() ?>

<main class="pricing">

	<div class="pricing-image">

	</div>

	<div class="pricing-wrapper">

		<section class="pricing-content">
			<div class="pricing-content-title">
				<?php the_title() ?>
			</div>
			<div class="pricing-content-description">
				<?php the_content() ?>
			</div>
		</section>

		<section class="pricing-form-wrapper">
			<form action=""
				  class="pricing-form">


				<div class="input-radio-group">
					<span class="input-label">
						<?php pll_e( 'شخصیت' ) ?>
					</span>

					<label for="legalCharacter">
						<input type="radio"
							   id="legalCharacter"
							   name="character">
						<?php pll_e( 'حقوقی' ) ?>

					</label>

					<label for="realCharacter">
						<input type="radio"
							   id="realCharacter"
							   name="character">
						<?php pll_e( 'حقیقی' ) ?>
					</label>
				</div>

			</form>
		</section>

	</div>

</main>

<?php get_footer() ?>