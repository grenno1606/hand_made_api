<?php 
namespace Handmade\Controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\ProductsDatabase;
class Dashboard2Controller extends Controller
{
    function doGet($req, $res)
    {
        $pdb=new ProductsDatabase();
        $products=$pdb->getAll();
        $root = $req->server('HTTP_HOST');
        for ($i= 0; $i < count($products); $i++)
        {
            $product=$products[$i];
            $product['image'] = "http://$root" . $product['image'];
            $products[$i]=$product;
        }
        $res->send($products);
    }
}