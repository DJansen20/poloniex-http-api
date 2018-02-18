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
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function withUri(): string
    {
        return sprintf('?command=%d&currency=&s', $this->getController(), $this->getCurrency());
    }
}
