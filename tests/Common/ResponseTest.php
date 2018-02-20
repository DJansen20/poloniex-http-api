<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\Common;

use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    const TEST = [
        'test' => [
            'blaat'
        ],
        'test2' => [
            'blaat2'
        ]
    ];
    /**
     * @covers \Poloniex\Common\Response
     * @covers \Poloniex\Common\Response::jsonSerialize
     * @covers \Poloniex\Common\Response::asArray
     *
     * @return void
     * @throws \ReflectionException
     */
    public function testCanBeConstructed()
    {
        $stub = $this->createMock('\\Poloniex\\Common\\Response');
        $stub->method('asArray')->willReturn(self::TEST);
        $stub->method('jsonSerialize')->willReturn(json_encode(self::TEST));
        $this->assertEquals(self::TEST, $stub->asArray());
        $this->assertEquals(json_encode(self::TEST), $stub->jsonSerialize());
    }
}
