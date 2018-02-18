<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\Common;

use Poloniex\Common\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    /**
     * @covers \Poloniex\Common\Response
     *
     * @return Response
     * @throws \Exception
     */
    public function testCanBeConstructed()
    {
        $response = new class extends Response{};
        $this->assertInstanceOf('Poloniex\\Common\\Response', $response);
        return $response;
    }
}
