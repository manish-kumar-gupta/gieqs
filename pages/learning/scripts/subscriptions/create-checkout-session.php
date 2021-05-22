<?php
$openaccess = 1;

//$requiredUserLevel = 6;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

error_reporting(E_ALL);

require_once BASE_URI . "/vendor/autoload.php";
error_reporting(E_ALL);

spl_autoload_unregister ('class_loader');
error_reporting(E_ALL);

use Stripe\Stripe;

\Stripe\Stripe::setApiKey('sk_test_51IsKqwEBnLMnXjoguHzjHquozIjRT1Wt5OuLAQqxJvkUvX6DwMebWAPwgXsWaW35r5WXk1m6CuxtkY72I6QNLpH200No1l1SwU');
error_reporting(E_ALL);

header('Content-Type: application/json');
error_reporting(E_ALL);
error_reporting(E_ALL);

$YOUR_DOMAIN = BASE_URL . '/pages/learning/scripts/subscriptions';
//echo $YOUR_DOMAIN;
error_reporting(E_ALL);

 $checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'eur',
      'unit_amount' => 500,
      'product_data' => [
        'name' => 'GIEQs Pro Subscription - Physician',
        'images' => ["https://i.imgur.com/EHyR2nP.png"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

//print_r($checkout_session);

echo json_encode(['id' => $checkout_session->id]);