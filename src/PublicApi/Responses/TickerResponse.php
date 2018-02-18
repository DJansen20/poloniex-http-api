<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Responses;

use Poloniex\Common\Response;

class TickerResponse extends Response
{
    /**
     * @var array
     */
    private $currencyPairs;

    /**
     * TickerResponse constructor.
     * @param string $json
     */
    public function __construct(string $json) {
        $data = json_decode($json, true);
        $this->setCurrencyPairs($data);
    }

    /**
     * @return array
     */
    public function getCurrencyPairs(): array
    {
        return $this->currencyPairs;
    }

    /**
     * @param array $currencyPairs
     * @return TickerResponse
     */
    public function setCurrencyPairs(array $currencyPairs): TickerResponse
    {
        $this->currencyPairs = $currencyPairs;
        return $this;
    }
}
