<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi;

use Poloniex\Common\Transport;
use Poloniex\Common\Request;
use Poloniex\Common\Response;

class PublicApi
{
    /**
     * @var Request $request
     */
    private $request;

    /**
     * @var Transport $transport
     */
    private $transport;

    /**
     * @var Response $response
     */
    private $response;

    /**
     * @return string
     * @throws \Exception
     */
    private function sendRequest(): string
    {
        if ($this->request === null) {
            throw new \Exception('No request set');
        }

        if (!$this->transport instanceof Transport) {
            $this->transport = new Transport();
        }

        return $this->transport->send($this->request);
    }
}
