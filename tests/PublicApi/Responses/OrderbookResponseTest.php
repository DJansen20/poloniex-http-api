<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Responses;

use PHPUnit\Framework\TestCase;

class OrderbookResponseTest extends TestCase
{
    const TEST = [
        'asks' => [
            [
                0.00002354,
                442.82316847
            ],
            [
                0.00002362,
                513.83487075
            ]
        ],
        'bids' => [
            [
                0.00002346,
                7335.413
            ],
            [
                0.00002343,
                2065.95624073
            ]
        ],
        'isFrozen' => 0,
        'seq' => 70056915
    ];

    /**
     * @covers \Poloniex\PublicApi\Responses\OrderbookResponse::__construct
     * @covers \Poloniex\PublicApi\Responses\OrderbookResponse::setAsks
     * @covers \Poloniex\PublicApi\Responses\OrderbookResponse::setBids
     * @covers \Poloniex\PublicApi\Responses\OrderbookResponse::setIsFrozen
     * @covers \Poloniex\PublicApi\Responses\OrderbookResponse::setSeq
     * @return OrderbookResponse
     */
    public function testCanBeConstructed(): OrderbookResponse
    {
        $response = new OrderbookResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Poloniex\\PublicApi\\Responses\\OrderbookResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     *
     * @covers  \Poloniex\PublicApi\Responses\OrderbookResponse::getAsks
     * @param OrderbookResponse $response
     */
    public function testGetAsks(OrderbookResponse $response): void
    {
        $this->assertEquals(self::TEST['asks'], $response->getAsks());
    }

    /**
     * @depends testCanBeConstructed
     *
     * @covers  \Poloniex\PublicApi\Responses\OrderbookResponse::getBids
     * @param OrderbookResponse $response
     */
    public function testGetBids(OrderbookResponse $response): void
    {
        $this->assertEquals(self::TEST['bids'], $response->getBids());
    }

    /**
     * @depends testCanBeConstructed
     *
     * @covers  \Poloniex\PublicApi\Responses\OrderbookResponse::isFrozen
     * @param OrderbookResponse $response
     */
    public function testIsFrozen(OrderbookResponse $response): void
    {
        $this->assertEquals(self::TEST['isFrozen'], $response->isFrozen());
    }

    /**
     * @depends testCanBeConstructed
     *
     * @covers  \Poloniex\PublicApi\Responses\OrderbookResponse::getSeq
     * @param OrderbookResponse $response
     */
    public function testGetSeq(OrderbookResponse $response): void
    {
        $this->assertEquals(self::TEST['seq'], $response->getSeq());
    }
}
