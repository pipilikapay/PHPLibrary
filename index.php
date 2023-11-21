<?php
    $gateway_url = 'https://pay.your-domain.com/payment/api/create_payment';
    $successurl = "https://your-domain.com/success.php";
    $cancelurl = "https://your-domain.com/cancel.php";
    $webhookUrl = "https://your-domain.com/webhook.php";

    $apiKey = '346870348433472319';
    $secretkey = '12347832455789879';

    $fullname = "Alex";
    $email = "alex@gmail.com";
    $amount = '10';

    $metadata = array(
        'invoiceID' => '32452345234'
    );

    $data = array(
        'apiKey' => $apiKey,
        'secretkey' => $secretkey,
        'fullname' => $fullname,
        'email' => $email,
        'amount' => $amount,
        'successurl' => $successurl,
        'cancelurl' => $cancelurl,
        'webhookUrl' => $webhookUrl,
        'metadata' => json_encode($metadata)
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