<?php

require 'vendor/autoload.php';

use BaseWalletQuery\BaseWalletQuery;

$apiKey = ' Your API Key here';
$walletAddress = ' Your Wallet Address here';

$balancesQuery = new BaseWalletQuery([
    'BASE_URL' => 'https://api.covalenthq.com',
    'CHAIN' => 'base-mainnet', // or 'base-testnet'
    'API_KEY' => $apiKey
]);
$balances = $balancesQuery->QueryWalletBalances($walletAddress);

if ($balances !== null) {
    print_r($balances);
}
