<?php
$order = $args['order'];
var_dump($order['line_items']);
?>
<div class="order-card">
    <img src="<?= get_stylesheet_directory_uri() . '/assets/img/Rectangle2474.png' ?>" />

    <div class="order-box">
        <div class="odrer-title">
            <h5>جعبه های نوع دوم</h5>
            <p> impidimpi کد t۰۰۰۳۶۲</p>
        </div>
        <div class="order-detail">
            <div class="order-details-row">
                <span><?= pll_e('تعداد') ?></span>
                <span><?= $order['quantity'] ?></span>
            </div>
            <div class="order-details-row">
                <span>قیمت کل</span>
                <span>۳۱۲٫۰۰۰</span>
            </div>
            <div class="order-details-row">
                <span>تاریخ سفارش</span>
                <span class="order-date">۱۴۰۲/۱۰/۲۴</span>
            </div>
            <div class="order-details-row">
                <span>وضعیت سفارش</span>
                <span class="status send">تحویل پیک</span>
            </div>
        </div>
    </div>
</div>