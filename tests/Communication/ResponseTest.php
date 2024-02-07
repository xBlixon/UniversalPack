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


    /**
     * Checks if body setter and getter works.
     */
    #[Test]
    #[TestDox("Setting-Getting Body")]
    public function body(): void
    {
        $this->response->setBody("Hello world!");
        $this->assertSame("Hello world!", $this->response->getBody());
    }

    /**
     * Checks if response code setter and getter works.
     */
    #[Test]
    #[TestDox("Setting-Getting Response code")]
    public function code(): void
    {
        $this->assertSame(200, $this->response->getResponseCode());
        $this->response->setResponseCode(202);
        $this->assertSame(202, $this->response->getResponseCode());
    }

    /**
     * Checks if redirect route name setter and getter works.
     */
    #[Test]
    #[TestDox("Setting-Getting Body")]
    public function redirectRouteName(): void
    {
        $this->assertNull($this->response->getRedirectRouteName());
        $this->response->setRedirectRouteName("homepage");
        $this->assertSame("homepage", $this->response->getRedirectRouteName());
    }
}