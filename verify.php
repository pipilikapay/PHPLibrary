<?php
    $gateway_url = 'https://pay.your-domain.com/payment/api/verify_payment';

    $apiKey = '346870348433472319';
    $secretkey = '12347832455789879';
    $paymentID = "546346343";

    $data = array(
        'paymentID' => $paymentID,
        'apiKey' => $apiKey,
        'secretkey' => $secretkey
    );

    $ch = curl_init($gateway_url);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    curl_close($ch);

    $result = json_decode($response, true);

    echo $result;
?>