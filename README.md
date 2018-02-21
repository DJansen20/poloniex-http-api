# Poloniex HTTP API client
Client implementation for the Poloniex HTTP API

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://php.net/)

# Installation
This package can be installed using composer
```text
composer require djansen20/poloniex-http-api dev-master
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

#### getDailyVolume
Returns the 24-hour volume for all markets, plus totals for primary currencies. 
Each returned market has the following properties.

|Property       | Description                                   |
|:--------------|:----------------------------------------------|
|baseVolume     |Volume in base currency (e.g BTC in BTC_BCN)   |                
|quoteVolume    |Volume in quote currency (e.g BCN in BTC_BCN)  |

Example request
```php
$api = PoloniexHttpApi::PublicApi();
$responseObject = $api->getDailyVolume();
$data = $responseObject->asArray();
```

Example response
```php
array(104) {
  ["BTC_BCN"]=>
  array(2) {
    ["BTC"]=>
    string(11) "54.13476343"
    ["BCN"]=>
    string(18) "111407382.31755247"
  }
  ["BTC_BELA"]=>
  array(2) {
    ["BTC"]=>
    string(10) "4.36484881"
    ["BELA"]=>
    string(15) "318971.34721168"
  }
  ...
  ["totalBTC"]=>
  string(14) "14101.39553898"
  ["totalETH"]=>
  string(13) "3206.73104864"
  ["totalUSDT"]=>
  string(18) "146242934.09559988"
  ["totalXMR"]=>
  string(13) "1041.71051366"
  ["totalXUSD"]=>
  string(10) "0.00000000"
}
```

#### getOrderBook
Returns the currency order book for the given pair. 
The first parameter to the function has to be a currencypair, the second parameter is optional to determine the depth.

You may set the currencyPair parameter to 'all' to get the data for all markets

Each response has the following properties

|Property       | Description                                   |
|:--------------|:----------------------------------------------|
|asks           |Current asks in the order book                 |                
|bids           |Current bids in the order book                 |
|isFrozen       |Boolean to check if the order book is frozen   |
|seq            |Sequence number for use with push api          |

Example request
```php
$api = PoloniexHttpApi::PublicApi();
$responseObject = $api->getOrderBook(\Poloniex\Models\CurrencyPair::USDT_BCH, 2);
$data = $responseObject->asArray();
```

Example response
```php
array(4) {
  ["asks"]=>
  array(2) {
    [0]=>
    array(2) {
      [0]=>
      string(13) "1299.52061526"
      [1]=>
      float(0.01)
    }
    [1]=>
    array(2) {
      [0]=>
      string(13) "1301.00000000"
      [1]=>
      float(0.82615439)
    }
  }
  ["bids"]=>
  array(2) {
    [0]=>
    array(2) {
      [0]=>
      string(13) "1299.52061509"
      [1]=>
      float(3.32059391)
    }
    [1]=>
    array(2) {
      [0]=>
      string(13) "1293.28756413"
      [1]=>
      float(15.14260483)
    }
  }
  ["isFrozen"]=>
  string(1) "0"
  ["seq"]=>
  int(53148248)
}
```

#### getTradeHistory
Returns the past 200 trades for a given market, or up to 50000 trades between a range specified in UNIX timestamps.

Each response has the following properties

|Property       | Description                                   |
|:--------------|:----------------------------------------------|
|globalTradeID  |Overal tradeID of all poloniex markets         |                
|tradeID        |TradeID of the given market                    |
|date           |Date at which the trade occured                |
|type           |Buy or sell                                    |
|rate           |At what ticker price the order was executed    |
|amount         |The amount bought                              |
|total          |The total cost for the trade                   |

Example request
```php
$api = PoloniexHttpApi::PublicApi();
$responseObject = $api->getTradeHistory(\Poloniex\Models\CurrencyPair::XMR_MAID, 1410158341, 1410499372);
$data = $responseObject->asArray();
```

Example response
```php
array(15) {
  [0]=>
  array(7) {
    ["globalTradeID"]=>
    int(2036160)
    ["tradeID"]=>
    int(109)
    ["date"]=>
    string(19) "2014-09-12 04:19:39"
    ["type"]=>
    string(4) "sell"
    ["rate"]=>
    string(10) "0.00100100"
    ["amount"]=>
    string(12) "182.42951471"
    ["total"]=>
    string(10) "0.18261194"
  }
  [1]=>
  array(7) {
    ["globalTradeID"]=>
    int(2036159)
    ["tradeID"]=>
    int(108)
    ["date"]=>
    string(19) "2014-09-12 04:19:39"
    ["type"]=>
    string(4) "sell"
    ["rate"]=>
    string(10) "0.00710010"
    ["amount"]=>
    string(12) "152.00000000"
    ["total"]=>
    string(10) "1.07921520"
  }
```

#### getChartData
Returns candlestick chart data. Required parameters are "currencyPair", "period" 
(candlestick period in seconds; valid values are 300, 900, 1800, 7200, 14400, and 86400), 
"start", and "end". "Start" and "end" are given in UNIX timestamp format and used to specify the date range for the data returned.

Each returned period has the following properties

|Property       | Description                                       |
|:--------------|:--------------------------------------------------|
|date           |Date at which the candlestick started              |                
|high           |Highest price during the candle                    |
|low            |Lowest price in the candle                         |
|open           |Open price of the candle                           |
|close          |Close price of the candle                          |
|volume         |Base volume during the candle (e.g BTC in BTC_XMR) |
|quoteVolume    |Quote volume during the candle (e.g XMR in BTC_XMR)|
|weightedAverage|Average price during the candle                    |

Example request
```php
$api = PoloniexHttpApi::PublicApi();
$responseObject = $api->getChartData(\Poloniex\Models\CurrencyPair::BTC_XMR, 1510158341, 9999999999, 86400);
$data = $responseObject->asArray();
```

Example response
```php
array(105) {
  [0]=>
  array(8) {
    ["date"]=>
    int(1510185600)
    ["high"]=>
    float(0.01725283)
    ["low"]=>
    float(0.01500069)
    ["open"]=>
    float(0.01523299)
    ["close"]=>
    float(0.0168699)
    ["volume"]=>
    float(1766.02561139)
    ["quoteVolume"]=>
    float(109182.67024292)
    ["weightedAverage"]=>
    float(0.01617496)
  }
  [1]=>
  array(8) {
    ["date"]=>
    int(1510272000)
    ["high"]=>
    float(0.01699997)
    ["low"]=>
    float(0.0155)
    ["open"]=>
    float(0.0168699)
    ["close"]=>
    float(0.01601257)
    ["volume"]=>
    float(1794.34874489)
    ["quoteVolume"]=>
    float(110576.71429265)
    ["weightedAverage"]=>
    float(0.01622718)
  }
}
```

#### getCurrencies
Returns information about currencies.

Each currency contains the following properties

|Property       | Description                                       |
|:--------------|:--------------------------------------------------|
|id             |Poloniex internal ID                               |                
|name           |Name of the currency                               |
|txFee          |Transaction fee                                    |
|minConf        |Minimum confirmations for network transaction      |
|depositAddress |Poloniex deposit address                           |
|disabled       |Boolean to check if the currency is disabled       |
|delisted       |Boolean to check if the currency is delisted       |
|frozen         |Boolean to check if the currency is frozen         |

Example request 
```php
$api = PoloniexHttpApi::PublicApi();
$responseObject = $api->getCurrencies();
$data = $responseObject->asArray();
```

Example response
```php
array(291) {
  ["1CR"]=>
  array(8) {
    ["id"]=>
    int(1)
    ["name"]=>
    string(7) "1CRedit"
    ["txFee"]=>
    string(10) "0.01000000"
    ["minConf"]=>
    int(3)
    ["depositAddress"]=>
    NULL
    ["disabled"]=>
    int(0)
    ["delisted"]=>
    int(1)
    ["frozen"]=>
    int(0)
  }
  ["ABY"]=>
  array(8) {
    ["id"]=>
    int(2)
    ["name"]=>
    string(7) "ArtByte"
    ["txFee"]=>
    string(10) "0.01000000"
    ["minConf"]=>
    int(8)
    ["depositAddress"]=>
    NULL
    ["disabled"]=>
    int(0)
    ["delisted"]=>
    int(1)
    ["frozen"]=>
    int(0)
  }
}
```

#### getLoanData
Returns the list of loan offers and demands for a given currency.

Each currency has the following properties.

|Property       | Description                                       |
|:--------------|:--------------------------------------------------|
|rate           |Interest rate                                      |                
|amount         |Amount available at given rate                     |
|rangeMin       |Shortest max days for the given rate               |
|rangeMax       |Longest max days for the given rate                |

Example request
```php
$api = PoloniexHttpApi::PublicApi();
$responseObject = $api->getLoanData('BTC');
$data = $responseObject->asArray();
```

Example response
```php
array(2) {
  ["offers"]=>
  array(50) {
    [0]=>
    array(4) {
      ["rate"]=>
      string(10) "0.00007200"
      ["amount"]=>
      string(10) "0.01997185"
      ["rangeMin"]=>
      int(2)
      ["rangeMax"]=>
      int(2)
    }
    [1]=>
    array(4) {
      ["rate"]=>
      string(10) "0.00007389"
      ["amount"]=>
      string(10) "0.01406117"
      ["rangeMin"]=>
      int(2)
      ["rangeMax"]=>
      int(2)
    }
    ...
  ["demands"]=>
  array(4) {
    [0]=>
    array(4) {
      ["rate"]=>
      string(10) "0.02000000"
      ["amount"]=>
      string(10) "0.00005250"
      ["rangeMin"]=>
      int(2)
      ["rangeMax"]=>
      int(2)
    }
    [1]=>
    array(4) {
      ["rate"]=>
      string(10) "0.00003010"
      ["amount"]=>
      string(10) "0.06571919"
      ["rangeMin"]=>
      int(2)
      ["rangeMax"]=>
      int(2)
    }
    ...
  }
}
```
 