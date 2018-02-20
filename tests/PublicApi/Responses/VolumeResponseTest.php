<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Responses;

use PHPUnit\Framework\TestCase;
use Poloniex\PublicApi\Responses\VolumeResponse;

class VolumeResponseTest extends TestCase
{
    const TEST = [
        'BTC_BCN' => [
            'btc' => 34.39011863,
            'bcn' => 65319515.56772284

        ],
        'BTC_BELA' => [
            'btc' => 2.03956298,
            'bela' => 139819.30049112
        ]
    ];

    /**
     * @covers \Poloniex\PublicApi\Responses\VolumeResponse::__construct
     * @return VolumeResponse
     */
    public function testCanBeConstructed(): VolumeResponse
    {
        $response = new VolumeResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Poloniex\\PublicApi\\Responses\\VolumeResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     *
     * @covers \Poloniex\PublicApi\Responses\VolumeResponse::getCurrencyPairs
     * @param VolumeResponse $response
     */
    public function testGetCurrencyPairs(VolumeResponse $response): void
    {
        $this->assertEquals(self::TEST, $response->getCurrencyPairs());
    }
}
