<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Requests;

use Poloniex\Common\Request;

class TradeHistoryRequest extends Request
{
    /**
     * @var string
     */
    private $currencyPair;

    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $end;

    /**
     * TradeHistoryRequest constructor.
     * @param string $currencyPair
     * @param int $start
     * @param int $end
     */
    public function __construct(string $currencyPair, int $start, int $end)
    {
        $this->setController('returnTradeHistory');
        $this->setCurrencyPair($currencyPair)
            ->setStart($start)
            ->setEnd($end);
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getCurrencyPair(): string
    {
        return $this->currencyPair;
    }

    /**
     * @param string $currencyPair
     * @return TradeHistoryRequest
     */
    public function setCurrencyPair(string $currencyPair): TradeHistoryRequest
    {
        $this->currencyPair = $currencyPair;
        return $this;
    }

    /**
     * @return int
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * @param int $start
     * @return TradeHistoryRequest
     */
    public function setStart(int $start): TradeHistoryRequest
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return int
     */
    public function getEnd(): int
    {
        return $this->end;
    }

    /**
     * @param int $end
     * @return TradeHistoryRequest
     */
    public function setEnd(int $end): TradeHistoryRequest
    {
        $this->end = $end;
        return $this;
    }

    /**
     * @return string
     */
    public function withUri(): string
    {
        return sprintf('?command=%s&currencyPair=%s&start=%d&end=%d', $this->getController(), $this->getStart(),
            $this->getEnd());
    }
}
