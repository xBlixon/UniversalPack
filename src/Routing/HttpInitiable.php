<?php

namespace Velsym\Routing;

use Velsym\Communication\Response;
use Velsym\Communication\Session;

trait HttpInitiable
{
    protected ?Response $response = NULL;
    protected ?Session $session = NULL;

    public function _v_http_init(): void
    {
        if($this->session === NULL) $this->session = Session::getInstance();
        if($this->response === NULL) $this->response = Response::getInstance();
    }
}