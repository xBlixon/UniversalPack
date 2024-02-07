<?php

namespace Communication;

use PHPUnit\Framework\Attributes\CoversClass;
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
}