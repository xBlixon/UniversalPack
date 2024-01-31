<?php

use Velsym\Communication\Session;
use Velsym\Dependency\DependencyBuilder;

require 'vendor/autoload.php';

//$session = Session::getInstance();

//$a = $session->get('auth');

//var_dump($a);

$builder = (new DependencyBuilder("The awesome dependencies!"))
    ->addDependency("Some\\Class")
        ->setClass("Real\\Class")
            ->setParam("name", "Jola")
            ->setParam("age", 200)

    ->addDependency("Another\\Class")
        ->setClass("Surr\\Real\\Abstract\\Class")
            ->setParam("path", "/unix/path/to/file.php")
            ->setParam("arrey", ['the', 'array', 'number', 1])
    ;

var_dump($builder->getDependencies());