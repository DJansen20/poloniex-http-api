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
        $data = json_decode($json, true);
        $this->setTradeHistory($data);
    }

    /**
     * @return array
     */
    public function getTradeHistory(): array
    {
        return $this->tradeHistory;
    }

    /**
     * @param array $tradeHistory
     * @return TradeHistoryResponse
     */
    public function setTradeHistory(array $tradeHistory): TradeHistoryResponse
    {
        $this->tradeHistory = $tradeHistory;
        return $this;
    }
}
