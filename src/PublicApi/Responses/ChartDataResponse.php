<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Responses;

use Poloniex\Common\Response;

class ChartDataResponse extends Response
{
    /**
     * @var array
     */
    private $chartData;

    /**
     * ChartDataResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        $data = json_decode($json, true);
        $this->setChartData($data);
    }

    /**
     * @return mixed
     */
    public function getChartData(): array
    {
        return $this->chartData;
    }

    /**
     * @param mixed $chartData
     * @return ChartDataResponse
     */
    public function setChartData(array $chartData): ChartDataResponse
    {
        $this->chartData = $chartData;
        return $this;
    }
}
