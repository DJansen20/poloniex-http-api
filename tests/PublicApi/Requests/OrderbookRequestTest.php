<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Requests;

use Poloniex\Models\CurrencyPair;
use Poloniex\PublicApi\Requests\OrderbookRequest;
use PHPUnit\Framework\TestCase;

class OrderbookRequestTest extends TestCase
{
    /**
     * @covers \Poloniex\PublicApi\Requests\OrderbookRequest::__construct
     * @return OrderbookRequest
     */
    public function testCanBeConstructed(): OrderbookRequest
    {
        $request = new OrderbookRequest(CurrencyPair::BTC_BTM, 5);
        $this->assertInstanceOf('Poloniex\\PublicApi\\Requests\\OrderbookRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\OrderbookRequest::setController
     * @covers  \Poloniex\PublicApi\Requests\OrderbookRequest::getController
     * @param OrderbookRequest $request
     */
    public function testSetGetController(OrderbookRequest $request): void
    {
        $request->setController('returnTest');
        $this->assertEquals('returnTest', $request->getController());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\OrderbookRequest::setCurrencyPair
     * @covers  \Poloniex\PublicApi\Requests\OrderbookRequest::getCurrencyPair
     * @param OrderbookRequest $request
     */
    public function testSetGetCurrencyPair(OrderbookRequest $request): void
    {
        $request->setCurrencyPair(CurrencyPair::XMR_BLK);
        $this->assertEquals('xmr_blk', $request->getCurrencyPair());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\OrderbookRequest::setDepth
     * @covers  \Poloniex\PublicApi\Requests\OrderbookRequest::getDepth
     * @param OrderbookRequest $request
     */
    public function testSetGetDepth(OrderbookRequest $request): void
    {
        $request->setDepth(7);
        $this->assertEquals(7, $request->getDepth());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\OrderbookRequest::withUri
     * @param OrderbookRequest $request
     */
    public function testWithUri(OrderbookRequest $request): void
    {
        $this->assertEquals('?command=returnTest&currencyPair=xmr_blk&depth=7', $request->withUri());
    }
}