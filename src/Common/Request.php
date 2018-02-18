<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Common;

abstract class Request
{
    /**
     * Controller we want to use
     *
     * @var string $controller
     */
    protected $controller;

    /**
     * Endpoint we want to connect to
     *
     * @var string $endpoint
     */
    protected $endpoint;

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function setEndpoint(): void
    {
        $this->endpoint = 'https://poloniex.com/public';
    }

    /**
     * Every request must implement a withUri
     *
     * @return string
     */
    abstract public function withUri(): string;
}