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
        $data = json_decode($json, true);
        $this->setOffers($data['offers'])
            ->setDemands($data['demands']);
    }

    /**
     * @return array
     */
    public function getOffers(): array
    {
        return $this->offers;
    }

    /**
     * @param array $offers
     * @return LoanOrderResponse
     */
    public function setOffers(array $offers): LoanOrderResponse
    {
        $this->offers = $offers;
        return $this;
    }

    /**
     * @return array
     */
    public function getDemands(): array
    {
        return $this->demands;
    }

    /**
     * @param array $demands
     * @return LoanOrderResponse
     */
    public function setDemands(array $demands): LoanOrderResponse
    {
        $this->demands = $demands;
        return $this;
    }
}
