<?php
$options = new cyn_options([]);
$mainQuery = $GLOBALS["archive_query"];
$mainQueryQuery = $mainQuery->query_vars;
$mainQueryPosts = $mainQuery->posts;

$formActionUrl = "./";
$terms = array();
$pa_color_attr  = array();
$pa_size_attr   = array();
$pa_design_attr = array();

if ($mainQuery->is_post_type_archive) {
  $shop_page_url = get_permalink(wc_get_page_id('shop'));
  $formActionUrl = $shop_page_url;
  $terms = $options->cyn_getProductTerms(false);
} else {
  if (isset($mainQueryQuery["product_cat"])) {
    $mainTerm = get_term_by("slug", $mainQueryQuery["product_cat"], "product_cat");
    $formActionUrl = get_term_link($mainTerm);

    $parentTerm = array(
      'id' => $mainTerm->term_id,
      'name' => $mainTerm->name,
      'slug' => $mainTerm->slug,
      'parent' => 0,
      'url' => $formActionUrl
    );

    $terms = $options->cyn_getProductTerms((int)$parentTerm['id']);
    $terms[] = $parentTerm;
  }
}


foreach ($mainQueryPosts as $post) {
  $pId = $post->ID;
  $product = wc_get_product($pId);
  if ($product->is_type('variable')) {
    $allVariations = $product->get_variation_attributes();
    foreach ($allVariations as $key => $variations) {
      foreach ($variations as $var) {
        $termInfo = get_term_by("slug", $var, $key);
        if ($termInfo != false) {
          $tId = $termInfo->term_id;
          $tName = $termInfo->name;

          if ($key == "pa_color") {
            $new_pa_color = array(
              'id' => $tId,
              'name' => $tName
            );
            if (!in_array($new_pa_color, $pa_color_attr)) {
              $pa_color_attr[] = $new_pa_color;
            }
          }

          if ($key == "pa_size") {
            $new_pa_size = array(
              'id' => $tId,
              'name' => $tName
            );
            if (!in_array($new_pa_size, $pa_size_attr)) {
              $pa_size_attr[] = $new_pa_size;
            }
          }

          if ($key == "pa_design") {
            $new_pa_design = array(
              'id' => $tId,
              'name' => $tName
            );
            if (!in_array($new_pa_design, $pa_design_attr)) {
              $pa_design_attr[] = $new_pa_design;
            }
          }
        }
      }
    }
  }
}

function termsLi($id, $name, $slideItem = false) {
  ?>
  <li class="flex">
    <label class="flex-auto user-select-none" for="<?php echo 'cat' . $id; ?>">
      <input class="cursor-pointer" type="checkbox" id="<?php echo 'cat' . $id; ?>" name="<?php echo 'cat' . $id; ?>" value="<?php echo $id; ?>" <?php if (isset($_GET['cat' . $id])) { echo 'checked'; } ?>>
      <?php echo $name; ?>
    </label>
    <?php if ($slideItem == true): ?>
      <button class="subterm-slide-btn flex btn-primary bg-gray-100 text-primary-900 p-1 ml-2 text-sm">
        <i class=""><i class="stroke-2 w-5 h-5" data-feather="chevron-down"></i></i>
      </button>
    <?php endif; ?>
  </li>
  <?php
}
?>

