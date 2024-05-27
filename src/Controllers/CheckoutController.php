<?php 

namespace Handmade\Controllers;

use DunnServer\MVC\Controller;
use Handmade\Models\ProductsDatabase;
use Handmade\Models\UserCartDatabase;

class CheckoutController extends Controller
{
    function doGet($req, $res) 
    {
        $pdb=new ProductsDatabase();
        $ucdb=new UserCartDatabase();
        $carts=$ucdb->getAll();
        $products=[];
        $user = $req->getParams('user');
        for ($i= 0;$i<count($carts);$i++){
            $cart=$carts[$i];
            if ($cart['username']==$user["userName"]) {
            $id=$cart["productid"];
            $product=$pdb->getById($id);
            $products[]=$product;
            }
        }
        $res->send($products);
    }
}