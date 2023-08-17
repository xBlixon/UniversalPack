<?php

namespace Velsym\Routing;

abstract class BaseMiddleware
{
    use HttpInitiable;

    abstract public function handle();
}