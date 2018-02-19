<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi;

use PHPUnit\Framework\TestCase;
use Poloniex\Models\CurrencyPair;
use Poloniex\PublicApi\PublicApi;

class PublicApiTest extends TestCase
{
    /**
     * @covers \Poloniex\PublicApi\PublicApi::__construct
     * @return PublicApi
     */
    public function testCanBeConstructed(): PublicApi
    {
        $api = new PublicApi();
        $this->assertInstanceOf('\\Poloniex\\PublicApi\\PublicAPi', $api);

        return $api;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\PublicApi\PublicApi::getDailyTicker
     *
     * @param PublicApi $api
     * @throws \Exception
     */
    public function testGetDailyTicker(PublicApi $api): void
    {
        $response = $api->getDailyTicker();
        $this->assertInstanceOf('\\Poloniex\\PublicApi\\Responses\\TickerResponse', $response);
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\PublicApi\PublicApi::getDailyVolume
     *
     * @param PublicApi $api
     * @throws \Exception
     */
    public function testGetDailyVolume(PublicApi $api): void
    {
        $response = $api->getDailyVolume();
        $this->assertInstanceOf('\\Poloniex\\PublicApi\\Responses\\VolumeResponse', $response);
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\PublicApi\PublicApi::getOrderBook
     * @param PublicApi $api
     * @throws \Exception
     */
    public function testGetOrderBook(PublicApi $api): void
    {
        $response = $api->getOrderBook(CurrencyPair::ETH_BCH, 1);
        $this->assertInstanceOf('\\Poloniex\\PublicApi\\Responses\\OrderbookResponse', $response);
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\PublicApi\PublicApi::getTradeHistory
     * @param PublicApi $api
     * @throws \Exception
     */
    public function testGetTradeHistory(PublicApi $api): void
    {
        $response = $api->getTradeHistory(CurrencyPair::XMR_BCN, 0, 9999999999);
        $this->assertInstanceOf('\\Poloniex\\PublicApi\\Responses\\TradeHistoryResponse', $response);
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\PublicApi\PublicApi::getChartData
     * @param PublicApi $api
     * @throws \Exception
     */
    public function testGetChartData(PublicApi $api): void
    {
        $response = $api->getChartData(CurrencyPair::XMR_LTC);
        $this->assertInstanceOf('\\Poloniex\\PublicApi\\Responses\\ChartDataResponse', $response);
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\PublicApi\PublicApi::getCurrencies
     * @param PublicApi $api
     * @throws \Exception
     */
    public function testGetCurrencies(PublicApi $api): void
    {
        $response = $api->getCurrencies();
        $this->assertInstanceOf('\\Poloniex\\PublicApi\\Responses\\CurrenciesResponse', $response);
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\PublicApi\PublicApi::getLoanData
     * @param PublicApi $api
     * @throws \Exception
     */
    public function getLoanData(PublicApi $api): void
    {
        $response = $api->getLoanData('DOGE');
        $this->assertInstanceOf('\\Poloniex\\PublicApi\\Responses\\LoandOrderResponse', $response);
    }
}