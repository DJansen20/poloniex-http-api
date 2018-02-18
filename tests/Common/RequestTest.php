<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\Common;

use Poloniex\Common\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    /**
     * @covers \Poloniex\Common\Request::__construct
     *
     * @return Request
     * @throws \Exception
     */
    public function testCanBeConstructed(): Request
    {
        $request = new class extends Request {
            public function __construct()
            {
                $this->controller = 'returnChartData';
                parent::__construct();
            }

            public function withUri(): string
            {
                return null;
            }
        };
        $this->assertInstanceOf('Poloniex\\Common\\Request', $request);
        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\Common\Request::getController
     *
     * @param Request $request
     * @return Request
     * @throws \Exception
     */
    public function testGetController(Request $request): Request
    {
        $controller = $request->getController();
        $this->assertEquals('returnChartData', $controller);
        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\Common\Request::setController
     *
     * @param Request $request
     * @return Request
     * @throws \Exception
     */
    public function testSetController(Request $request): Request
    {
        $request->setController('returnLoanData');
        $this->assertEquals('returnLoanData', $request->getController());
        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Poloniex\Common\Request::getEndpoint
     *
     * @param Request $request
     * @return Request
     * @throws \Exception
     */
    public function testGetEndpoint(Request $request): Request
    {
        $this->assertEquals('https://poloniex.com/public', $request->getEndpoint());
        return $request;
    }
}
