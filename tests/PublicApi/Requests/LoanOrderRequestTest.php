<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Requests;

use Poloniex\PublicApi\Requests\LoanOrderRequest;
use PHPUnit\Framework\TestCase;

class LoanOrderRequestTest extends TestCase
{
    /**
     * @covers \Poloniex\PublicApi\Requests\LoanOrderRequest::__construct
     * @return LoanOrderRequest
     */
    public function testCanBeConstructed(): LoanOrderRequest
    {
        $request = new LoanOrderRequest('btc');
        $this->assertInstanceOf('Poloniex\\PublicApi\\Requests\\LoanOrderRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\LoanOrderRequest::setController
     * @covers  \Poloniex\PublicApi\Requests\LoanOrderRequest::getController
     * @param LoanOrderRequest $request
     */
    public function testSetGetController(LoanOrderRequest $request): void
    {
        $request->setController('returnTest');
        $this->assertEquals('returnTest', $request->getController());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\LoanOrderRequest::setCurrency
     * @covers  \Poloniex\PublicApi\Requests\LoanOrderRequest::getCurrency
     * @param LoanOrderRequest $request
     */
    public function testSetGetCurrency(LoanOrderRequest $request): void
    {
        $request->setCurrency('maid');
        $this->assertEquals('maid', $request->getCurrency());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\LoanOrderRequest::withUri
     * @param LoanOrderRequest $request
     */
    public function testWithUri(LoanOrderRequest $request): void
    {
        $this->assertEquals('?command=returnTest&currency=maid', $request->withUri());
    }
}