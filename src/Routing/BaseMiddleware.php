<?php

namespace Velsym\Routing;

abstract class BaseMiddleware
{
    use HttpInitiable;

    abstract public function handle();

    protected function redirect(string $path)
    {
        header("Location: $path");
        die();
    }
}