<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Responses;

use Poloniex\Common\Response;

class LoanOrderResponse extends Response
{
    /**
     * @var array
     */
    private $offers;

    /**
     * @var array
     */
    private $demands;

    /**
     * LoanOrderResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        parent::__construct($json);
        $this->offers = $this->data['offers'];
        $this->demands = $this->data['demands'];
    }

    /**
     * @return array
     */
    public function getOffers(): array
    {
        return $this->offers;
    }

    /**
     * @return array
     */
    public function getDemands(): array
    {
        return $this->demands;
    }
}
