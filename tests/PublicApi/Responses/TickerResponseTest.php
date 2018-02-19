<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Responses;

use PHPUnit\Framework\TestCase;
use Poloniex\PublicApi\Responses\TickerResponse;

class TickerResponseTest extends TestCase
{
    const TEST = [
        'BTC_BCN' => [
            'id' => 7,
            'last' => 0.00000052,
            'lowestAsk' => 0.00000053,
            'highestBid' => 0.00000052,
            'percentChange' => 0.00000000,
            'baseVolume' => 33.33676796,
            'quoteVolume' => 63252367.46913956,
            'isFrozen' => 0,
            'high24hr' => 0.00000054,
            'low24hr' => 0.00000051

        ],
        'BTC_BELA' => [
            'id' => 8,
            'last' => 0.00001448,
            'lowestAsk' => 0.00001448,
            'highestBid' => 0.00001441,
            'percentChange' => -0.04422442,
            'baseVolume' => 1.81685351,
            'quoteVolume' => 124224.65649630,
            'isFrozen' => 0,
            'high24hr' => 0.00001515,
            'low24hr' => 0.00001431
        ]
    ];

    /**
     * @covers \Poloniex\PublicApi\Responses\TickerResponse::__construct
     * @covers \Poloniex\PublicApi\Responses\TickerResponse::setCurrencyPairs
     * @return TickerResponse
     */
    public function testCanBeConstructed(): TickerResponse
    {
        $response = new TickerResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Poloniex\\PublicApi\\Responses\\TickerResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     *
     * @covers \Poloniex\PublicApi\Responses\TickerResponse::getCurrencyPairs
     * @param TickerResponse $response
     */
    public function testGetCurrencyPairs(TickerResponse $response): void
    {
        $this->assertEquals(self::TEST, $response->getCurrencyPairs());
    }
}
