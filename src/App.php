<?php
namespace Handmade;

use DunnServer\DunnServer;
use Handmade\Controllers\AddCartController;
use Handmade\Controllers\AddHeartController;
use Handmade\Controllers\AddPController;
use Handmade\Controllers\AddTController;
use Handmade\Controllers\AddTHeartController;
use Handmade\Controllers\CartController;
use Handmade\Controllers\Dashboard2Controller;
use Handmade\Controllers\Dashboard3Controller;
use Handmade\Controllers\DeleteCartController;
use Handmade\Controllers\DeleteHeartController;
use Handmade\Controllers\DeletePController;
use Handmade\Controllers\DeleteTController;
use Handmade\Controllers\DeleteTHeartController;
use Handmade\Controllers\HeartController;
use Handmade\Controllers\HeartTController;
use Handmade\Controllers\LoginController;
use Handmade\Controllers\OrderSuccessController;
use Handmade\Controllers\ProductController;
use Handmade\Controllers\RegisterController;
use Handmade\Controllers\TutorialController;
use Handmade\Controllers\UpdatePController;
use Handmade\Controllers\UpdateTController;
use Handmade\Middleware\CheckFilter;
use Handmade\Middleware\CustomUploadFilter;
use Handmade\Middleware\AuthFilter;
use Handmade\Middleware\CustomUploadVideoFilter;
use Handmade\Router\AuthRouter;
use Handmade\Router\CartRouter;
use Handmade\Router\DashboardRouter;
use Handmade\Router\FavoriteRouter;
use Handmade\Router\HeartRouter;
use Handmade\Router\ProductRouter;
use Handmade\Router\TutorialRouter;

class App {
    public static function main(){
        $server = new  DunnServer();
        $server->useRouter(new AuthRouter());
        $server->useRouter(new ProductRouter());
        $server->useRouter(new TutorialRouter());
        $server->useRouter(new HeartRouter());        
        $server->useRouter(new CartRouter());
        $server->useRouter(new DashboardRouter());
        $server->useRouter(new FavoriteRouter());

        $server->addRoute('/success', new OrderSuccessController());
        $server->addFilter('/success/*', new AuthFilter());
        

        $server->run();

    }
}