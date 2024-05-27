<?php 
namespace Handmade\Controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\UserCartDatabase;

class OrderSuccessController extends Controller
{
    function doGet($req, $res)
    {
        $ucdb=new UserCartDatabase();
        $carts=$ucdb->getAll();
        $products=[];
        $user = $req->getParams('user');
        for ($i= 0;$i<count($carts);$i++){
            $cart=$carts[$i];
            if ($cart['username']==$user["username"]) {
            $id=$cart["productid"];
            $products[]=$ucdb->getById($id);
            $ucdb->delete($id);
            }
        }
        $res->send($products);
    }
}