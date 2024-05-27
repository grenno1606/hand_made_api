<?php 

namespace Handmade\Router;

use DunnServer\Router\Router;
use Handmade\Controllers\AddCartController;
use Handmade\Controllers\CartController;
use Handmade\Controllers\DeleteCartController;
use Handmade\Middleware\AuthFilter;

class CartRouter extends Router {
    function __construct()
    {
        parent::__construct("/cart");
        $this->addRoute('', new CartController());
        $this->addFilter('/*', new AuthFilter());
        $this->addRoute('/add/{productId}',new AddCartController());
        $this->addRoute('/delete/{productId}',new DeleteCartController());
    }
}