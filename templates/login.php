<?php
/*Template Name: Login Page */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


$login = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/login.php'
];
$login_link = get_permalink(get_posts($login)[0]);

$my_order_template = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/my-order.php'
];

$page_my_order_link = get_permalink(get_posts($my_order_template)[0]);


if (is_user_logged_in()) {

    if (isset($_GET['redirect'])) {
        wp_redirect($_GET['redirect']);
    } else {
        wp_redirect($page_my_order_link); // @need : back to last url
    }

    exit();
}


$prePass = constant('SECURE_AUTH_KEY');

$pageCondition = $_POST
    && isset($_POST["user_tel"])
    && isset($_POST['user_name']);

$otpCondition = $_POST
    && isset($_POST["user_tel_h"])
    && isset($_POST["otp_inp"]);

$alertCondition = $_POST
    && isset($_POST["user_name_h"]);

$params = array();
$alerts = array();



if ($pageCondition) {
    $tel = substr((string)$_POST["user_tel"], -10);
    $params["user_tel"] = $tel;
    $is_user = username_exists($tel);
    $user = get_user_by('login', $tel);

    if ($is_user == false && $user == false) {
        $newUser = wp_create_user(
            $tel,
            $prePass . "-" . $tel
        );

        if (!is_wp_error($newUser)) {
            $newOtp = rand(100000, 999999);
            $currentTime = current_time('timestamp');

            update_user_option($newUser, 'show_admin_bar_front', false);
            $addMeta = update_user_meta($newUser, "cyn_otp", array('otp' => $newOtp, 'time' => $currentTime));

            if ($addMeta != false) {
                cyn_send_verification(array($tel), $newOtp);
            } else {
                $alerts[] = 'مشکلی در ذخیره داده ها به وجود آمده. لطفا دوباره امتحان کنید';
            }
        } else {
            $alerts[] = 'مشکلی در ایجاد کاربر به وجود آمده. لطفا دوباره امتحان کنید.';
        }
    } else {
        $userID = $user->ID;
        $newOtp = rand(100000, 999999);
        $currentTime = current_time('timestamp');

        $addMeta = update_user_meta($userID, "cyn_otp", array('otp' => $newOtp, 'time' => $currentTime));

        if ($addMeta != false) {
            cyn_send_verification(array($tel), $newOtp);
        } else {
            $alerts[] = 'مشکلی در ذخیره داده ها به وجود آمده. لطفا دوباره امتحان کنید';
        }
    }
}


if ($otpCondition) {
    $otp = (int)$_POST["otp_inp"];

    $tel = substr((string)$_POST["user_tel_h"], -10);
    $user = get_user_by('login', $tel);

    if ($user != false) {
        $userID = $user->ID;
        $metaOtp = get_user_meta($userID, 'cyn_otp', true);
        $currentTime = current_time('timestamp');

        if ($otp == $metaOtp['otp'] && ($currentTime - $metaOtp['time']) < 300) {
            $signon = wp_signon(array(
                'user_login' => $tel,
                'user_password' => $prePass . "-" . $tel,
                'remember' => true
            ));

            if (!is_wp_error($signon)) {
                update_user_meta($userID, "cyn_otp", "");
                if (isset($_GET['redirect'])) {
                    wp_redirect($_GET['redirect']);
                } else {
                    wp_redirect($login_link);
                }

                exit();
            } else {
                $alerts[] = 'مشکلی در ورود به وجود آمده. لطفا دوباره امتحان کنید';
            }
        } else {
            $alerts[] = 'رمز وارد شده صحیح نمیباشد یا زمان آن به اتمام رسیده';
        }
    } else {
        $alerts[] = 'کاربر مورد نظر پیدا نشد';
    }
}

?>
<?php get_header(null, ['login_page' => true]); ?>

<main class="login-page container">
    <div class="form-wrapper" id="formWrapper">

        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post" id="login-form">

            <?php if ($alertCondition) : ?>

                <div class="title"><?= pll__('welcome') ?></div>
                <div class="name-user"><?= pll__(' سلام ') ?><?= $_POST['user_name_h'] ?><?= pll__(' خوشحالیم سحرپک رو انتخاب کردی ') ?></div>
                <div class="button-group">
                    <a class="btn" variant="primary" href="<?= $page_my_order_link ?>"><?= pll__('حساب کاربری') ?></a>
                    <a class="btn" variant="secondary" href="<?= wp_logout_url(home_url()) ?>"><?= pll__('exit') ?></a>
                </div>


            <?php else : ?>


                <?php if (!$pageCondition) : ?>

                    <div class="title"><?= pll__('login-or-signup') ?></div>
                    <div class="description"><?= pll__('برای ورود  به سحرپک لطفا شماره خودتون رو وارد کنید') ?></div>
                    <div class="input-primary">
                        <i class="iconsax" icon-name="user-2"></i>
                        <input class="data" type="text" name="user_name" placeholder="<?= pll__('your-name') ?>" required>
                    </div>
                    <div class="input-primary">
                        <i class="iconsax" icon-name="phone"></i>
                        <input pattern="[0]{1}[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" class=" data" type="tel" name="user_tel" placeholder="<?= pll__('phone-number') ?>" required>
                    </div>
                    <button id="login-form-submit send_otp" class="btn" variant="primary" type="submit"><?= pll__('continue') ?></button>

                <?php else : ?>

                    <div class="title"><?= pll__('enter-code') ?></div>
                    <div class="description">
                        <?= Pll__(' لطفا کد ارسال شده به شماره ') ?>
                        <?= isset($_POST["user_tel"]) ? $_POST["user_tel"] : '' ?>
                        <?= pll__(' وارد کنید ') ?>

                    </div>
                    <a href="<?= $login_link ?>" class=" btn-edit-number"><?= pll__('edit-phone-number') ?></a>
                    <div class="otp-inputs" id="otp-inputs">
                        <input class="data input-primary" type="number" name="otp_inp" min="100000" max="999999" maxlength="6" required>
                        <input class="data" type="hidden" name="number-and-name" value="" required>
                    </div>

                    <input class="data" type="hidden" name="user_name_h" value="<?= isset($_POST["user_name"]) ? $_POST["user_name"] : ''; ?>">

                    <input class="data" type="hidden" name="user_tel_h" value="<?= isset($_POST["user_tel"]) ? $_POST["user_tel"] : ''; ?>">

                    <button id="login-form-submit send_otp" class="btn" variant="primary" type="submit">
                        <?= pll__('continue') ?>
                    </button>
                <?php endif; ?>

            <?php endif ?>

        </form>
    </div>
    <div class="page-thumbnail">
        <?php if (!empty(get_the_post_thumbnail())) : ?>
            <?php the_post_thumbnail() ?>
        <? else : ?>
            <img src="<?= get_stylesheet_directory_uri() . '/assets/img/placeholder.png' ?>" />
        <?php endif ?>
    </div>
</main>
<?php get_footer(); ?>