<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Responses;

use PHPUnit\Framework\TestCase;
use Poloniex\PublicApi\Responses\CurrenciesResponse;

class CurrenciesResponseTest extends TestCase
{
    const TEST = [
        '1CR' => [
            'id' => 1,
            'name' => '1CRedit',
            'txFee' => 0.01000000,
            'minConf' => 3,
            'depositAddress' => null,
            'disabled' => 0,
            'delisted' => 1,
            'frozen' => 0
        ],
        'ABY' => [
            'id' => 2,
            'name' => 'ArtByte',
            'txFee' => 0.01000000,
            'minConf' => 8,
            'depositAddress' => null,
            'disabled' => 0,
            'delisted' => 1,
            'frozen' => 0 
        ]
    ];

    /**
     * @covers \Poloniex\PublicApi\Responses\CurrenciesResponse::__construct
     * @covers \Poloniex\PublicApi\Responses\CurrenciesResponse::setCurrencies
     * @return CurrenciesResponse
     */
    public function testCanBeConstructed(): CurrenciesResponse
    {
        $response = new CurrenciesResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Poloniex\\PublicApi\\Responses\\CurrenciesResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     *
     * @covers \Poloniex\PublicApi\Responses\CurrenciesResponse::getCurrencies
     * @param CurrenciesResponse $response
     */
    public function testGetCurrencies(CurrenciesResponse $response): void
    {
        $this->assertEquals(self::TEST, $response->getCurrencies());
    }
}