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
     * Tests situation in which class is declared before dependency.
     */
    #[Test]
    #[TestDox("Error on setting class before the dependency is set")]
    public function errorClassBeforeDependency(): void
    {
        $this->expectException(DependencyBuilderError::class);
        $this->expectExceptionMessage("Dependency is not set.");
        $dep = new DependencyBuilder();
        $dep->setClass("Some\\Class");
    }

    #[Test]
    #[TestDox("Error on setting dependency after an empty dependency")]
    public function emptyDependency(): void
    {
        $this->expectException(DependencyBuilderError::class);
        $this->expectExceptionMessage("Previous dependency has no class.");
        $dep = new DependencyBuilder();
        $dep->addDependency("First\\Dependency");
        $dep->addDependency("Second\\Dependency");
    }
}