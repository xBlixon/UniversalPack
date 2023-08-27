<?php

namespace Velsym\Dependency;

use Error;

class DependencyBuilderError extends Error
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }
}