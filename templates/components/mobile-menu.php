<?php
$login = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/login.php'
];
$login_link = get_permalink(get_posts($login)[0]);
?>
<div class="menu-handler">
    <i class="iconsax icon-menu" icon-name="hamburger-menu" id="mobileMenuToggle"></i>
</div>

<div class="mobile-menu" id="mobileMenu">

    <?php if (is_user_logged_in()) : ?>

        <a href="<?= $args['page_my_order_link'] ?>" class="btn tracking" variant="secondary">
            <?php pll_e('پیگیری سفارش'); ?>
        </a>

    <?php endif ?>

    <?php if (!is_user_logged_in()) : ?>

        <a href="<?= $login_link ?>" class="btn tracking" variant="secondary">
            <?php pll_e('ورود یا ثبت‌نام'); ?>
        </a>

    <?php endif ?>

    <div class="mobile-menu-nav">
        <?php wp_nav_menu([
            'theme_location' => 'header'
        ]) ?>
    </div>
</div>