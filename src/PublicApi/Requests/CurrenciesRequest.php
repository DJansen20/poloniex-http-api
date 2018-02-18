<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Requests;

use Poloniex\Common\Request;

class CurrenciesRequest extends Request
{
    /**
     * CurrenciesRequest constructor.
     */
    public function __construct()
    {
        $this->setController('returnCurrencies');
        parent::__construct();
    }

    /**
     * @return string
     */
    public function withUri(): string
    {
        return sprintf('?command=%d', $this->getController());
    }
}
