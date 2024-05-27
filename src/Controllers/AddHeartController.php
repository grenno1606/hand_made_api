<?php 
namespace Handmade\controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\FavoriteProducts;
use Handmade\Models\FavoriteProductsDatabase;
use Handmade\Models\ProductsDatabase;

class AddHeartController extends Controller
{
    function doPost($req, $res)
    {
        $pdb=new ProductsDatabase();
        $fpdb=new FavoriteProductsDatabase();
        $root = $req->server('HTTP_HOST');
        $user = $req->getParams('user');
        $heart['productId']=$req->getParams('productId');
        $heart['userName']=$user["username"];
        $fpdb->add(FavoriteProducts::fromArray($heart));
        $postRes = $pdb->getById($heart['productId']);
        $postRes['image'] = "http://$root" . $postRes['image'];
        $res->send($postRes);
    }
}