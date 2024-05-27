<?php
namespace Handmade;

use DunnServer\DunnServer;
use Handmade\controllers\AddCartController;
use Handmade\controllers\AddHeartController;
use Handmade\controllers\AddPController;
use Handmade\controllers\AddTController;
use Handmade\controllers\AddTHeartController;
use Handmade\controllers\CartController;
use Handmade\controllers\Dashboard2Controller;
use Handmade\controllers\Dashboard3Controller;
use Handmade\controllers\DeleteCartController;
use Handmade\controllers\DeleteHeartController;
use Handmade\controllers\DeletePController;
use Handmade\controllers\DeleteTController;
use Handmade\controllers\DeleteTHeartController;
use Handmade\controllers\HeartController;
use Handmade\controllers\HeartTController;
use Handmade\controllers\LoginController;
use Handmade\Controllers\OrderSuccessController;
use Handmade\controllers\ProductController;
use Handmade\controllers\RegisterController;
use Handmade\controllers\TutorialController;
use Handmade\controllers\UpdatePController;
use Handmade\controllers\UpdateTController;
use Handmade\Middleware\CheckFilter;
use Handmade\Middleware\CustomUploadFilter;
use Handmade\Middleware\AuthFilter;
use Handmade\Middleware\CustomUploadVideoFilter;

class App {
    public static function main(){
        $server = new  DunnServer();

        $server->addRoute("/login", new LoginController());
        $server->addRoute('/register', new RegisterController());
       
        $server->addRoute('/product', new ProductController());
        $server->addFilter('/product/*', new AuthFilter());
        $server->addRoute('/product/add', new AddPController());
        $server->addFilter('/product/add', new CustomUploadFilter('/upload'));
        $server->addFilter('/product/update/{id}', new CustomUploadFilter('/upload'));
        $server->addRoute('/product/update/{id}', new UpdatePController());
        $server->addRoute('/product/delete/{id}', new DeletePController());
      
        $server->addRoute('/tutorial', new TutorialController());
        $server->addFilter('/tutorial/*', new AuthFilter());
        $server->addFilter('/tutorial/update/{id}', new CustomUploadVideoFilter('/upload'));
        $server->addFilter('/tutorial/add', new CustomUploadVideoFilter('/upload'));
        $server->addRoute('/tutorial/add', new AddTController());
        $server->addRoute('/tutorial/update/{id}', new UpdateTController());
        $server->addRoute('/tutorial/delete/{id}', new DeleteTController());

        $server->addRoute('/heart/product', new HeartController());
        $server->addRoute('/heart/tutorial', new HeartTController());
        $server->addFilter('/heart/*', new AuthFilter());

        $server->addRoute('/cart', new CartController());
        $server->addFilter('/cart/*', new AuthFilter());
        $server->addRoute('/cart/add/{productId}',new AddCartController());
        $server->addRoute('/cart/delete/{productId}',new DeleteCartController());
      
        $server->addRoute('/dashboard/products', new Dashboard2Controller());
        $server->addRoute('/dashboard/tutorials', new Dashboard3Controller());
        $server->addFilter('/dashboard/*',new CheckFilter());

        $server->addRoute('/favorite/add/{productId}', new AddHeartController());
        $server->addFilter('/favorite/*', new AuthFilter());
        $server->addRoute('/favorite/addtutorial/{tutorialId}', new AddTHeartController());
        $server->addRoute('/favorite/delete/{productId}', new DeleteHeartController());
        $server->addRoute('/favorite/deletetutorial/{tutorialId}', new DeleteTHeartController());

        $server->addRoute('/success', new OrderSuccessController());
        $server->addFilter('/success/*', new AuthFilter());
        

        $server->run();

    }
}