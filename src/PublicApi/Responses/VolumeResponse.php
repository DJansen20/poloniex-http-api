<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Responses;

use Poloniex\Common\Response;

class VolumeResponse extends Response
{
    /**
     * @var array
     */
    private $currencyPairs;

    /**
     * VolumeResponse constructor.
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
     * @return VolumeResponse
     */
    public function setCurrencyPairs(array $currencyPairs): VolumeResponse
    {
        $this->currencyPairs = $currencyPairs;
        return $this;
    }
}
