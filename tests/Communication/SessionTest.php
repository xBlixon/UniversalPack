<?php

namespace Communication;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Velsym\Communication\Session;

#[CoversClass(Session::class)]
final class SessionTest extends TestCase
{
    private Session $session;

    protected function setUp(): void
    {
        $this->session = Session::getInstance();
    }

    /**
     * This test check setting-getting functionality.
     */
    #[Test]
    #[TestDox("Setting-Getting")]
    public function settingGetting()
    {
        $this->session->set('foo', 'bar');
        $this->assertSame('bar', $this->session->get('foo'));
    }
}