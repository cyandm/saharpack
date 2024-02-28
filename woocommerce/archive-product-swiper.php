<?php
$mainQuery = $GLOBALS["archive_query"];
$mainQueryQuery = $mainQuery->query_vars;

$taxName = $GLOBALS["location_tax"];
$termSlug = "best-sellers";

$argsProducts = array(
  'post_type' => 'product',
  'posts_per_page' => 12,
  'meta_query' => array(
    array(
      'key' => "_stock_status",
      'value' => "instock",
      'compare' => "="
    )
  ),
  'tax_query' => array(
    array(
      'taxonomy' => $taxName,
      'field' => "slug",
      'terms' => $termSlug,
    ),
  )
);

if (isset($mainQueryQuery["product_cat"]) && !empty($mainQueryQuery["product_cat"])) {
  $argsProducts['tax_query'][] = array(
    'taxonomy' => "product_cat",
    'field' => "slug",
    'terms' => [$mainQueryQuery["product_cat"]],
  );
}

$beforeSwiper = '
<div id="archive-product-swiper-container" class="py-4 mt-3">
  <section class="container mx-auto home-sellers bg-gray-50 p-3">
';

$afterSwiper = '
  </section>
</div>
<div class="clear-fix"></div>
';

cyn_products::cyn_swipers($argsProducts, "bar-chart-2", "bg-primary-900 rotate-90", "پیشنهادات ما", "#href", $beforeSwiper, $afterSwiper, false);
