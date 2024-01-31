<?php

namespace Dependency;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Velsym\Communication\UrlInfo;

#[CoversClass(UrlInfo::class)]
final class UrlInfoTest extends TestCase
{
    /**
     * Tests if resource path is extracted correctly.
     */
    #[Test]
    #[TestDox("Extracting resource path from the entire URL")]
    public function pathExtraction(): void
    {
        $path = "/home/page/1";
        $url = new UrlInfo("$path?color=blue&font=serif");
        $this->assertSame($path, $url->path);
    }
}