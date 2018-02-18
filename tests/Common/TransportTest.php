<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\Common;

use Poloniex\PublicApi\Requests\TickerRequest;
use PHPUnit\Framework\TestCase;

use Poloniex\Common\Transport;


class TransportTest extends TestCase
{
    /**
     * Test if the Transport object can be created
     *
     * @return Transport
     * @throws \Exception
     */
    public function testCanBeConstructed(): Transport
    {
        $transport = new Transport();
        $this->assertInstanceOf('Poloniex\\Common\\Transport', $transport);
        return $transport;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\Common\Transport::send
     * @covers \Poloniex\Common\Transport::buildUrl
     *
     * @param Transport $transport
     * @return Transport
     * @throws \Exception
     */
    public function testCanSendRequest(Transport $transport): Transport
    {
        $request = new TickerRequest();
        $response = $transport->send($request);
        $this->assertNotEmpty($response);
        $this->assertJson($response);
        return $transport;
    }
}
