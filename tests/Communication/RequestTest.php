<?php

namespace Communication;


use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Velsym\Communication\Request;
use Velsym\Communication\UrlInfo;


#[CoversClass(Request::class)]
final class RequestTest extends TestCase
{
    /**
     * Tests if Request class returns correct HTTP method.
     */
    #[Test]
    #[TestDox("Returns correct HTTP method")]
    public function method(): void
    {
        $method = "POST";
        $_SERVER['REQUEST_METHOD'] = $method;
        $this->assertSame($method, Request::method());
    }

    /**
     * Tests if Request class returns UrlInfo object
     * that reflects actual HTTP request.
     */
    #[Test]
    #[TestDox("Returns correct UrlInfo object")]
    public function url(): void
    {
        $uri = "https://example.com/a/b/c#test?foo=bar&baz=foo";
        $_SERVER['REQUEST_URI'] = $uri;
        $urlInfo = new UrlInfo($uri);
        $this->assertEquals($urlInfo, Request::url());
    }
}