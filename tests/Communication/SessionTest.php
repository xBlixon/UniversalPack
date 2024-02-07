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
        $this->session->set('foo', 'bar');
    }

    /**
     * This test checks setting-getting functionality.
     */
    #[Test]
    #[TestDox("Setting-Getting")]
    public function settingGetting(): void
    {
        $this->assertSame('bar', $this->session->get('foo'));
    }

    /**
     * Tests if purging removes values from session.
     */
    #[Test]
    #[TestDox("Purging")]
    public function purging(): void
    {
        $this->assertSame('bar', $this->session->get('foo'));
        $this->session->purge('foo');
        $this->assertNull($this->session->get('foo'));
    }

    /**
     * This test checks if flashing works as expected.
     */
    #[Test]
    #[TestDox("Flashing")]
    public function flashing(): void
    {
        $this->session->setFlash("One time message");
        $this->assertSame("One time message", $this->session->getFlash());
        $this->assertNull($this->session->getFlash());
    }

    /**
     * Tests if session is getting cleared out.
     */
    #[Test]
    #[TestDox("Flushing session")]
    public function flushing(): void
    {
        $this->session->flush();
        $this->assertNull($this->session->get('foo'));
    }
}