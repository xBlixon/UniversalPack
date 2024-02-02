<?php

namespace Communication;


use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Velsym\Communication\Request;

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
}