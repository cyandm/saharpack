<?php

/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once(__DIR__ . '/image-size-guide.php');

$post_id = get_the_ID();
$metaValueStr = get_post_meta($post_id, "product_size_guide", true);

$fieldCondition = strlen($metaValueStr) > 0 && !empty($metaValueStr);
if ($fieldCondition) {
    setImageSizeModale($metaValueStr);
}
?>

<div class="before-title flex items-center justify-end gap-4">
    <?php if ($fieldCondition) : ?>
        <button class="text-primary-500 cursor-pointer flex items-center gap-2" id="image-size-guide-show">
            <?= pll__('size-guide') ?>
            <i>
                <svg class="stroke-1" fill="currentColor" height="22px" width="22px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490 490" xml:space="preserve">
                    <g>
                        <g>
                            <g>
                                <path d="M488.185,474.254l-330.001-470c-2.506-3.57-7.038-5.103-11.197-3.789S140,5.637,140,10v470c0,5.523,4.477,10,10,10h330
				c3.731,0,7.152-2.078,8.873-5.388C490.594,481.301,490.328,477.307,488.185,474.254z M160,470v-30h30v-20h-30v-50h30v-20h-30v-50
				h30v-20h-30v-50h30v-20h-30v-50h30v-20h-30V41.645L460.76,470H160z" />
                                <path d="M225,400h105c3.788,0,7.25-2.14,8.944-5.528c1.694-3.388,1.328-7.442-0.944-10.472L233,244
				c-2.583-3.444-7.078-4.849-11.162-3.487C217.755,241.874,215,245.696,215,250v140C215,395.523,219.477,400,225,400z M235,280
				l75,100h-75V280z" />
                                <path d="M110,0H10C4.477,0,0,4.477,0,10v470c0,5.523,4.477,10,10,10h100c5.523,0,10-4.477,10-10V10C120,4.477,115.523,0,110,0z
				 M100,470H20v-45h40v-20H20v-60h40v-20H20v-70h40v-20H20v-70h40v-20H20V85h40V65H20V20h80V470z" />
                            </g>
                        </g>
                    </g>
                </svg>
            </i>
        </button>
    <?php endif; ?>

    <button class="text-primary-500 cursor-pointer flex items-center" id="shareProduct">
        <i><i class="stroke-1" data-feather="share-2"></i></i>
    </button>
</div>
<?php the_title('<h1 class="product_title entry-title text-3xl max-md:text-xl max-md:my-4">', '</h1>'); ?>