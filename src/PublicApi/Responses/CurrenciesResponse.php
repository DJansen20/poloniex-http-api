<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Responses;

use Poloniex\Common\Response;

class CurrenciesResponse extends Response
{
    /**
     * @var array
     */
    private $currencies;

    /**
     * CurrenciesResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        $data = json_decode($json, true);
        $this->setCurrencies($data);
    }

    /**
     * @return array
     */
    public function getCurrencies(): array
    {
        return $this->currencies;
    }

    /**
     * @param array $currencies
     * @return CurrenciesResponse
     */
    public function setCurrencies(array $currencies): CurrenciesResponse
    {
        $this->currencies = $currencies;
        return $this;
    }
}
