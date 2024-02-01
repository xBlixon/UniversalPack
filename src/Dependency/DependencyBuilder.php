<?php

namespace Velsym\Dependency;

class DependencyBuilder
{
    private array $dependencies = [];
    private ?string $currentDependency = NULL;

    /** @param string $label it's not used in any way.
     * The main purpose of it is to name a group of
     * dependencies for code readability.
     */
    public function __construct(string $label = "")
    {
    }

    public function addDependency(string $dependency): self
    {
        if (
            $this->currentDependency !== NULL
            && !$this->isClassSet()
        ) {
            throw new DependencyBuilderError("Previous dependency has no class.");
        }
        $this->currentDependency = $dependency;
        $this->dependencies[$dependency] = [];
        return $this;
    }

    public function setClass(string $class): self
    {
        $this->checkDependency();
        if ($this->isClassSet()) {
            throw new DependencyBuilderError("Multiple class declarations for one dependency.");
        }
        $this->dependencies[$this->currentDependency]['class'] = $class;
        return $this;
    }

    public function setParam(string $paramName, mixed $value): self
    {
        $this->checkDependency();
        if(!$this->isClassSet()) {
            throw new DependencyBuilderError("Tried to set parameter before class is declared.");
        }
        if (!isset($this->dependencies[$this->currentDependency]['params'])) {
            $this->dependencies[$this->currentDependency]['params'] = [];
        }
        $this->dependencies[$this->currentDependency]['params'][$paramName] = $value;
        return $this;
    }

    public function getDependencies(): array
    {
        return $this->dependencies;
    }

    private function checkDependency(): void
    {
        if (!$this->currentDependency) {
            throw new DependencyBuilderError("Dependency is not set.");
        }
    }

    private function isClassSet(): bool
    {
        return isset($this->dependencies[$this->currentDependency]['class']);
    }
}