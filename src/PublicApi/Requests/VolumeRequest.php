<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi\Requests;

use Poloniex\Common\Request;

class VolumeRequest extends Request
{
    /**
     * VolumeRequest constructor.
     */
    public function __construct()
    {
        $this->setController('return24Volume');
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
