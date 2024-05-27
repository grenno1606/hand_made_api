<?php 
namespace Handmade\controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\FavoriteProductsDatabase;
use Handmade\Models\ProductsDatabase;

class HeartController extends Controller
{
    function doGet($req, $res)
    {
        $pdb=new ProductsDatabase();
        $fpdb=new FavoriteProductsDatabase();
    
        $fps=$fpdb->getAll();
        $products=[];
        $root = $req->server('HTTP_HOST');
        $user = $req->getParams('user');
        for ($i= 0;$i<count($fps);$i++){
            $fp=$fps[$i];
            if ($fp['username']==$user["username"]) {
            $id=$fp["productid"];
            $product=$pdb->getById($id);
            $product['image'] = "http://$root" . $product['image'];
            $products[]=$product;
            }
        }
        $res->send($products);
    
    }
}