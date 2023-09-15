# Blockgum PHP Library Documentation

## Introduction

The Blockgum PHP library is designed to simplify interactions with the Blockgum API, allowing developers to integrate various blockchain-related functionalities into their PHP applications. This library provides methods to create addresses, retrieve transaction information, send transactions, and more.

## Installation

To use the Blockgum PHP library, follow these steps:

1. **Include the Library**: Include the `Blockgum.php` file in your PHP project:

   ```php
   require_once 'Blockgum.php';
   ```

2. **Initialize the Blockgum Object**: Create an instance of the `Blockgum` class with the necessary configuration options:

   ```php
   $bg_config = [
       'api_url' => 'https://api.blockgum.io', // Blockgum API URL
       'chain' => 'eth',                        // Blockchain chain (e.g., 'eth', 'bsc', 'matic')
       'jwt_token' => 'YOUR_JWT_TOKEN',         // JWT Token for authentication
       'client_id' => 'YOUR_CLIENT_ID',         // Client ID for authentication
       'security_type' => 1,                   // Security type (0 for off, 1 for on)
   ];

   $blockgum = new Common\Ext\Blockgum($bg_config);
   ```

## Methods

### Creating Addresses

#### `createAddress($uid)`

Creates a new blockchain address for a user identified by their unique ID.

```php
$uid = '23236';
$response = $blockgum->createAddress($uid);
```

### Searching by User ID

#### `searchByUid($uid)`

Retrieves blockchain data associated with a user identified by their unique ID.

```php
$uid = '23236';
$response = $blockgum->searchByUid($uid);
```

### Creating 10,000 Addresses

#### `create10k($start, $limit)`

Creates a batch of blockchain addresses starting from a specific index.

```php
$start = 0;    // Starting index
$limit = 100;  // Number of addresses to create
$response = $blockgum->create10k($start, $limit);
```

### Searching for Addresses

#### `searchAddresses($address)`

Searches for blockchain addresses based on a provided address.

```php
$address = '0x123abc...';
$response = $blockgum->searchAddresses($address);
```

### Wildcard Search

#### `wildcardSearch($type, $term)`

Performs a wildcard search for blockchain data based on the specified type and search term.

```php
$type = 'type';       // Search type
$term = 'searchterm'; // Search term
$response = $blockgum->wildcardSearch($type, $term);
```

### Getting Withdrawal Information

#### `getWithdrawalInfo($order_id)`

Retrieves withdrawal information for a specific order ID.

```php
$order_id = 'order123';
$response = $blockgum->getWithdrawalInfo($order_id);
```

### Transaction Details

#### `transaction($tx_hash)`

Retrieves details of a blockchain transaction by its transaction hash.

```php
$tx_hash = '0xabcdef...';
$response = $blockgum->transaction($tx_hash);
```

### Transaction Info from Database

#### `transactionInfoDb($where, $tx_hash)`

Retrieves transaction information from the database based on a specific condition and transaction hash.

```php
$where = 'condition';   // Database condition
$tx_hash = '0xabcdef...';
$response = $blockgum->transactionInfoDb($where, $tx_hash);
```

### Trace Deposit

#### `traceDeposit($tx_hash)`

Traces a deposit transaction using its transaction hash.

```php
$tx_hash = '0xabcdef...';
$response = $blockgum->traceDeposit($tx_hash);
```

### Getting Address Lists

#### `getAddressList($page = -1)`

Retrieves a list of blockchain addresses with optional pagination.

```php
$page = 1; // Page number (optional)
$response = $blockgum->getAddressList($page);
```

### Watching Tokens

#### `watchToken($contact)`

Watches a token based on the contact information.

```php
$contact = 'token_contact';
$response = $blockgum->watchToken($contact);
```

### Deleting Tokens

#### `deleteToken($contact)`

Deletes a token based on the contact information.

```php
$contact = 'token_contact';
$response = $blockgum->deleteToken($contact);
```

### Retrieving Statistics

#### `stats()`

Retrieves statistics related to the Blockgum service.

```php
$response = $blockgum->stats();
```

### Retrieving Token List

#### `getTokenList()`

Retrieves a list of available tokens.

```php
$response = $blockgum->getTokenList();
```

### Moving Deposits to Main Account

#### `moveDepositsToMainAccount()`

Moves deposits to the main account.

```php
$response = $blockgum->moveDepositsToMainAccount();
```

### Restarting the Server

#### `restartServer()`

Restarts the Blockgum server.

```php
$response = $blockgum->restartServer();
```

### About Blockgum

#### `about()`

Retrieves information about the Blockgum service.

```php
$response = $blockgum->about();
```

### Checking Advanced Security

#### `isAdvancedSecurity()`

Checks if advanced security is enabled.

```php
$response = $blockgum->isAdvancedSecurity();
```

### Shutting Down the Server

#### `shutdownServer()`

Shuts down the Blockgum server.

```php
$response = $blockgum->shutdownServer();
```

### Signing into the API

#### `signInAPI()`

Signs into the Blockgum API.

```php
$response = $blockgum->signInAPI();
```

## Additional Functions

### Amount Decoding

#### `amount_decode($val, $decimals = null)`

Decodes an amount by dividing it by the specified number of decimals.

```php
$val = '1000000000000000000'; // Amount in wei
$decimals = 18;                // Number of decimals (optional, uses default if not provided)
$decodedAmount = $blockgum->amount_decode($val, $decimals);
```

### Amount Encoding

#### `amount_encode($amount, $decimals = null)`

Encodes an amount by multiplying it by the specified number of decimals.

```php
$amount = '1.23456789'; // Amount
$decimals = 18;         // Number of decimals (optional, uses default if not provided)
$encodedAmount = $blockgum->amount_encode($amount, $decimals);
```

## Private Methods

The Blockgum PHP library also includes various private methods used internally for handling requests, generating JWT tokens, and more. These methods are not intended for direct use in your application.

## Error Handling

The Blockgum PHP library includes basic error handling to help you manage and troubleshoot issues that may arise during API interactions. When an error occurs, the library returns an associative array with the following structure:

- `status` (integer): Indicates the status of the operation. A value of `0` typically indicates an error.
- `error` (string): Provides a human-readable error message describing the issue.
- `errorCode` (string, optional): Specifies an error code to further categorize the error.

Here's an example of how to handle errors using the returned array:

```php
$response = $blockgum->someMethod();

if ($response['status'] === 0) {
    // An error occurred
    $errorCode = $response['errorCode'] ?? null;
    $errorMessage = $response['error'];
    
    // Handle the error based on the errorCode or errorMessage
    // You can log the error, display a user-friendly message, or take appropriate action.
} else {
    // The operation was successful, process the response data as needed.
}
