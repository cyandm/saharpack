<?php

/**
 * register translatable words
 * 
 * 
 */
register_translate_general();
register_translate_form();
register_translate_template();
register_translate_bread_crumb();
register_translate_login();
register_translate_product();
register_translate_header_footer();
function register_translate_general()
{
    pll_register_string('close', 'close', 'Cyan');
    pll_register_string('view-all', 'view-all', 'Cyan');
}


function register_translate_form()
{
    pll_register_string('send-message', 'send-message', 'Cyan');
    pll_register_string('ask-question', 'ask-question', 'Cyan');
    pll_register_string('phone-number', 'phone-number', 'Cyan');
    pll_register_string('your-name', 'your-name', 'Cyan');
    pll_register_string('continue', 'continue', 'Cyan');
    pll_register_string('enter-code', 'enter-code', 'Cyan');
    pll_register_string('edit-phone-number', 'edit-phone-number', 'Cyan');
    pll_register_string('attach-your-resume', 'attach-your-resume', 'Cyan');
    pll_register_string('about-yourself', 'about-yourself', 'Cyan');
    pll_register_string('may-like', 'may-like', 'Cyan');
}

function register_translate_template()
{
    pll_register_string('login-or-signup', 'login-or-signup', 'Cyan');
    pll_register_string('welcome', 'welcome', 'Cyan');
    pll_register_string('exit', 'exit', 'Cyan');
    pll_register_string('user-dashboard', 'user-dashboard', 'Cyan');
    pll_register_string('job-offer-title', 'job-offer-title', 'Cyan');
    pll_register_string('job-offer-selected-title', 'job-offer-selected-title', 'Cyan');
    pll_register_string('send-request', 'send-request', 'Cyan');
    pll_register_string('about-job-title', 'about-job-title', 'Cyan');
    pll_register_string('send-collaboration-request', 'send-collaboration-request', 'Cyan');
    pll_register_string('product-detail', 'product-detail', 'Cyan');
    pll_register_string('price-and-order', 'price-and-order', 'Cyan');
}
function register_translate_bread_crumb()
{
    pll_register_string('job-offer', 'job-offer', 'Cyan');
    pll_register_string('request-form', 'request-form', 'Cyan');
}
function register_translate_login()
{
    pll_register_string('please-enter-code-send-to', 'please-enter-code-send-to', 'Cyan');
    pll_register_string('enter', 'enter', 'Cyan');

    pll_register_string('enter-number-for-login', 'enter-number-for-login', 'Cyan');
}
function register_translate_product()
{
    pll_register_string('free-consultation', 'free-consultation', 'Cyan');
    pll_register_string('cart', 'cart', 'Cyan');
    pll_register_string('total-price', 'total-price', 'Cyan');
    pll_register_string('type-of-shipment', 'type-of-shipment', 'Cyan');
    pll_register_string('order-completion-payment', 'order-completion-payment', 'Cyan');
}
function register_translate_header_footer()
{
    pll_register_string('exit-account', 'exit-account', 'Cyan');
    pll_register_string('order-tracking', 'order-tracking', 'Cyan');
}
