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
        parent::__construct($json);
        $this->currencyPairs = $this->data;
    }

    /**
     * @return array
     */
    public function getCurrencyPairs(): array
    {
        return $this->currencyPairs;
    }
}
