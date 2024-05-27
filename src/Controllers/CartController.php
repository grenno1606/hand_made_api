<?php 
namespace Handmade\controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\ProductsDatabase;
use Handmade\Models\UserCartDatabase;
class CartController extends Controller
{
    function doGet($req, $res)
    {
        $pdb=new ProductsDatabase();
        $ucdb=new UserCartDatabase();
        $root = $req->server('HTTP_HOST');
        $user = $req->getParams('user');
        $carts=$ucdb->getAll();
        $products=[];
        for ($i= 0;$i<count($carts);$i++){
            $cart=$carts[$i];
            if ($cart['username']==$user["username"]) {
            $id=$cart["productid"];
            $product=$pdb->getById($id);
            $product['image'] = "http://$root" . $product['image'];
            $products[]=$product;
            }
        }
        $res->send($products);
    }
}