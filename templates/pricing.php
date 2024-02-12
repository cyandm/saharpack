<?php /* Template Name: Pricing */?>

<?php

$thumb_id = get_post_thumbnail_id();

?>


<?php get_header() ?>

<main class="pricing container">

	<div class="pricing-image">
		<div class="img-wrapper">
			<?= wp_get_attachment_image( $thumb_id, 'full' ) ?>
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
			<form action=""
				  class="pricing-form">


				<div class="input-radio-group">
					<span class="input-label">
						<?php pll_e( 'شخصیت' ) ?>
					</span>

					<div class="input-radio-wrapper">
						<label for="legalCharacter">
							<input type="radio"
								   required
								   id="legalCharacter"
								   value="legalCharacter"
								   name="character">
							<?php pll_e( 'حقوقی' ) ?>

						</label>

						<label for="realCharacter">
							<input type="radio"
								   required
								   id="realCharacter"
								   value="realCharacter"
								   name="character">
							<?php pll_e( 'حقیقی' ) ?>
						</label>
					</div>

				</div>

				<div>
					<span class="input-label">
						<?php pll_e( 'اطلاعات اولیه' ) ?>
					</span>

					<div class="input-group">
						<input class="w-half input-primary"
							   required
							   type="text"
							   name="firstName"
							   id="firstName"
							   placeholder="<?php pll_e( 'نام' ) ?>">

						<input class="w-half input-primary"
							   required
							   type="text"
							   name="lastName"
							   id="lastName"
							   placeholder="<?php pll_e( 'نام خانوادگی' ) ?>">

						<input class="w-half input-primary"
							   required
							   type="text"
							   name="companyName"
							   id="companyName"
							   placeholder="<?php pll_e( 'نام شرکت یا سازمان' ) ?>">

						<input class="w-half input-primary"
							   required
							   type="text"
							   name="position"
							   id="position"
							   placeholder="<?php pll_e( 'سمت' ) ?>">

						<input class="w-half input-primary"
							   required
							   type="tel"
							   name="phone"
							   id="phone"
							   placeholder="<?php pll_e( 'شماره همراه' ) ?>">

						<input class="w-half input-primary"
							   required
							   type="email"
							   name="mail"
							   id="mail"
							   placeholder="<?php pll_e( 'آدرس ایمیل' ) ?>">


						<select name="introductionMethod"
								id="introductionMethod"
								class="input-primary w-full">
							<option value="ads">تبلیغات</option>
							<option value="website">وبسایت</option>
						</select>

						<input class="input-primary w-full"
							   type="text"
							   name="activity"
							   id="activity"
							   placeholder="<?php pll_e( 'حوزه فعالیت' ) ?>">

						</input>

					</div>
				</div>

				<div>
					<span class="input-label">
						<?php pll_e( 'متوسط تیراژ در هر نوبت سفارش گذاری' ) ?>
					</span>

					<input type="number"
						   class="input-primary w-full"
						   placeholder="<?php pll_e( 'تعداد' ) ?>">
				</div>

				<div class="input-radio-group">
					<span class="input-label">
						<?php pll_e( 'مورد درخواست' ) ?>
					</span>

					<div class="input-radio-wrapper">
						<label for="contactExpert">
							<input type="radio"
								   required
								   id="contactExpert"
								   value="contactExpert"
								   name="requestItem">
							<?php pll_e( 'درخواست تماس کارشناس' ) ?>

						</label>

						<label for="continue">
							<input type="radio"
								   required
								   id="continue"
								   value="continue"
								   name="requestItem">
							<?php pll_e( 'تکمیل ادامه فرم استعلام' ) ?>
						</label>

						<label for="sendFile">
							<input type="radio"
								   required
								   id="sendFile"
								   value="sendFile"
								   name="requestItem">
							<?php pll_e( 'ارسال فایل' ) ?>
						</label>
					</div>

				</div>

				<div class="pricing-collapse"
					 id="pricingCollapse"
					 data-active="false">
					<div>
						<h4>
							<?php pll_e( 'اطلاعات بسته بندی مورد نظر جهت استعلام قیمت ' ) ?>
						</h4>

						<div class="input-radio-group">
							<span class="input-label">
								<?php pll_e( 'ساختار جعبه' ) ?>
							</span>

							<div class="input-radio-wrapper">
								<label for="medicDoor">
									<input type="radio"
										   required
										   id="medicDoor"
										   value="medicDoor"
										   name="boxStructure">
									<?php pll_e( 'درب دارویی' ) ?>

								</label>

								<label for="bottomLock">
									<input type="radio"
										   required
										   id="bottomLock"
										   value="bottomLock"
										   name="boxStructure">
									<?php pll_e( 'ته قفلی' ) ?>
								</label>

								<label for="bottomLock">
									<input type="radio"
										   required
										   id="bottomLock"
										   value="bottomLock"
										   name="boxStructure">
									<?php pll_e( 'لاک باتم' ) ?>
								</label>

								<label for="other">
									<input type="radio"
										   required
										   id="other"
										   value="other"
										   name="boxStructure">
									<?php pll_e( 'سایر' ) ?>
								</label>
							</div>

						</div>

						<div class="input-radio-group">
							<span class="input-label">
								<?php pll_e( 'نوع مقوا' ) ?>
							</span>

							<div class="input-radio-wrapper">
								<label for="inderDoor">
									<input type="radio"
										   required
										   id="inderDoor"
										   value="inderDoor"
										   name="cardBoardType">
									<?php pll_e( 'ایندربورد' ) ?>

								</label>

								<label for="craft">
									<input type="radio"
										   required
										   id="craft"
										   value="craft"
										   name="cardBoardType">
									<?php pll_e( 'کرافت' ) ?>
								</label>

								<label for="backGrey">
									<input type="radio"
										   required
										   id="backGrey"
										   value="backGrey"
										   name="cardBoardType">
									<?php pll_e( 'پشت طوسی' ) ?>
								</label>

								<label for="glass">
									<input type="radio"
										   required
										   id="glass"
										   value="glass"
										   name="cardBoardType">
									<?php pll_e( 'گلاسه' ) ?>
								</label>
							</div>

						</div>

						<div>
							<span class="input-label">
								<?php pll_e( 'گرماژ مقوا' ) ?>
							</span>

							<input class="w-full input-primary"
								   required
								   type="text"
								   name="gramageCardBoard"
								   id="gramageCardBoard"
								   placeholder="<?php pll_e( 'اینجا تایپ کنید' ) ?>">
						</div>

						<div>
							<span class="input-label">
								<?php pll_e( 'ابعاد جعبه' ) ?>
							</span>
							<div class="input-group input-group-even">
								<input class="input-primary"
									   required
									   type="text"
									   name="boxLength"
									   id="boxLength"
									   placeholder="<?php pll_e( 'طول (میلیمتر)' ) ?>">

								<input class="input-primary"
									   required
									   type="text"
									   name="boxWidth"
									   id="boxWidth"
									   placeholder="<?php pll_e( 'عرض (میلیمتر)' ) ?>">

								<input class="input-primary"
									   required
									   type="text"
									   name="boxHeight"
									   id="boxHeight"
									   placeholder="<?php pll_e( 'ارتفاع (میلیمتر)' ) ?>">
							</div>
						</div>

						<div>
							<span class="input-label">
								<?php pll_e( 'ابعاد تیغ به تیغ' ) ?>
							</span>
							<div class="input-group input-group-even">
								<input class="input-primary"
									   required
									   type="text"
									   name="bladeLength"
									   id="bladeLength"
									   placeholder="<?php pll_e( 'طول (میلیمتر)' ) ?>">

								<input class="input-primary"
									   required
									   type="text"
									   name="bladeWidth"
									   id="bladeWidth"
									   placeholder="<?php pll_e( 'عرض (میلیمتر)' ) ?>">
							</div>
						</div>

						<div class="input-radio-group">
							<span class="input-label">
								<?php pll_e( 'تعداد رنگ چاپ' ) ?>
							</span>

							<div class="input-radio-wrapper">
								<label for="to4color">
									<input type="radio"
										   required
										   id="to4color"
										   value="to4color"
										   name="numberOfColor">
									<?php pll_e( 'تا 4 رنگ' ) ?>

								</label>

								<label for="to6color">
									<input type="radio"
										   required
										   id="to6color"
										   value="to6color"
										   name="numberOfColor">
									<?php pll_e( 'تا 6 رنگ' ) ?>
								</label>

								<label for="more6color">
									<input type="radio"
										   required
										   id="more6color"
										   value="more6color"
										   name="numberOfColor">
									<?php pll_e( 'بیش از 6 رنگ' ) ?>
								</label>


							</div>

						</div>

						<div class="input-radio-group">
							<span class="input-label">
								<?php pll_e( 'نوع پوشش چاپ' ) ?>
							</span>

							<div class="input-radio-wrapper">
								<label for="vernie">
									<input type="radio"
										   required
										   id="vernie"
										   value="vernie"
										   name="printCoverType">
									<?php pll_e( 'ورنی' ) ?>

								</label>

								<label for="uv">
									<input type="radio"
										   required
										   id="uv"
										   value="uv"
										   name="printCoverType">
									<?php pll_e( 'یووی' ) ?>
								</label>

								<label for="matteCellophane">
									<input type="radio"
										   required
										   id="matteCellophane"
										   value="matteCellophane"
										   name="printCoverType">
									<?php pll_e( 'سلفون مات' ) ?>
								</label>

								<label for="shinyCellophane">
									<input type="radio"
										   required
										   id="shinyCellophane"
										   value="shinyCellophane"
										   name="printCoverType">
									<?php pll_e( 'سلفون براق' ) ?>
								</label>

								<label for="uvAndVernie">
									<input type="radio"
										   required
										   id="uvAndVernie"
										   value="uvAndVernie"
										   name="printCoverType">
									<?php pll_e( 'یووی + ورنی' ) ?>
								</label>

								<label for="noCover">
									<input type="radio"
										   required
										   id="noCover"
										   value="noCover"
										   name="printCoverType">
									<?php pll_e( 'پوشش ندارد' ) ?>
								</label>


							</div>

						</div>

						<div class="input-radio-group">
							<span class="input-label">
								<?php pll_e( 'فرآیند تکمیلی چاپ' ) ?>
							</span>

							<div class="input-radio-wrapper">
								<label for="LocalUV">
									<input type="radio"
										   required
										   id="LocalUV"
										   value="LocalUV"
										   name="additionalPrintingProcess">
									<?php pll_e( 'یووی موضعی' ) ?>

								</label>

								<label for="goldsmith">
									<input type="radio"
										   required
										   id="goldsmith"
										   value="goldsmith"
										   name="additionalPrintingProcess">
									<?php pll_e( 'طلاکوب/ نقره کوب' ) ?>
								</label>

								<label for="coloredFoil">
									<input type="radio"
										   required
										   id="coloredFoil"
										   value="coloredFoil"
										   name="additionalPrintingProcess">
									<?php pll_e( 'فویل کوبی رنگی' ) ?>
								</label>

								<label for="windowsPatch">
									<input type="radio"
										   required
										   id="windowsPatch"
										   value="windowsPatch"
										   name="additionalPrintingProcess">
									<?php pll_e( 'ویندوپچ' ) ?>
								</label>

								<label for="embassies">
									<input type="radio"
										   required
										   id="embassies"
										   value="embassies"
										   name="additionalPrintingProcess">
									<?php pll_e( 'امباس/برجسته سازی' ) ?>
								</label>

							</div>

						</div>

						<div class="input-radio-group">
							<span class="input-label">
								<?php pll_e( 'اتصال' ) ?>
							</span>

							<div class="input-radio-wrapper">
								<label for="oneDot">
									<input type="radio"
										   required
										   id="oneDot"
										   value="oneDot"
										   name="connection">
									<?php pll_e( 'لب چسب / یک نقطه' ) ?>

								</label>

								<label for="threeDots">
									<input type="radio"
										   required
										   id="threeDots"
										   value="threeDots"
										   name="connection">
									<?php pll_e( 'سه نقطه' ) ?>
								</label>

								<label for="fourDots">
									<input type="radio"
										   required
										   id="fourDots"
										   value="fourDots"
										   name="connection">
									<?php pll_e( 'چهار نقطه' ) ?>
								</label>

								<label for="sixDots">
									<input type="radio"
										   required
										   id="sixDots"
										   value="sixDots"
										   name="connection">
									<?php pll_e( 'شش نقطه' ) ?>
								</label>

							</div>

						</div>

						<div>
							<span class="input-label">
								<?php pll_e( 'حداقل تیراژ در هر نوبت سفارش گذاری (عدد)' ) ?>
							</span>

							<input class="w-full input-primary"
								   required
								   type="text"
								   name="minimumCirculation"
								   id="minimumCirculation"
								   placeholder="<?php pll_e( 'اینجا تایپ کنید' ) ?>">
						</div>

						<div>
							<span class="input-label">
								<?php pll_e( 'آپلود فایل' ) ?>
							</span>

							<div class="input-file-wrapper w-full input-primary">
								<span class="input-file-text">
									<?php pll_e( 'فایل خود را پیوست کنید' ) ?>
								</span>
								<i class="iconsax"
								   icon-name="document-upload"></i>
								<input class="w-full input-primary"
									   required
									   type="file"
									   name="file"
									   id="file">
							</div>

						</div>
					</div>
				</div>

				<div class="pricing-collapse-handle"
					 id="pricingCollapseHandle">
					<?php pll_e( 'اطلاعات تکمیلی' ) ?>
					<i class="iconsax"
					   icon-name="chevron-down"></i>
				</div>

				<div class="pricing-form-submit">
					<button class="btn"
							type="submit"
							variant="primary">
						<i class="iconsax"
						   icon-name="send-2"></i>
						<?php pll_e( 'ارسال درخواست' ) ?>
					</button>
				</div>
			</form>
		</section>

	</div>



</main>

<?php get_footer() ?>