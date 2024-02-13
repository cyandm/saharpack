<?php
add_action( 'add_meta_boxes', 'cyn_form_meta_box' );

add_filter( 'manage_form_posts_columns', 'cyn_form_table_head' );
add_action( 'manage_form_posts_custom_column', 'cyn_form_table_column', 10, 2 );

function cyn_form_meta_box() {
	add_meta_box( 'information', 'اطلاعات فرم', function () {
		global $post;
		?>
		<table>
			<tr>
				<td colspan="6">حوزه فعالیت</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'activity', true ) ?></td>
			</tr>
			<tr>
				<td colspan="6">شماره تلفن</td>
				<td colspan="6">
					<a href="tel:<?= get_post_meta( $post->ID, 'phone', true ) ?>">
						<?= get_post_meta( $post->ID, 'phone', true ) ?>
					</a>
				</td>
			</tr>
			<tr>
				<td colspan="6">ایمیل</td>
				<td colspan="6">
					<a href="mailto:<?= get_post_meta( $post->ID, 'mail', true ) ?> ">
						<?= get_post_meta( $post->ID, 'mail', true ) ?>
					</a>
				</td>
			</tr>
			<tr>
				<td colspan="6">نام شرکت</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'companyName', true ) ?></td>
			</tr>
			<tr>
				<td colspan="6">سمت شغلی فرد درخواست دهنده</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'position', true ) ?></td>
			</tr>
			<tr>
				<td colspan="6">آدرس فایل پیوست شده</td>
				<td colspan="6">
					<a href="<?= get_post_meta( $post->ID, 'file_link', true ) ?>">
						<?= get_post_meta( $post->ID, 'file_link', true ) ?>
					</a>
				</td>
			</tr>

			<tr>
				<td colspan="6">شخصیت</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'character', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">روش آشنایی با مجموعه</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'introductionMethod', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">مورد درخواست</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'requestItem', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">گرماژ مقوا</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'gramageCardBoard', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">متوسط تیراژ در هر نوبت صفارش گذاری</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'averageCirculation', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">ساختار جعبه</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'boxStructure', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">نوع مقوا</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'cardBoardType', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">ابعاد جعبه</td>
				<td colspan="2"><?= 'طول: ' . get_post_meta( $post->ID, 'boxLength', true ) ?></td>
				<td colspan="2"><?= 'عرض: ' . get_post_meta( $post->ID, 'boxWidth', true ) ?></td>
				<td colspan="2"><?= 'ارتفاع: ' . get_post_meta( $post->ID, 'boxHeight', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6"> ابعاد تیغ به تیغ</td>
				<td colspan="3"><?= 'طول: ' . get_post_meta( $post->ID, 'bladeLength', true ) ?></td>
				<td colspan="3"><?= 'عرض: ' . get_post_meta( $post->ID, 'bladeWidth', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">تعداد رنگ چاپ</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'numberOfColor', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">نوع پوشش چاپ</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'printCoverType', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">فرآیند تکمیلی چاپ</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'additionalPrintingProcess', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">اتصال</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'connection', true ) ?></td>
			</tr>

			<tr>
				<td colspan="6">حداقل تیراژ در هر نوبت سفارش گذاری</td>
				<td colspan="6"><?= get_post_meta( $post->ID, 'minimumCirculation', true ) ?></td>
			</tr>

		</table>
		<?php

	}, 'form', 'advanced', 'high' );
}

function cyn_form_table_head( $columns ) {
	$columns['phone'] = __( 'شماره تلفن', 'cyn-dm' );
	$columns['mail'] = __( 'آدرس ایمیل', 'cyn-dm' );
	return $columns;
}

function cyn_form_table_column( $column_name, $post_id ) {
	if ( $column_name == 'phone' ) {
		echo get_post_meta( $post_id, 'phone', true );
	}

	if ( $column_name == 'mail' ) {
		echo get_post_meta( $post_id, 'mail', true );
	}
}