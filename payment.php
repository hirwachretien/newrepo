<?php
require 'vendor/autoload.php'; // Make sure you have installed the Stripe PHP SDK using Composer

\Stripe\Stripe::setApiKey('your-secret-key'); // Replace with your Stripe secret key

header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

try {
    $charge = \Stripe\Charge::create([
        'amount' => 5000, // Amount in cents
        'currency' => 'usd',
        'description' => 'Example charge',
        'source' => $data['token'],
    ]);

    echo json_encode(['success' => true, 'charge' => $charge]);
} catch (\Stripe\Exception\CardException $e) {
    // Handle error
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
