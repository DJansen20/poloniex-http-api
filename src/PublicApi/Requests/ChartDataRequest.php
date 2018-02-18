<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Requests;

use Poloniex\Common\Request;

class ChartDataRequest extends Request
{
    private $currencyPair;

    private $start;

    private $end;

    private $period;

    /**
     * ChartDataRequest constructor.
     * @param string $currencyPair
     * @param int $start
     * @param int $end
     * @param int $period
     */
    public function __construct(string $currencyPair, int $start, int $end, int $period)
    {
        $this->setController('returnChartData');
        $this->setStart($start);
        $this->setEnd($end);
        $this->setPeriod($period);
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getCurrencyPair(): string
    {
        return $this->currencyPair;
    }

    /**
     * @param mixed $currencyPair
     */
    public function setCurrencyPair(string $currencyPair): void
    {
        $this->currencyPair = $currencyPair;
    }

    /**
     * @return mixed
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     */
    public function setStart(int $start): void
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getEnd(): int
    {
        return $this->end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd(int $end): void
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getPeriod(): int
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     */
    public function setPeriod(int $period): void
    {
        $this->period = $period;
    }

    public function withUri(): string
    {
        return sprintf('?command=%s&currencyPair=%s&start=%d&end=%d&period=%d',
            $this->getController(),
            $this->getStart(),
            $this->getEnd(),
            $this->getPeriod()
        );
    }
}
