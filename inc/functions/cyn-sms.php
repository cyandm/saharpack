<?php
function cyn_send_verification($to, $code)
{
    $username = "09101926252";
    $password = "12345678Mm";
    $from = "3000505";
    $verification_pattern = "31qu9ign7h6gzs9";

    $input_data = array(
        'verification-code' => $code
    );
    $url = 'https://ippanel.com/patterns/pattern?';
    $url .= 'username='      . $username;
    $url .= '&password='     . urlencode($password);
    $url .= '&from='         . $from;
    $url .= '&to='           . json_encode($to);
    $url .= '&input_data='   . urlencode(json_encode($input_data));
    $url .= '&pattern_code=' . $verification_pattern;

    $handler = curl_init($url);
    curl_setopt($handler, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($handler);

    return $response;
}
