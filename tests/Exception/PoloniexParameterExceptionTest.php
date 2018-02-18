<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\Exception;

use Poloniex\Exception\PoloniexParameterException;
use PHPUnit\Framework\TestCase;

class PoloniexParameterExceptionTest extends TestCase
{
    const MESSAGE = 'Invalid parameter';

    /**
     * @covers \Poloniex\Exception\PoloniexParameterException::__construct
     *
     * @return PoloniexParameterException
     * @throws \Exception
     */
    public function testCanBeConstructed(): PoloniexParameterException
    {
        $PoloniexParameterException = new PoloniexParameterException(self::MESSAGE);
        $this->assertInstanceOf('Poloniex\\Exception\\PoloniexParameterException', $PoloniexParameterException);
        return $PoloniexParameterException;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\Exception\PoloniexParameterException::getMessage
     *
     * @param PoloniexParameterException $PoloniexParameterException
     * @throws \Exception
     */
    public function testGetMessage(PoloniexParameterException $PoloniexParameterException): void
    {
        $this->assertSame(self::MESSAGE, $PoloniexParameterException->getMessage());
    }
}