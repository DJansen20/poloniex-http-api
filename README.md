# Poloniex HTTP API client
Client implementation for the Poloniex HTTP API

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://php.net/)

# Installation
This package can be installed using composer
```text
composer require djansen20/poloniex-http-api dev master
```

## Usage
In order to use this library, include the following namespace into your project
```php
use Poloniex\PoloniexHttpApi
```

All methods will return a response object that can be converted to json or to a usable array.
```php
# To get data as array
$array = $response->asArray();

# Or Json
$json = $response->jsonSerialize(); 
```

### Request limit
Poloniex asks to keep the amount of calls to the Public API to 6 request per second. 
Repeatedly and needlessly fetching excessive amount of data may result in your IP being banned.

### Trading pair constants
Some API calls require you to provide a trading pair.
You can make use of the CurrencyPair class constants to get the right strings expected by the API.

```php
use \Poloniex\Models\\CurrencyPair;
$pair = CurrencyPair::USDT_BTC;
```

If you do not wish to use the CurrencyPair constants you need to provide a valid string of the currencypair in uppercase. e.g USDT_BTC

### Public Methods
This package allows you to use the public API without supplying account credentials.
To retrieve an instance of the public API, call the following method
```php
$api = PoloniexHttpApi::PublicApi();
```

Now you can start requesting data from the API.

#### getDailyTicker
Returns ticker data of the past day for all currencies. 
The returned object contains an array for each currency. Each currency has the following properties.

|Property       | Description                                   |
|:--------------|:----------------------------------------------|
|id             |Poloniex internal ID                           |                
|last           |Last price                                     |   
|lowestAsk      |Lowest ask price                               |
|HighestBid     |Highest bid price                              |
|percentChange  |Percentage changed in the past 24hr            |
|baseVolume     |Volume in base currency (e.g BTC in BTC_BCN)   |
|quoteVolume    |Volume in quote currency (e.g BCN in BTC_BCN   |
|isFrozen       |Boolean to check if the pair is frozen         |
|high24hr       |Highest price in the past 24hr                 |
|low24hr        |Lowest price in the past 24hr                  |

Example request
```php
$api = PoloniexHttpApi::PublicApi();
$responseObject = $api->getDailyTicker();
$data = $responseObject->asArray();
```

Example response
```php
array(99) {
  ["BTC_BCN"]=>
  array(10) {
    ["id"]=>
    int(7)
    ["last"]=>
    string(10) "0.00000048"
    ["lowestAsk"]=>
    string(10) "0.00000049"
    ["highestBid"]=>
    string(10) "0.00000048"
    ["percentChange"]=>
    string(11) "-0.07692307"
    ["baseVolume"]=>
    string(11) "58.98148207"
    ["quoteVolume"]=>
    string(18) "117273515.50009523"
    ["isFrozen"]=>
    string(1) "0"
    ["high24hr"]=>
    string(10) "0.00000053"
    ["low24hr"]=>
    string(10) "0.00000046"
  }
  ["BTC_BELA"]=>
  array(10) {
    ["id"]=>
    int(8)
    ["last"]=>
    string(10) "0.00001290"
    ["lowestAsk"]=>
    string(10) "0.00001302"
    ["highestBid"]=>
    string(10) "0.00001290"
    ["percentChange"]=>
    string(11) "-0.06045156"
    ["baseVolume"]=>
    string(10) "2.35221818"
    ["quoteVolume"]=>
    string(15) "180690.09194013"
    ["isFrozen"]=>
    string(1) "0"
    ["high24hr"]=>
    string(10) "0.00001373"
    ["low24hr"]=>
    string(10) "0.00001250"
  }
  ...
}
```