<form action="<?php echo $formActionUrl; ?>" method="GET">
  <?php if (count($terms) > 0): ?>
    <div class="sidebar-item terms">
      <p>دسته بندی ها:</p>
      <ul>
        <?php
        foreach ($terms as $term => $val) {
          if ($val["parent"] == "0") {
            $childTerm = array();
            $hasChild = false;

            foreach ($terms as $child => $childVal) {
              if ($childVal["parent"] == $val["id"]) {
                $childTerm[] = $childVal;
              }
            }

            if (count($childTerm) > 0) {
              $hasChild = true;
            }

            termsLi($val["id"], $val["name"], $hasChild);

            if ($hasChild == true) {
              ?>
              <div class="subterm" style="<?php if (!$mainQuery->is_post_type_archive) { echo "display: block;"; } ?>">
                <?php
                foreach ($childTerm as $child => $childVals) {
                  termsLi($childVals["id"], $childVals["name"], false);
                }
                ?>
              </div>
              <?php
            }
          }
        }
        ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if(count($pa_color_attr) > 0): ?>
    <div class="sidebar-item pa-color scroll">
      <p>بر اساس رنگ:</p>
      <ul>
        <?php
        foreach ($pa_color_attr as $term => $val) {
          ?>
          <li>
            <label class="user-select-none" for="<?php echo 'pa_cat' . $val["id"]; ?>">
              <input type="checkbox" id="<?php echo 'pa_cat' . $val["id"]; ?>" name="<?php echo 'pa_cat' . $val["id"]; ?>" value="<?php echo $val["id"] ?>" <?php if (isset($_GET['pa_cat' . $val["id"]])) { echo 'checked'; } ?>>
              <?php echo $val["name"]; ?>
            </label>
          </li>
          <?php
        }
        ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if(count($pa_size_attr) > 0): ?>
    <div class="sidebar-item pa-size scroll">
      <p>بر اساس اندازه:</p>
      <ul>
        <?php
        foreach ($pa_size_attr as $term => $val) {
          ?>
          <li>
            <label class="user-select-none" for="<?php echo 'pa_cat' . $val["id"]; ?>">
              <input type="checkbox" id="<?php echo 'pa_cat' . $val["id"]; ?>" name="<?php echo 'pa_cat' . $val["id"]; ?>" value="<?php echo $val["id"] ?>" <?php if (isset($_GET['pa_cat' . $val["id"]])) { echo 'checked'; } ?>>
              <?php echo $val["name"]; ?>
            </label>
          </li>
          <?php
        }
        ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php //if(count($pa_design_attr) > 0): ?>
  <?php if(false): ?>
    <div class="sidebar-item pa-design scroll">
      <p>بر اساس طرح:</p>
      <ul>
        <?php
        foreach ($pa_design_attr as $term => $val) {
          ?>
          <li>
            <label class="user-select-none" for="<?php echo 'pa_cat' . $val["id"]; ?>">
              <input type="checkbox" id="<?php echo 'pa_cat' . $val["id"]; ?>" name="<?php echo 'pa_cat' . $val["id"]; ?>" value="<?php echo $val["id"] ?>" <?php if (isset($_GET['pa_cat' . $val["id"]])) { echo 'checked'; } ?>>
              <?php echo $val["name"]; ?>
            </label>
          </li>
          <?php
        }
        ?>
      </ul>
    </div>
  <?php endif; ?>

  <br>
  <div class="sidebar-item price-range">
    <p dir="rtl">بر اساس قیمت:</p>
    <?php
    $maxAttr = 600000;
    $maxPriceArgs = array(
      'post_type' => 'product',
      'posts_per_page' => 1,
      'orderby' => "meta_value_num",
      'meta_key' => "_price"
    );
    $maxPriceQuery = new WP_Query($maxPriceArgs);
    if ($maxPriceQuery->have_posts()) {
      while ($maxPriceQuery->have_posts()) :
        $maxPriceQuery->the_post();
        $maxPricePostId = get_the_ID();
        $maxPriceMeta = get_post_meta($maxPricePostId, "_price", true);
        if (isset($maxPriceMeta)) {
          $maxAttr = ceil((int)$maxPriceMeta / 10000) * 10000;
        }
      endwhile;
    }
    wp_reset_postdata();
    ?>

    <div class="range-value flex flex-row-reverse text-center mt-3">
      <p class="flex-auto" id="range-value-min">
        <?php if (isset($_GET["p-min"])) {
          echo number_format($_GET["p-min"]);
        } else {
          echo number_format(10000);
        } ?>
      </p>
      <p class="flex-auto" id="range-value-max">
        <?php if (isset($_GET["p-max"])) {
          echo number_format($_GET["p-max"]);
        } else {
          echo number_format($maxAttr);
        } ?>
      </p>
    </div>

    <div class="relative py-3 px-1 w-full">
      <div class="slider relative h-1 bg-gray-300">
        <div id="range-progress" class="progress absolute h-full left-1 right-1 bg-primary-300"></div>
      </div>
      <div class="range-inputs relative">
        <input type="range" name="p-min" id="p-min" step="10000" min="10000" max="<?php echo $maxAttr; ?>" value="<?php if (isset($_GET["p-min"])) { echo $_GET["p-min"]; } else { echo 10000; } ?>">
        <input type="range" name="p-max" id="p-max" step="10000" min="10000" max="<?php echo $maxAttr; ?>" value="<?php if (isset($_GET["p-max"])) { echo $_GET["p-max"]; } else { echo $maxAttr; } ?>">
      </div>
    </div>
  </div>

  <?php if (false) : ?>
  <div class="sidebar-item isstok">
    <label for="">
      <input type="checkbox" name="isstok" value="true" <?php if (isset($_GET["isstok"])) { echo 'checked'; } ?>>
      فقط ناموجود ها
    </label>
  </div>
  <?php endif; ?>
  
  <?php if (false) : ?>
  <div class="sidebar-item issale">
    <label for="">
      <input type="checkbox" name="issale" value="true" <?php if (isset($_GET["issale"])) { echo 'checked'; } ?>>
      محصولات تخفیف خورده
    </label>
  </div>
  <?php endif; ?>

  <div class="sidebar-submit py-4 flex gap-3">
    <input type="submit" value="اعمال فیلترها" class="btn-primary cursor-pointer flex-auto">
    <a href="<?php echo $formActionUrl; ?>" class="btn-primary cursor-pointer">حذف</a>
  </div>
</form>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    const rangeMin = $(".price-range #p-min");
    const rangeMax = $(".price-range #p-max");

    const textMin = $(".price-range #range-value-min");
    const textMax = $(".price-range #range-value-max");

    const progress = $(".price-range #range-progress");

    if (rangeMin[0] && rangeMax[0] && textMin[0] && textMax[0] && progress[0]) {
      const priceGap = 20000.0;
      const maxAttr = parseFloat($(rangeMin).attr("max"));

      rangeMin[0].addEventListener("input", rangeEvents);
      rangeMax[0].addEventListener("input", rangeEvents);

      const minValC = parseFloat($(rangeMin).val());
      const maxValC = parseFloat($(rangeMax).val());
      $(progress).css("left", ((minValC * 100.0) / maxAttr) + "%");
      $(progress).css("right", (100.0 - ((maxValC * 100.0) / maxAttr)) + "%");

      function rangeEvents(e) {
        e.preventDefault();
        let minVal = parseFloat($(rangeMin).val());
        let maxVal = parseFloat($(rangeMax).val());

        if (maxVal - minVal < priceGap) {
          if (this == rangeMin[0]) {
            $(rangeMin).val(maxVal - priceGap);
          } else {
            $(rangeMax).val(minVal + priceGap);
          }
        } else {
          $(textMin).text(new Intl.NumberFormat().format(minVal));
          $(textMax).text(new Intl.NumberFormat().format(maxVal));
          $(progress).css("left", ((minVal * 100.0) / maxAttr) + "%");
          $(progress).css("right", (100.0 - ((maxVal * 100.0) / maxAttr)) + "%");
        }
      }
    }
  });
</script>