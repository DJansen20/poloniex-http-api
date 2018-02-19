<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Responses;

use PHPUnit\Framework\TestCase;
use Poloniex\PublicApi\Responses\TradeHistoryResponse;

class TradeHistoryResponseTest extends TestCase
{
    const TEST = [
        [
            'globalTradeID' => 2036467,
            'tradeID' => 21387,
            'date' => '2014-09-12 05:21:26',
            'type' => 'buy',
            'rate' => 0.00008943,
            'amount' => 1.27241180,
            'total' => 0.00011379

        ],
        [
            'globalTradeID' => 2036467,
            'tradeID' => 21387,
            'date' => '2014-09-12 05:21:26',
            'type' => 'buy',
            'rate' => 0.00008943,
            'amount' => 1.27241180,
            'total' => 0.00011379
        ]
    ];

    /**
     * @covers \Poloniex\PublicApi\Responses\TradeHistoryResponse::__construct
     * @covers \Poloniex\PublicApi\Responses\TradeHistoryResponse::setTradeHistory
     * @return TradeHistoryResponse
     */
    public function testCanBeConstructed(): TradeHistoryResponse
    {
        $response = new TradeHistoryResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Poloniex\\PublicApi\\Responses\\TradeHistoryResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     *
     * @covers  \Poloniex\PublicApi\Responses\TradeHistoryResponse::getTradeHistory
     * @param TradeHistoryResponse $response
     */
    public function testGetCurrencyPairs(TradeHistoryResponse $response): void
    {
        $this->assertEquals(self::TEST, $response->getTradeHistory());
    }
}
