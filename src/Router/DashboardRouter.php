<?php 

namespace Handmade\Router;

use DunnServer\Router\Router;
use Handmade\Controllers\Dashboard2Controller;
use Handmade\Controllers\Dashboard3Controller;
use Handmade\Middleware\CheckFilter;

class DashboardRouter extends Router {
    function __construct()
    {
        parent::__construct("/dashboard");
        $this->addRoute('/products', new Dashboard2Controller());
        $this->addRoute('/tutorials', new Dashboard3Controller());
        $this->addFilter('/*',new CheckFilter());
    }
}