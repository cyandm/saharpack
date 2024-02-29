<?php
$order = $args['order'];
echo '<pre>';
//var_dump($order['line_items']);

// foreach ($order['line_items'] as $key => $order_prop) {
//     var_dump(wc_get_email_order_items($order, []));
// }
$total_items = 0;
echo '</pre>';
//var_dump($order->get_items()[101]);
foreach ($order->get_items() as $item_id => $item) {
    $total_items += $item->get_quantity();
}
foreach ($order->get_items() as $item_id => $item) {
    $first_product_id = $item->get_product_id();
    break;
}

?>
<div class="order-card">
    <div class="order-thumbnail">
        <?= get_the_post_thumbnail($first_product_id) ?>
    </div>

    <div class="order-box">
        <div class="odrer-title">
            <h5><?= pll__('کد سفارش : ') ?><?= $order->data['id'] ?></h5>
        </div>
        <div class="order-detail">
            <div class="order-details-row">
                <span><?= pll_e('تعداد') ?></span>
                <span><?= $total_items ?></span>
            </div>
            <div class="order-details-row">
                <span><?= pll__('قیمت کل') ?></span>
                <span><?= $order->get_total() ?> <?= pll__('تومان') ?></span>
            </div>
            <div class="order-details-row">
                <span><?= pll__('تاریخ سفارش') ?> </span>

                <span class="order-date"><?= wc_format_datetime($order->get_date_created()) ?></span>
            </div>
            <div class="order-details-row">
                <span><?= pll__('وضعیت سفارش') ?></span>
                <span class="status send"><?= wc_get_order_status_name($order->data['status']) ?></span>
            </div>
        </div>
    </div>
</div>