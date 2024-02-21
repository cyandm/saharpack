<?php
/*Template Name: Order */
get_header() ?>

<main class="my-order">

    <div class="orders">
    <h3> سفارش های من</h3>

        <div class="order-card">
            <img src="<?= get_stylesheet_directory_uri() . '/assets/img/Rectangle2474.png' ?>" />

            <div class="order-box">
                <div class="odrer-title">
                    <h5>جعبه های نوع دوم</h5>
                    <p> impidimpi کد t۰۰۰۳۶۲</p>
                </div>
                <div class="order-detail">
                    <div class="order-details-row">
                        <span>تعداد</span>
                        <span>2</span>
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
        <div class="order-card">
            <img src="<?= get_stylesheet_directory_uri() . '/assets/img/Rectangle2475.png' ?>" />

            <div class="order-box">
                <div class="odrer-title">
                    <h5>جعبه های نوع دوم</h5>
                    <p> impidimpi کد t۰۰۰۳۶۲</p>
                </div>
                <div class="order-detail">
                    <div class="order-details-row">
                        <span>تعداد</span>
                        <span>2</span>
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
                        <span class="status awaiting">در انتظار ارسال</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <img class="order-tempnail" src="<?= get_stylesheet_directory_uri() . '/assets/img/51437301.png' ?>" />


</main>


<?PHP get_footer() ?>