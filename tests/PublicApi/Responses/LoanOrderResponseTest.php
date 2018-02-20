<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Responses;

use PHPUnit\Framework\TestCase;

class LoanOrderResponseTest extends TestCase
{
    const TEST = [
        'offers' => [
            [
                'rate' => 0.00007700,
                'amount' => 0.03610521,
                'rangeMin' => 2,
                'rangeMax' => 2
            ],
            [
                'rate' => 0.00008000,
                'amount' => 4.45246118,
                'rangeMin' => 2,
                'rangeMax' => 2
            ]
        ],
        'demands' => [
            [
                'rate' => 0.00000800,
                'amount' => 0.08707755,
                'rangeMin' => 2,
                'rangeMax' => 2
            ],
            [
                'rate' => 0.00000200,
                'amount' => 0.03321849,
                'rangeMin' => 2,
                'rangeMax' => 2
            ]
        ]
    ];

    /**
     * @covers \Poloniex\PublicApi\Responses\LoanOrderResponse::__construct
     * @return LoanOrderResponse
     */
    public function testCanBeConstructed(): LoanOrderResponse
    {
        $response = new LoanOrderResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Poloniex\\PublicApi\\Responses\\LoanOrderResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     *
     * @covers  \Poloniex\PublicApi\Responses\LoanOrderResponse::getOffers
     * @param LoanOrderResponse $response
     */
    public function testGetOffers(LoanOrderResponse $response): void
    {
        $this->assertEquals(self::TEST['offers'], $response->getOffers());
    }

    /**
     * @depends testCanBeConstructed
     *
     * @covers  \Poloniex\PublicApi\Responses\LoanOrderResponse::getDemands
     * @param LoanOrderResponse $response
     */
    public function testGetDemands(LoanOrderResponse $response): void
    {
        $this->assertEquals(self::TEST['demands'], $response->getDemands());
    }
}