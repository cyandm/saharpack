<?php

/**
 * register translatable words
 * 
 * 
 */

register_translate_form();
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
}
