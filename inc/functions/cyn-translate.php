<?php

/**
 * register translatable words
 * 
 * 
 */

register_translate_form();
register_translate_template();

function register_translate_general()
{
    pll_register_string('close', 'close', 'Cyan');
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
}

function register_translate_template()
{
    pll_register_string('login-or-signup', 'login-or-signup', 'Cyan');
    pll_register_string('welcome', 'welcome', 'Cyan');
    pll_register_string('exit', 'exit', 'Cyan');
    pll_register_string('user-dashboard', 'user-dashboard', 'Cyan');
}
