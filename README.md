# BaseWalletQuery PHP Package

## Overview

BaseWalletQuery is a PHP package designed to simplify the process of querying wallet balances on the Base blockchain using the CovalentHQ API. This package provides a straightforward interface to fetch wallet balances, making it easy for developers to integrate blockchain data into their PHP applications.

## Installation

To install the package, use Composer:

```bash
composer require base-wallet-query-sdk/base-wallet-query-sdk
```

## Usage

### Initialization

First, you need to include the package and initialize the `BaseWalletQuery` class with the necessary configuration. You will need an API key from CovalentHQ.

```php
use BaseWalletQuery\BaseWalletQuery;

$apiKey = 'Your API Key here';
$walletAddress = 'Your Wallet Address here';

$polygonQuery = new BaseWalletQuery([
    'BASE_URL' => '', // The base URL for the API
    'CHAIN' => 'base-testnet', // or 'base-testnet'
    'API_KEY' => $apiKey
]);
```

### Methods

#### QueryWalletBalances

Fetches the balances of the specified wallet address.

**Arguments:**
- `walletAddress` (string): The address of the wallet you want to query.

**Usage:**

```php
$balances = $polygonQuery->QueryWalletBalances($walletAddress);
print_r($balances);
```

### Example

Here is a complete example of how to use the BaseWalletQuery package to get the balances of a wallet:

```php
<?php

require 'vendor/autoload.php';

use BaseWalletQuery\BaseWalletQuery;

$apiKey = 'Your API Key here';
$walletAddress = 'Your Wallet Address here';

$balancesQuery = new BaseWalletQuery([
    'BASE_URL' => 'https://api.covalenthq.com', // Base URL for CovalentHQ API
    'CHAIN' => 'base-mainnet', // or 'base-testnet'
    'API_KEY' => $apiKey
]);

try {
    $balances = $balancesQuery->QueryWalletBalances($walletAddress);
    print_r($balances);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
```

## Configuration

- **BASE_URL**: The base URL for the CovalentHQ API. Typically, this will be `https://api.covalenthq.com/v1`.
- **CHAIN**: The blockchain network to query. Options are `base-mainnet` or `base-testnet`.
- **API_KEY**: Your CovalentHQ API key.

## License

This package is open-sourced software licensed under the MIT license.

## Contributing

Contributions are welcome! Please submit pull requests to the `develop` branch.

## Support

For any issues or questions, please open an issue on the [GitHub repository](https://github.com/fujahgabriel/base-wallet-query-sdk).

---

Thank you for using BaseWalletQuery! We hope this package makes it easier for you to interact with the Base blockchain.