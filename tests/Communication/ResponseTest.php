<?php

namespace Communication;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Velsym\Communication\Response;

#[CoversClass(Response::class)]
final class ResponseTest extends TestCase
{
    private Response $response;

    protected function setUp(): void
    {
        $this->response = Response::getInstance();
    }

    /**
     * Tests headers functionalities.
     */
    #[Test]
    #[TestDox("Headers")]
    public function headers(): void
    {
        $this->response->addHeader('Accept', 'text/html');
        $this->assertSame(['Accept' => 'text/html'], $this->response->getHeaders());

        $two = [
            'Accept-Language' => 'en-US',
            'Host' => 'example.com'
        ];
        $this->response->addHeaders($two);
        $this->assertSame(
            [
                'Accept' => 'text/html',
                'Accept-Language' => 'en-US',
                'Host' => 'example.com'
            ],
            $this->response->getHeaders()
        );
    }
}