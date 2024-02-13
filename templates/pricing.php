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
				  enctype="multipart/form-data"
				  id="priceForm"
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
								   value="<?php pll_e( 'حقوقی' ) ?>"
								   name="character">
							<?php pll_e( 'حقوقی' ) ?>

						</label>

						<label for="realCharacter">
							<input type="radio"
								   required
								   id="realCharacter"
								   value="<?php pll_e( 'حقیقی' ) ?>"
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
								required
								id="introductionMethod"
								class="input-primary w-full">
							<option value=""
									selected>روش آشنایی با مجموعه</option>
							<option value="تبلیغات">تبلیغات</option>
							<option value="وبسایت">وبسایت</option>
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
						   name="averageCirculation"
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
								   value="<?php pll_e( 'درخواست تماس کارشناس' ) ?>"
								   name="requestItem">
							<?php pll_e( 'درخواست تماس کارشناس' ) ?>

						</label>

						<label for="continue">
							<input type="radio"
								   required
								   id="continue"
								   value="<?php pll_e( 'تکمیل ادامه فرم استعلام' ) ?>"
								   name="requestItem">
							<?php pll_e( 'تکمیل ادامه فرم استعلام' ) ?>
						</label>

						<label for="sendFile">
							<input type="radio"
								   required
								   id="sendFile"
								   value="<?php pll_e( 'ارسال فایل' ) ?>"
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
										   id="medicDoor"
										   value="<?php pll_e( 'درب دارویی' ) ?>"
										   name="boxStructure">
									<?php pll_e( 'درب دارویی' ) ?>

								</label>

								<label for="bottomLock">
									<input type="radio"
										   id="bottomLock"
										   value="<?php pll_e( 'ته قفلی' ) ?>"
										   name="boxStructure">
									<?php pll_e( 'ته قفلی' ) ?>
								</label>

								<label for="bottomLock">
									<input type="radio"
										   id="bottomLock"
										   value="<?php pll_e( 'لاک باتم' ) ?>"
										   name="boxStructure">
									<?php pll_e( 'لاک باتم' ) ?>
								</label>

								<label for="other">
									<input type="radio"
										   id="other"
										   value="<?php pll_e( 'سایر' ) ?>"
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
										   id="inderDoor"
										   value="<?php pll_e( 'ایندربورد' ) ?>"
										   name="cardBoardType">
									<?php pll_e( 'ایندربورد' ) ?>

								</label>

								<label for="craft">
									<input type="radio"
										   id="craft"
										   value="<?php pll_e( 'کرافت' ) ?>"
										   name="cardBoardType">
									<?php pll_e( 'کرافت' ) ?>
								</label>

								<label for="backGrey">
									<input type="radio"
										   id="backGrey"
										   value="<?php pll_e( 'پشت طوسی' ) ?>"
										   name="cardBoardType">
									<?php pll_e( 'پشت طوسی' ) ?>
								</label>

								<label for="glass">
									<input type="radio"
										   id="glass"
										   value="<?php pll_e( 'گلاسه' ) ?>"
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
									   type="text"
									   name="boxLength"
									   id="boxLength"
									   placeholder="<?php pll_e( 'طول (میلیمتر)' ) ?>">

								<input class="input-primary"
									   type="text"
									   name="boxWidth"
									   id="boxWidth"
									   placeholder="<?php pll_e( 'عرض (میلیمتر)' ) ?>">

								<input class="input-primary"
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
									   type="text"
									   name="bladeLength"
									   id="bladeLength"
									   placeholder="<?php pll_e( 'طول (میلیمتر)' ) ?>">

								<input class="input-primary"
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
										   id="to4color"
										   value="<?php pll_e( 'تا 4 رنگ' ) ?>"
										   name="numberOfColor">
									<?php pll_e( 'تا 4 رنگ' ) ?>

								</label>

								<label for="to6color">
									<input type="radio"
										   id="to6color"
										   value="<?php pll_e( 'تا 6 رنگ' ) ?>"
										   name="numberOfColor">
									<?php pll_e( 'تا 6 رنگ' ) ?>
								</label>

								<label for="more6color">
									<input type="radio"
										   id="more6color"
										   value="<?php pll_e( 'بیش از 6 رنگ' ) ?>"
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
										   id="vernie"
										   value="<?php pll_e( 'ورنی' ) ?>"
										   name="printCoverType">
									<?php pll_e( 'ورنی' ) ?>

								</label>

								<label for="uv">
									<input type="radio"
										   id="uv"
										   value="<?php pll_e( 'یووی' ) ?>"
										   name="printCoverType">
									<?php pll_e( 'یووی' ) ?>
								</label>

								<label for="matteCellophane">
									<input type="radio"
										   id="matteCellophane"
										   value="<?php pll_e( 'سلفون مات' ) ?>"
										   name="printCoverType">
									<?php pll_e( 'سلفون مات' ) ?>
								</label>

								<label for="shinyCellophane">
									<input type="radio"
										   id="shinyCellophane"
										   value="<?php pll_e( 'سلفون براق' ) ?>"
										   name="printCoverType">
									<?php pll_e( 'سلفون براق' ) ?>
								</label>

								<label for="uvAndVernie">
									<input type="radio"
										   id="uvAndVernie"
										   value="<?php pll_e( 'یووی + ورنی' ) ?>"
										   name="printCoverType">
									<?php pll_e( 'یووی + ورنی' ) ?>
								</label>

								<label for="noCover">
									<input type="radio"
										   id="noCover"
										   value="<?php pll_e( 'پوشش ندارد' ) ?>"
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
										   id="LocalUV"
										   value="<?php pll_e( 'یووی موضعی' ) ?>"
										   name="additionalPrintingProcess">
									<?php pll_e( 'یووی موضعی' ) ?>

								</label>

								<label for="goldsmith">
									<input type="radio"
										   id="goldsmith"
										   value="<?php pll_e( 'طلاکوب/ نقره کوب' ) ?>"
										   name="additionalPrintingProcess">
									<?php pll_e( 'طلاکوب/ نقره کوب' ) ?>
								</label>

								<label for="coloredFoil">
									<input type="radio"
										   id="coloredFoil"
										   value="<?php pll_e( 'فویل کوبی رنگی' ) ?>"
										   name="additionalPrintingProcess">
									<?php pll_e( 'فویل کوبی رنگی' ) ?>
								</label>

								<label for="windowsPatch">
									<input type="radio"
										   id="windowsPatch"
										   value="<?php pll_e( 'ویندوپچ' ) ?>"
										   name="additionalPrintingProcess">
									<?php pll_e( 'ویندوپچ' ) ?>
								</label>

								<label for="embassies">
									<input type="radio"
										   id="embassies"
										   value="<?php pll_e( 'امباس/برجسته سازی' ) ?>"
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
										   id="oneDot"
										   value="<?php pll_e( 'لب چسب / یک نقطه' ) ?>"
										   name="connection">
									<?php pll_e( 'لب چسب / یک نقطه' ) ?>

								</label>

								<label for="threeDots">
									<input type="radio"
										   id="threeDots"
										   value="<?php pll_e( 'سه نقطه' ) ?>"
										   name="connection">
									<?php pll_e( 'سه نقطه' ) ?>
								</label>

								<label for="fourDots">
									<input type="radio"
										   id="fourDots"
										   value="<?php pll_e( 'چهار نقطه' ) ?>"
										   name="connection">
									<?php pll_e( 'چهار نقطه' ) ?>
								</label>

								<label for="sixDots">
									<input type="radio"
										   id="sixDots"
										   value="<?php pll_e( 'شش نقطه' ) ?>"
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