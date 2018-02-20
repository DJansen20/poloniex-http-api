<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Responses;

use PHPUnit\Framework\TestCase;
use Poloniex\PublicApi\Responses\ChartDataResponse;

class ChartDataResponseTest extends TestCase
{
    const TEST = [
        [
            'date' => '2014-02-10 04:23:23',
            'high' => 0.0045388,
            'low' => 0.00403001,
            'open' => 0.00404545,
            'close' => 0.00427592,
            'volume' => 44.11655644,
            'quoteVolume' => 10259.29079097,
            'weightedAverage' => 0.00430015
        ],
        [
            'date' => '2014-02-10 04:23:23',
            'high' => 0.0045388,
            'low' => 0.00403001,
            'open' => 0.00404545,
            'close' => 0.00427592,
            'volume' => 44.11655644,
            'quoteVolume' => 10259.29079097,
            'weightedAverage' => 0.00430015
        ]
    ];

    /**
     * @covers \Poloniex\PublicApi\Responses\ChartDataResponse::__construct
     * @return ChartDataResponse
     */
    public function testCanBeConstructed(): ChartDataResponse
    {
        $response = new ChartDataResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Poloniex\\PublicApi\\Responses\\ChartDataResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     *
     * @covers \Poloniex\PublicApi\Responses\ChartDataResponse::getChartData
     * @param ChartDataResponse $response
     */
    public function testGetChartData(ChartDataResponse $response): void
    {
        $this->assertEquals(self::TEST, $response->getChartData());
    }
}
