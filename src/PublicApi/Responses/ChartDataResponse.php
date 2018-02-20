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
        parent::__construct($json);
        $this->chartData = $this->data;
    }

    /**
     * @return array
     */
    public function getChartData(): array
    {
        return $this->chartData;
    }
}
