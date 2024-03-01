<?php
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
    wp_redirect($page_my_order_link); // @need : back to last url
    exit();
}
?>

<?php get_header(null, ['login_page' => true]); ?>
<?php
/*Template Name: OTP Page */

$alert_link_template = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/alert-login.php'
];
$page_alert_link = get_permalink(get_posts($alert_link_template)[0]);

$prePass = constant('SECURE_AUTH_KEY');

$pageCondition = $_POST
    && isset($_POST["user_tel"])
    && isset($_POST['user_name']);

$otpCondition  = $_POST
    && isset($_POST["user_tel_h"])
    && isset($_POST["otp_inp"]);

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
                wp_redirect($userLink);
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
<main class="otp-page container">
    <div class="form-wrapper" id="formWrapper">
        <?php //check_empty($contact_us_description, 'description'); 
        ?>
        <div class="title"><?= pll__('enter-code') ?></div>
        <a href="<?= $login_link ?>" class=" btn-edit-number"><?= pll__('edit-phone-number') ?></a>
        <form action="<?= $page_alert_link ?>" id="code-entry-form">
            <?php if ($pageCondition) : ?>
            <div class="otp-inputs" id="otp-inputs">
                <input class="data input-primary" type="number" name="otp_inp" min="100000" max="999999" maxlength="6"
                    required>
                <input class="data" type="hidden" name="number-and-name" value="" required>
            </div>
            <button id="login-form-submit submit_otp" class="btn" type="submit"
                variant="primary"><?= pll__('continue'); ?></button>
            <?php endif; ?>

            <!-- <input class="data input-primary" type="number" name="otp_inp" min="100000" max="999999" maxlength="6" required>
            <input class="data" type="hidden" name="number-and-name" value="" required> -->
            <!-- <button id="login-form-submit" class="btn" variant="primary"><?= pll__('continue'); ?></button> -->
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