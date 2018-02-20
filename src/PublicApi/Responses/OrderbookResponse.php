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
        parent::__construct($json);
        $this->asks = $this->data['asks'];
        $this->bids = $this->data['bids'];
        $this->isFrozen = $this->data['isFrozen'];
        $this->seq = $this->data['seq'];
    }

    /**
     * @return array
     */
    public function getAsks(): array
    {
        return $this->asks;
    }

    /**
     * @return array
     */
    public function getBids(): array
    {
        return $this->bids;
    }

    /**
     * @return bool
     */
    public function isFrozen(): bool
    {
        return $this->isFrozen;
    }

    /**
     * @return int
     */
    public function getSeq(): int
    {
        return $this->seq;
    }
}
