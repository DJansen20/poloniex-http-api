<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Requests;

use Poloniex\PublicApi\Requests\CurrenciesRequest;
use PHPUnit\Framework\TestCase;

class CurrenciesRequestTest extends TestCase
{
    /**
     * @covers \Poloniex\PublicApi\Requests\CurrenciesRequest::__construct
     * @return CurrenciesRequest
     */
    public function testCanBeConstructed(): CurrenciesRequest
    {
        $request = new CurrenciesRequest();
        $this->assertInstanceOf('Poloniex\\PublicApi\\Requests\\CurrenciesRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\CurrenciesRequest::setController
     * @covers  \Poloniex\PublicApi\Requests\CurrenciesRequest::getController
     * @param CurrenciesRequest $request
     */
    public function testSetGetController(CurrenciesRequest $request): void
    {
        $request->setController('returnTest');
        $this->assertEquals('returnTest', $request->getController());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\CurrenciesRequest::withUri
     * @param CurrenciesRequest $request
     */
    public function testWithUri(CurrenciesRequest $request): void
    {
        $this->assertEquals('?command=returnTest', $request->withUri());
    }
}
