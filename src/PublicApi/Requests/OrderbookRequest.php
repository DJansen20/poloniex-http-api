<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Requests;

use Poloniex\Common\Request;

class OrderbookRequest extends Request
{
    /**
     * @var string
     */
    private $currencyPair;

    /**
     * @var string
     */
    private $depth;

    /**
     * OrderbookRequest constructor.
     * @param string $currencyPair
     * @param int $depth
     */
    public function __construct(string $currencyPair, int $depth)
    {
        $this->setController('returnOrderBook');
        $this->setCurrencyPair($currencyPair);
        $this->setDepth($depth);
        parent::__construct();
    }

    /**
     * @return int
     */
    public function getCurrencyPair(): int
    {
        return $this->currencyPair;
    }

    /**
     * @param string $currencyPair
     */
    public function setCurrencyPair(string $currencyPair): void
    {
        $this->currencyPair = $currencyPair;
    }

    /**
     * @return int
     */
    public function getDepth(): int
    {
        return $this->depth;
    }

    /**
     * @param mixed $depth
     */
    public function setDepth(int $depth): void
    {
        $this->depth = $depth;
    }

    /**
     * @return string
     */
    public function withUri(): string
    {
        return sprintf('?command=%s&currencyPair=%s%depth=%d',
            $this->getController(),
            $this->getCurrencyPair(),
            $this->getDepth()
        );
    }
}
