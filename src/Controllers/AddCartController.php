<?php 
namespace Handmade\controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\ProductsDatabase;
use Handmade\Models\UserCart;
use Handmade\Models\UserCartDatabase;
class AddCartController extends Controller
{
    function doPost($req, $res)
    {
        $pdb=new ProductsDatabase();
        $ucdb=new UserCartDatabase();
        $user = $req->getParams('user');
        $root = $req->server('HTTP_HOST');
        $cart['productId']=$req->getParams('productId');
        $cart['userName']=$user["username"];
        $cart['quantity']=1;
        $ucdb->add(UserCart::fromArray($cart));
        $postRes = $pdb->getById($cart['productId']);
        $postRes['image'] = "http://$root" . $postRes['image'];
        $res->send($postRes);
    }
}