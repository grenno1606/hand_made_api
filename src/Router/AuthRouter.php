<?php 

namespace Handmade\Router;

use DunnServer\Router\Router;
use Handmade\Controllers\LoginController;
use Handmade\Controllers\RegisterController;

class AuthRouter extends Router {
    function __construct()
    {
        parent::__construct("");
        $this->addRoute("/login", new LoginController());
        $this->addRoute("/register", new RegisterController());
    }
}