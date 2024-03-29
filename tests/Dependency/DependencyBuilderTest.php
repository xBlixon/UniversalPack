<?php

namespace Dependency;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Velsym\Dependency\DependencyBuilder;
use Velsym\Dependency\DependencyBuilderError;

#[CoversClass(DependencyBuilder::class)]
final class DependencyBuilderTest extends TestCase
{
    /**
     * Tests situation in which user tries to set a new dependency
     * before the previous one got the declaration of class.
     */
    #[Test]
    #[TestDox("Error on setting dependency after an empty dependency")]
    public function emptyDependency(): void
    {
        $this->expectException(DependencyBuilderError::class);
        $this->expectExceptionMessage("Previous dependency has no class.");
        $dep = new DependencyBuilder();
        $dep->addDependency("Foo\\Bar")
            ->addDependency("Bar\\Baz");
    }

    /**
     * Tests if error is thrown when dependency has 2 or more classes.
     */
    #[Test]
    #[TestDox("Error on 2 or more classes for single dependency")]
    public function multipleClasses(): void
    {
        $this->expectException(DependencyBuilderError::class);
        $this->expectExceptionMessage("Multiple class declarations for one dependency");
        $dep = new DependencyBuilder();
        $dep->addDependency("Foo\\Bar")
            ->setClass("Foo\\Baz")
            ->setClass("Bar\\Baz");
    }

    /**
     * Tests situation in which class is declared before dependency.
     */
    #[Test]
    #[TestDox("Error on setting class before the dependency is set")]
    public function errorClassBeforeDependency(): void
    {
        $this->expectException(DependencyBuilderError::class);
        $this->expectExceptionMessage("Dependency is not set.");
        $dep = new DependencyBuilder();
        $dep->setClass("Foo\\Bar");
    }

    /**
     * Tests if error is thrown when parameter is set before class.
     */
    #[Test]
    #[TestDox("Error on setting parameter before class is set")]
    public function paramBeforeClass(): void
    {
        $this->expectException(DependencyBuilderError::class);
        $this->expectExceptionMessage("Tried to set parameter before class is declared.");
        $dep = new DependencyBuilder();
        $dep->addDependency("Foo\\Bar")
            ->setParam("foo", "baz");
    }

    /**
     * Tests situation in which parameter is set
     * before any is set dependency.
     */
    #[Test]
    #[TestDox("Error on setting parameter without dependency")]
    public function paramWithoutDependency(): void
    {
        $this->expectException(DependencyBuilderError::class);
        $this->expectExceptionMessage("Dependency is not set.");
        $dep = new DependencyBuilder();
        $dep->setParam("foo", "bar");
    }

}