<?php
/*Template Name: Order */
get_header() ?>

<?php
$orders = wc_get_orders([
    'status' => 'any'
]);
echo '<pre>';
var_dump($orders[0]->data);
echo '</pre>';

?>
<main class="my-order container">

    <div class="orders">
        <h3><?= get_the_title() ?></h3>

        <?php

        foreach ($orders as $key => $order) {
            get_template_part('/templates/components/cards/order', null, ['order' => $order->data]);
        }
        ?>


    </div>
    <img class="order-tempnail" src="<?= get_stylesheet_directory_uri() . '/assets/img/51437301.png' ?>" />


</main>


<?PHP get_footer() ?>