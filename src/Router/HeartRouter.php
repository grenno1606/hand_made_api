<?php

namespace Handmade\Router;

use DunnServer\Router\Router;
use Handmade\Controllers\HeartController;
use Handmade\Controllers\HeartTController;

class HeartRouter extends Router {
    function __construct()
    {
        parent::__construct("/heart");
        $this->addRoute('/product', new HeartController());
        $this->addRoute('/tutorial', new HeartTController());
    }
}