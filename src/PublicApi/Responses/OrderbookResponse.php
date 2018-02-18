<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Responses;

use Poloniex\Common\Response;

class OrderbookResponse extends Response
{
    /**
     * @var array
     */
    private $asks;

    /**
     * @var array
     */
    private $bids;

    /**
     * @var boolean
     */
    private $isFrozen;

    /**
     * @var int
     */
    private $seq;

    /**
     * OrderbookResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        $data = json_decode($json, true);
        $this->setAsks($data['asks'])
            ->setBids($data['bids'])
            ->setIsFrozen($data['isFrozen'])
            ->setSeq($data['seq']);
    }

    /**
     * @return array
     */
    public function getAsks(): array
    {
        return $this->asks;
    }

    /**
     * @param array $asks
     * @return OrderbookResponse
     */
    public function setAsks(array $asks): OrderbookResponse
    {
        $this->asks = $asks;
        return $this;
    }

    /**
     * @return array
     */
    public function getBids(): array
    {
        return $this->bids;
    }

    /**
     * @param array $bids
     * @return OrderbookResponse
     */
    public function setBids(array $bids): OrderbookResponse
    {
        $this->bids = $bids;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFrozen(): bool
    {
        return $this->isFrozen;
    }

    /**
     * @param bool $isFrozen
     * @return OrderbookResponse
     */
    public function setIsFrozen(bool $isFrozen): OrderbookResponse
    {
        $this->isFrozen = $isFrozen;
        return $this;
    }

    /**
     * @return int
     */
    public function getSeq(): int
    {
        return $this->seq;
    }

    /**
     * @param int $seq
     * @return OrderbookResponse
     */
    public function setSeq(int $seq): OrderbookResponse
    {
        $this->seq = $seq;
        return $this;
    }
}
