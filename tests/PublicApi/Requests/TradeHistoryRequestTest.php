<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Requests;

use PHPUnit\Framework\TestCase;
use Poloniex\Models\CurrencyPair;
use Poloniex\PublicApi\Requests\TradeHistoryRequest;

class TradeHistoryRequestTest extends TestCase
{
    /**
     * @covers \Poloniex\PublicApi\Requests\TradeHistoryRequest::__construct
     * @return TradeHistoryRequest
     */
    public function testCanBeConstructed(): TradeHistoryRequest
    {
        $request = new TradeHistoryRequest(CurrencyPair::BTC_BELA, 0, 99999999);
        $this->assertInstanceOf('Poloniex\\PublicApi\\Requests\\TradeHistoryRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\TradeHistoryRequest::setController
     * @covers  \Poloniex\PublicApi\Requests\TradeHistoryRequest::getController
     * @param TradeHistoryRequest $request
     */
    public function testSetGetController(TradeHistoryRequest $request): void
    {
        $request->setController('testValue');
        $this->assertEquals('testValue', $request->getController());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\TradeHistoryRequest::setCurrencyPair
     * @covers  \Poloniex\PublicApi\Requests\TradeHistoryRequest::getCurrencyPair
     * @param TradeHistoryRequest $request
     */
    public function testSetGetCurrencyPair(TradeHistoryRequest $request): void
    {
        $request->setCurrencyPair(CurrencyPair::BTC_BCH);
        $this->assertEquals('btc_bch', $request->getCurrencyPair());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\TradeHistoryRequest::setStart
     * @covers  \Poloniex\PublicApi\Requests\TradeHistoryRequest::getStart
     * @param TradeHistoryRequest $request
     */
    public function testSetGetStart(TradeHistoryRequest $request): void
    {
        $request->setStart(22222222);
        $this->assertEquals(22222222, $request->getStart());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\TradeHistoryRequest::setEnd
     * @covers  \Poloniex\PublicApi\Requests\TradeHistoryRequest::getEnd
     * @param TradeHistoryRequest $request
     */
    public function testSetGetEnd(TradeHistoryRequest $request): void
    {
        $request->setEnd(33333333);
        $this->assertEquals(33333333, $request->getEnd());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\TradeHistoryRequest::withUri
     * @param TradeHistoryRequest $request
     */
    public function testWithUri(TradeHistoryRequest $request): void
    {
        $this->assertEquals('?command=testValue&currencyPair=btc_bch&start=22222222&end=33333333',
            $request->withUri());
    }
}