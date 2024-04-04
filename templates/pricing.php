<?php /* Template Name: Pricing */ ?>

<?php

$thumb_id = get_post_thumbnail_id();

?>


<?php get_header() ?>

<main>
	<div class="container pricing">
		<div class="pricing-image">
			<div class="img-wrapper">
				<?= wp_get_attachment_image($thumb_id, 'full') ?>
			</div>
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

			<section class="pricing-form-wrapper w-full">
				<form enctype="multipart/form-data" id="priceForm" class="pricing-form">


					<div class="input-radio-group">
						<span class="input-label">
							<?php pll_e('personality') ?>
						</span>

						<div class="input-radio-wrapper">
							<label for="legalCharacter">
								<input type="radio" required id="legalCharacter" value="<?php pll_e('legal') ?>" name="character">
								<?php pll_e('legal') ?>

							</label>

							<label for="realCharacter">
								<input type="radio" required id="realCharacter" value="<?php pll_e('real') ?>" name="character">
								<?php pll_e('real') ?>
							</label>
						</div>

					</div>

					<div>
						<span class="input-label">
							<?php pll_e('basic-information') ?>
						</span>

						<div class="input-group">
							<input class="w-half input-primary" required type="text" name="firstName" id="firstName" placeholder="<?php pll_e('name') ?>">

							<input class="w-half input-primary" required type="text" name="lastName" id="lastName" placeholder="<?php pll_e('last-name') ?>">

							<input class="w-half input-primary" required type="text" name="companyName" id="companyName" placeholder="<?php pll_e('company-or-organization-name') ?>">

							<input class="w-half input-primary" required type="text" name="position" id="position" placeholder="<?php pll_e('side') ?>">

							<input class="w-half input-primary" required type="tel" name="phone" id="phone" placeholder="<?php pll_e('phone-number') ?>">

							<input class="w-half input-primary" required type="email" name="mail" id="mail" placeholder="<?php pll_e('email') ?>">


							<select name="introductionMethod" required id="introductionMethod" class="input-primary w-full">
								<option value="" selected><?= pll__('how-to-get-to-know-the-collection'); ?></option>
								<option value=<?= pll__('advertising'); ?>><?= pll__('advertising'); ?></option>
								<option value=<?= pll__('website'); ?>><?= pll__('website'); ?></option>
							</select>

							<input class="input-primary w-full" type="text" name="activity" id="activity" placeholder="<?php pll_e('field-of-activity') ?>">

							</input>

						</div>
					</div>

					<div>
						<span class="input-label">
							<?php pll_e('average-circulation-per-order') ?>
						</span>

						<input type="number" name="averageCirculation" class="input-primary w-full" placeholder="<?php pll_e('number') ?>">
					</div>

					<div class="input-radio-group">
						<span class="input-label">
							<?php pll_e('requested') ?>
						</span>

						<div class="input-radio-wrapper">
							<label for="contactExpert">
								<input type="radio" required id="contactExpert" value="<?php pll_e('request-an-expert-call') ?>" name="requestItem">
								<?php pll_e('request-an-expert-call') ?>

							</label>

							<label for="continue">
								<input type="radio" required id="continue" value="<?php pll_e('complete-the-inquiry-form') ?>" name="requestItem">
								<?php pll_e('complete-the-inquiry-form') ?>
							</label>

							<label for="sendFile">
								<input type="radio" required id="sendFile" value="<?php pll_e('send-file') ?>" name="requestItem">
								<?php pll_e('send-file') ?>
							</label>
						</div>

					</div>

					<div class="pricing-collapse" id="pricingCollapse" data-active="false">
						<div>
							<h4>
								<?php pll_e('the-desired-packaging-information-for-price-inquiry') ?>
							</h4>

							<div class="input-radio-group">
								<span class="input-label">
									<?php pll_e('box-structure') ?>
								</span>

								<div class="input-radio-wrapper">
									<label for="medicDoor">
										<input type="radio" id="medicDoor" value="<?php pll_e('medicine-door') ?>" name="boxStructure">
										<?php pll_e('medicine-door') ?>

									</label>

									<label for="bottomLock">
										<input type="radio" id="bottomLock" value="<?php pll_e('bottom-lock') ?>" name="boxStructure">
										<?php pll_e('bottom-lock') ?>
									</label>

									<label for="bottomLock">
										<input type="radio" id="bottomLock" value="<?php pll_e('bottom-lacquer') ?>" name="boxStructure">
										<?php pll_e('bottom-lacquer') ?>
									</label>

									<label for="other">
										<input type="radio" id="other" value="<?php pll_e('other') ?>" name="boxStructure">
										<?php pll_e('other') ?>
									</label>
								</div>

							</div>

							<div class="input-radio-group">
								<span class="input-label">
									<?php pll_e('type-of-cardboard') ?>
								</span>

								<div class="input-radio-wrapper">
									<label for="inderDoor">
										<input type="radio" id="inderDoor" value="<?php pll_e('inder-door') ?>" name="cardBoardType">
										<?php pll_e('inder-door') ?>

									</label>

									<label for="craft">
										<input type="radio" id="craft" value="<?php pll_e('craft') ?>" name="cardBoardType">
										<?php pll_e('craft') ?>
									</label>

									<label for="backGrey">
										<input type="radio" id="backGrey" value="<?php pll_e('back-grey') ?>" name="cardBoardType">
										<?php pll_e('back-grey') ?>
									</label>

									<label for="glass">
										<input type="radio" id="glass" value="<?php pll_e('glass') ?>" name="cardBoardType">
										<?php pll_e('glass') ?>
									</label>
								</div>

							</div>

							<div>
								<span class="input-label">
									<?php pll_e('cardboard-grammage') ?>
								</span>

								<input class="w-full input-primary" type="text" name="gramageCardBoard" id="gramageCardBoard" placeholder="<?php pll_e('type-here') ?>">
							</div>

							<div>
								<span class="input-label">
									<?php pll_e('box-dimensions') ?>
								</span>
								<div class="input-group input-group-even">
									<input class="input-primary" type="text" name="boxLength" id="boxLength" placeholder="<?php pll_e('length-(mm)') ?>">

									<input class="input-primary" type="text" name="boxWidth" id="boxWidth" placeholder="<?php pll_e('width-(mm)') ?>">

									<input class="input-primary" type="text" name="boxHeight" id="boxHeight" placeholder="<?php pll_e('height-(mm)') ?>">
								</div>
							</div>

							<div>
								<span class="input-label">
									<?php pll_e('blade-to-blade-dimensions') ?>
								</span>
								<div class="input-group input-group-even">
									<input class="input-primary" type="text" name="bladeLength" id="bladeLength" placeholder="<?php pll_e('length-(mm)') ?>">

									<input class="input-primary" type="text" name="bladeWidth" id="bladeWidth" placeholder="<?php pll_e('height-(mm)') ?>">
								</div>
							</div>

							<div class="input-radio-group">
								<span class="input-label">
									<?php pll_e('number-of-printing-colors') ?>
								</span>

								<div class="input-radio-wrapper">
									<label for="to4color">
										<input type="radio" id="to4color" value="<?php pll_e('up-to-4-colors') ?>" name="numberOfColor">
										<?php pll_e('up-to-4-colors') ?>

									</label>

									<label for="to6color">
										<input type="radio" id="to6color" value="<?php pll_e('up-to-6-colors') ?>" name="numberOfColor">
										<?php pll_e('up-to-6-colors') ?>
									</label>

									<label for="more6color">
										<input type="radio" id="more6color" value="<?php pll_e('more-than-6-colors') ?>" name="numberOfColor">
										<?php pll_e('more-than-6-colors') ?>
									</label>


								</div>

							</div>

							<div class="input-radio-group">
								<span class="input-label">
									<?php pll_e('type-of-printing-cover') ?>
								</span>

								<div class="input-radio-wrapper">
									<label for="vernie">
										<input type="radio" id="vernie" value="<?php pll_e('vernie') ?>" name="printCoverType">
										<?php pll_e('vernie') ?>

									</label>

									<label for="uv">
										<input type="radio" id="uv" value="<?php pll_e('UV') ?>" name="printCoverType">
										<?php pll_e('UV') ?>
									</label>

									<label for="matteCellophane">
										<input type="radio" id="matteCellophane" value="<?php pll_e('matte-cellophane') ?>" name="printCoverType">
										<?php pll_e('matte-cellophane') ?>
									</label>

									<label for="shinyCellophane">
										<input type="radio" id="shinyCellophane" value="<?php pll_e('shiny-cellophane') ?>" name="printCoverType">
										<?php pll_e('shiny-cellophane') ?>
									</label>

									<label for="uvAndVernie">
										<input type="radio" id="uvAndVernie" value="<?php pll_e('UV-+-vernie') ?>" name="printCoverType">
										<?php pll_e('UV-+-vernie') ?>
									</label>

									<label for="noCover">
										<input type="radio" id="noCover" value="<?php pll_e('no-cover') ?>" name="printCoverType">
										<?php pll_e('no-cover') ?>
									</label>


								</div>

							</div>

							<div class="input-radio-group">
								<span class="input-label">
									<?php pll_e('supplementary-printing-process') ?>
								</span>

								<div class="input-radio-wrapper">
									<label for="LocalUV">
										<input type="radio" id="LocalUV" value="<?php pll_e('topical-UV') ?>" name="additionalPrintingProcess">
										<?php pll_e('topical-UV') ?>

									</label>

									<label for="goldsmith">
										<input type="radio" id="goldsmith" value="<?php pll_e('goldsmith/silversmith') ?>" name="additionalPrintingProcess">
										<?php pll_e('goldsmith/silversmith') ?>
									</label>

									<label for="coloredFoil">
										<input type="radio" id="coloredFoil" value="<?php pll_e('colored-foil-smith') ?>" name="additionalPrintingProcess">
										<?php pll_e('colored-foil-smith') ?>
									</label>

									<label for="windowsPatch">
										<input type="radio" id="windowsPatch" value="<?php pll_e('windowspatch') ?>" name="additionalPrintingProcess">
										<?php pll_e('windowspatch') ?>
									</label>

									<label for="embassies">
										<input type="radio" id="embassies" value="<?php pll_e('embassies/highlighting') ?>" name="additionalPrintingProcess">
										<?php pll_e('embassies/highlighting') ?>
									</label>

								</div>

							</div>

							<div class="input-radio-group">
								<span class="input-label">
									<?php pll_e('connection') ?>
								</span>

								<div class="input-radio-wrapper">
									<label for="oneDot">
										<input type="radio" id="oneDot" value="<?php pll_e('lip-glue-/-one-dot') ?>" name="connection">
										<?php pll_e('lip-glue-/-one-dot') ?>

									</label>

									<label for="threeDots">
										<input type="radio" id="threeDots" value="<?php pll_e('three-dot') ?>" name="connection">
										<?php pll_e('three-dot') ?>
									</label>

									<label for="fourDots">
										<input type="radio" id="fourDots" value="<?php pll_e('four-dot') ?>" name="connection">
										<?php pll_e('four-dot') ?>
									</label>

									<label for="sixDots">
										<input type="radio" id="sixDots" value="<?php pll_e('six-dot') ?>" name="connection">
										<?php pll_e('six-dot') ?>
									</label>

								</div>

							</div>

							<div>
								<span class="input-label">
									<?php pll_e('minimum-circulation-per-order-(number)') ?>
								</span>

								<input class="w-full input-primary" type="text" name="minimumCirculation" id="minimumCirculation" placeholder="<?php pll_e('type-here') ?>">
							</div>

							<div>
								<span class="input-label">
									<?php pll_e('upload-file') ?>
								</span>

								<div class="input-file-wrapper w-full input-primary">
									<span class="input-file-text">
										<?php pll_e('attach-your-file') ?>
									</span>
									<i class="iconsax" icon-name="document-upload"></i>
									<input class="w-full input-primary" type="file" name="file" id="file">
								</div>

							</div>
						</div>
					</div>

					<div class="pricing-collapse-handle" id="pricingCollapseHandle">
						<?php pll_e('additional-information') ?>
						<i class="iconsax" icon-name="chevron-down"></i>
					</div>

					<div class="pricing-form-submit">
						<button class="btn" type="submit" variant="primary">
							<i class="iconsax" icon-name="send-2"></i>
							<?php pll_e('submit-request') ?>
						</button>
					</div>
				</form>
			</section>

		</div>



	</div>
</main>

<?php get_footer() ?>