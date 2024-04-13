<?php
add_action('add_meta_boxes', 'cyn_form_meta_box');

add_filter('manage_form_posts_columns', 'cyn_form_table_head');
add_action('manage_form_posts_custom_column', 'cyn_form_table_column', 10, 2);


$meta = [
	[
		'name' => 'user_name',
		'label' => 'نام شما',
	],
	[
		'name' => 'user_describe',
		'label' => 'پیام',
	],
	[
		'name' => 'activity',
		'label' => 'حوزه فعالیت',
	],
	[
		'name' => 'phone',
		'label' => 'شماره تلفن',
		'link' => 'phone'
	],
	[
		'name' => 'mail',
		'label' => 'ایمیل',
	],
	[
		'name' => 'companyName',
		'label' => 'نام شرکت',
	],
	[
		'name' => 'position',
		'label' => 'سمت شغلی فرد درخواست دهنده',
	],
	[
		'name' => 'character',
		'label' => 'شخصیت',
	],
	[
		'name' => 'introductionMethod',
		'label' => 'روش آشنایی با مجموعه',
	],
	[
		'name' => 'requestItem',
		'label' => 'مورد درخواست',
	],
	[
		'name' => 'gramageCardBoard',
		'label' => 'گرماژ مقوا',
	],
	[
		'name' => 'averageCirculation',
		'label' => 'متوسط تیراژ در هر نوبت صفارش گذاری',
	],
	[
		'name' => 'boxStructure',
		'label' => 'ساختار جعبه',
	],
	[
		'name' => 'cardBoardType',
		'label' => 'نوع مقوا',
	],
	[
		'name' => 'numberOfColor',
		'label' => 'تعداد رنگ چاپ',
	],
	[
		'name' => 'printCoverType',
		'label' => 'نوع پوشش چاپ',
	],
	[
		'name' => 'additionalPrintingProcess',
		'label' => 'فرآیند تکمیلی چاپ',
	],
	[
		'name' => 'connection',
		'label' => 'اتصال',
	],
	[
		'name' => 'minimumCirculation',
		'label' => 'حداقل تیراژ در هر نوبت سفارش گذاری',
	],
];



function cyn_form_meta_box()
{
	add_meta_box('information', 'اطلاعات فرم', function () {
		global $post, $meta;
?>
		<table>


			<?php
			foreach ($meta as $meta_item) :
				if (get_post_meta($post->ID, $meta_item['name'], true)) :
			?>
					<tr>
						<td colspan="6"><?= $meta_item['label'] ?></td>
						<td colspan="6"><?= get_post_meta($post->ID, $meta_item['name'], true) ?></td>
					</tr>

			<?php
				endif;
			endforeach;
			?>

			<?php
			if (get_post_meta($post->ID, 'boxLength', true) || get_post_meta($post->ID, 'boxWidth', true) || get_post_meta($post->ID, 'boxHeight', true)) :
			?>

				<tr>
					<td colspan="6">ابعاد جعبه</td>
					<td colspan="2"><?= 'طول: ' . get_post_meta($post->ID, 'boxLength', true) ?></td>
					<td colspan="2"><?= 'عرض: ' . get_post_meta($post->ID, 'boxWidth', true) ?></td>
					<td colspan="2"><?= 'ارتفاع: ' . get_post_meta($post->ID, 'boxHeight', true) ?></td>
				</tr>

			<?php endif ?>


			<?php
			if (get_post_meta($post->ID, 'bladeLength', true) || get_post_meta($post->ID, 'bladeWidth', true)) :
			?>

				<tr>
					<td colspan="6"> ابعاد تیغ به تیغ</td>
					<td colspan="3"><?= 'طول: ' . get_post_meta($post->ID, 'bladeLength', true) ?></td>
					<td colspan="3"><?= 'عرض: ' . get_post_meta($post->ID, 'bladeWidth', true) ?></td>
				</tr>

			<?php endif ?>

			<?php if (get_post_meta($post->ID, 'file_link', true)) : ?>
				<tr>
					<td colspan="6">لینک فایل</td>
					<td colspan="6">
						<a href="<?= get_post_meta($post->ID, 'file_link', true) ?>">
							<?= get_post_meta($post->ID, 'file_link', true) ?>
						</a>
					</td>
				</tr>
			<?php endif; ?>


			<?php if (get_post_meta($post->ID, 'user_resume_link', true)) : ?>
				<tr>
					<td colspan="6">لینک رزومه</td>
					<td colspan="6">
						<a href="<?= get_post_meta($post->ID, 'user_resume_link', true) ?>">
							<?= get_post_meta($post->ID, 'user_resume_link', true) ?>
						</a>
					</td>
				</tr>
			<?php endif; ?>

		</table>
<?php

	}, 'form', 'advanced', 'high');
}

function cyn_form_table_head($columns)
{
	$columns['phone'] = __('شماره تلفن', 'cyn-dm');
	$columns['mail'] = __('آدرس ایمیل', 'cyn-dm');
	return $columns;
}

function cyn_form_table_column($column_name, $post_id)
{
	if ($column_name == 'phone') {
		echo get_post_meta($post_id, 'phone', true);
	}

	if ($column_name == 'mail') {
		echo get_post_meta($post_id, 'mail', true);
	}
}
