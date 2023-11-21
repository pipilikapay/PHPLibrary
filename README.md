# PHP CURL Example Code

![PipilikaPay Logo]([https://uddoktapay.com/assets/images/logo.png](https://pipilikapay.com/public/logo.png))

This is a simple PHP CURL checkout example of PipilikaPay.


### NOTE: 
#### Checkout-V1 => All response will send into webhook url with REST API CALL.

# Checkout-V1 Documents

## Step 1: Create Charge Checkout-V1

Here you will get charge response into $result variable.

```bash
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

```


## Checkout-V1 Charge Response Example:

```bash
[ 
    {
      "status": "success",
      "paymentID": "54646345345",
      "paymentURL": "https://pay.your-domain.com/payment/portal?ref=34645634634635"
    }
]
```


## Step 2: Complete Payment

## Step 3: Get Response & Verify Payment

Here you will get webhook response into $input variable.

```bash
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $input = file_get_contents('php://input');
      $input = json_decode($input, true);

      echo "Webhook Data Received:\n";
      print_r($input);
   }
```

## Checkout-V1 Webhook Response Example:
```bash
  {
    "full_name": "Alex",
    "email": "alex@gmail.com",
    "amount": "500",
    "fee": "15",
    "payment_id": "456456346",
    "metadata": {
      "user_id": "55",
      "order_id": "43"
    },
    "payment_method": "Bkash",
    "transaction_id": "234523452345",
    "date": "2023-01-07 14:00:50",
    "status": "Completed"
  }
```

Enjoy
