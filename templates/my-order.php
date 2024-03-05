<?php
$login = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/login.php'
];
$login_link = get_permalink(get_posts($login)[0]);

if (!(is_user_logged_in())) {
    wp_redirect($login_link); // @need : back to last url
    exit();
}
?>
<?php
/*Template Name: Order */
get_header() ?>

<?php
$orders = wc_get_orders([
    'status' => 'any'
]);

?>
<main class="my-order container">

    <div class="orders">
        <h3><?= get_the_title() ?></h3>

        <?php

        foreach ($orders as $key => $order) {

            get_template_part('/templates/components/cards/order', null, ['order' => $order]);
        }
        ?>


    </div>
    <div class="order-tempnail">

        <img src="<?= get_stylesheet_directory_uri() . '/assets/img/51437301.png' ?>" />
    </div>


</main>


<?PHP get_footer() ?>