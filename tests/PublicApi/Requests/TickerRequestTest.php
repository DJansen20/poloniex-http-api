<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Requests;

use Poloniex\PublicApi\Requests\TickerRequest;
use PHPUnit\Framework\TestCase;

class TickerRequestTest extends TestCase
{
    /**
     * @covers \Poloniex\PublicApi\Requests\TickerRequest::__construct
     * @return TickerRequest
     */
    public function testCanBeConstructed(): TickerRequest
    {
        $request = new TickerRequest();
        $this->assertInstanceOf('Poloniex\\PublicApi\\Requests\\TickerRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\TickerRequest::setController
     * @covers  \Poloniex\PublicApi\Requests\TickerRequest::getController
     * @param TickerRequest $request
     */
    public function testSetGetController(TickerRequest $request): void
    {
        $request->setController('returnTest');
        $this->assertEquals('returnTest', $request->getController());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\TickerRequest::withUri
     * @param TickerRequest $request
     */
    public function testWithUri(TickerRequest $request): void
    {
        $this->assertEquals('?command=returnTest', $request->withUri());
    }
}
