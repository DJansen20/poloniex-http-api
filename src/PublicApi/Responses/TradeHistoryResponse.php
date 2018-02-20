<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Responses;

use Poloniex\Common\Response;

class TradeHistoryResponse extends Response
{
    /**
     * @var array
     */
    private $tradeHistory;

    /**
     * TradeHistoryResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        parent::__construct($json);
        $this->tradeHistory = $this->data;
    }

    /**
     * @return array
     */
    public function getTradeHistory(): array
    {
        return $this->tradeHistory;
    }
}
