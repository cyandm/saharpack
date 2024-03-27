 <?php
    add_filter('woocommerce_checkout_fields', 'cyn_override_checkout_fields', 100, 1);

    function cyn_override_checkout_fields($fields)
    {


        unset($fields['billing']['billing_company']);
        unset($fields['billing']['billing_country']);
        unset($fields['billing']['billing_address_2']);

        $fields['billing']['billing_first_name']['priority'] = 1;
        $fields['billing']['billing_last_name']['priority'] = 2;
        $fields['billing']['billing_state']['priority'] = 3;
        $fields['billing']['billing_city']['priority'] = 4;
        $fields['billing']['billing_address_1']['priority'] = 5;


        $fields['billing']['billing_country']['type'] = 'hidden';

        $fields['billing']['billing_state']['class'] = ' form-row-first ';
        $fields['billing']['billing_city']['class'] = ' form-row-last';
        $fields['billing']['billing_phone']['class'] = ' form-row-first';
        $fields['billing']['billing_email']['class'] = ' form-row-last';


        $fields['billing']['billing_postcode']['label_class'] = 'text-base';

        $fields['billing']['billing_email']['required'] = false;
        $fields['billing']['billing_postcode']['required'] = true;


        return $fields;
    }
