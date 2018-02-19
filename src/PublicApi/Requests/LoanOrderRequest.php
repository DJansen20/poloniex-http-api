<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Requests;

use Poloniex\Common\Request;

class LoanOrderRequest extends Request
{
    /**
     * @var string $currency
     */
    private $currency;

    /**
     * LoanOrderRequest constructor.
     * @param string $currency
     */
    public function __construct(string $currency)
    {
        $this->setController('returnLoanOrders');
        $this->setCurrency($currency);
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     * @return LoanOrderRequest
     */
    public function setCurrency($currency): LoanOrderRequest
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function withUri(): string
    {
        return sprintf('?command=%s&currency=%s', $this->getController(), $this->getCurrency());
    }
}
