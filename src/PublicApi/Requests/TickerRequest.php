<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Requests;

use Poloniex\Common\Request;

class TickerRequest extends Request
{
    /**
     * TickerRequest constructor.
     */
    public function __construct()
    {
        $this->setController('returnTicker');
        parent::__construct();
    }

    /**
     * @return string
     */
    public function withUri(): string
    {
        return sprintf('?command=%s', $this->getController());
    }
}
