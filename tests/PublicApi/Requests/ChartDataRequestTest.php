<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Requests;

use PHPUnit\Framework\TestCase;
use Poloniex\Models\CurrencyPair;
use Poloniex\PublicApi\Requests\ChartDataRequest;

class ChartDataRequestTest extends TestCase
{
    /**
     * @covers \Poloniex\PublicApi\Requests\ChartDataRequest::__construct
     * @return ChartDataRequest
     */
    public function testCanBeConstructed(): ChartDataRequest
    {
        $request = new ChartDataRequest(CurrencyPair::BTC_BELA, 0, 99999999, 86400);
        $this->assertInstanceOf('Poloniex\\PublicApi\\Requests\\ChartDataRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\ChartDataRequest::setController
     * @covers  \Poloniex\PublicApi\Requests\ChartDataRequest::getController
     * @param ChartDataRequest $request
     */
    public function testSetGetController(ChartDataRequest $request): void
    {
        $request->setController('testValue');
        $this->assertEquals('testValue', $request->getController());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\ChartDataRequest::setCurrencyPair
     * @covers  \Poloniex\PublicApi\Requests\ChartDataRequest::getCurrencyPair
     * @param ChartDataRequest $request
     */
    public function testSetGetCurrencyPair(ChartDataRequest $request): void
    {
        $request->setCurrencyPair(CurrencyPair::ETH_BCH);
        $this->assertEquals('ETH_BCH', $request->getCurrencyPair());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\ChartDataRequest::setStart
     * @covers  \Poloniex\PublicApi\Requests\ChartDataRequest::getStart
     * @param ChartDataRequest $request
     */
    public function testSetGetStart(ChartDataRequest $request): void
    {
        $request->setStart(11111111);
        $this->assertEquals(11111111, $request->getStart());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\ChartDataRequest::setEnd
     * @covers  \Poloniex\PublicApi\Requests\ChartDataRequest::getEnd
     * @param ChartDataRequest $request
     */
    public function testSetGetEnd(ChartDataRequest $request): void
    {
        $request->setEnd(22222222);
        $this->assertEquals(22222222, $request->getEnd());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\ChartDataRequest::setPeriod
     * @covers  \Poloniex\PublicApi\Requests\ChartDataRequest::getPeriod
     * @param ChartDataRequest $request
     */
    public function testSetGetPeriod(ChartDataRequest $request): void
    {
        $request->setPeriod(14400);
        $this->assertEquals(14400, $request->getPeriod());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\ChartDataRequest::withUri
     * @param ChartDataRequest $request
     */
    public function testWithUri(ChartDataRequest $request): void
    {
        $this->assertEquals('?command=testValue&currencyPair=ETH_BCH&start=11111111&end=22222222&period=14400',
            $request->withUri());
    }
}