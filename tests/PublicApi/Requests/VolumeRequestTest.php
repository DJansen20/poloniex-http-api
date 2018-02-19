<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Tests\PublicApi\Requests;

use Poloniex\PublicApi\Requests\VolumeRequest;
use PHPUnit\Framework\TestCase;

class VolumeRequestTest extends TestCase
{
    /**
     * @covers \Poloniex\PublicApi\Requests\VolumeRequest::__construct
     * @return VolumeRequest
     */
    public function testCanBeConstructed(): VolumeRequest
    {
        $request = new VolumeRequest();
        $this->assertInstanceOf('Poloniex\\PublicApi\\Requests\\VolumeRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\VolumeRequest::setController
     * @covers  \Poloniex\PublicApi\Requests\VolumeRequest::getController
     * @param VolumeRequest $request
     */
    public function testSetGetController(VolumeRequest $request): void
    {
        $request->setController('returnTest');
        $this->assertEquals('returnTest', $request->getController());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Poloniex\PublicApi\Requests\VolumeRequest::withUri
     * @param VolumeRequest $request
     */
    public function testWithUri(VolumeRequest $request): void
    {
        $this->assertEquals('?command=returnTest', $request->withUri());
    }
}
