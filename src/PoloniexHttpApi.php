<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex;

use Poloniex\PublicApi\PublicApi;

class PoloniexHttpApi
{
    /**
     * Expose the public API methods
     *
     * @return PublicApi
     */
    public static function PublicApi(): PublicApi
    {
        return new PublicApi();
    }
}