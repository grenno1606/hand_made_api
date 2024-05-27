<?php 
namespace Handmade\Controllers;
use DunnServer\MVC\Controller;
use DunnServer\Utils\DunnArray;
use Handmade\Models\Products;
use Handmade\Models\ProductsDatabase;
class AddPController extends Controller
{
    function doPost($req, $res)
    {
        $pdb=new ProductsDatabase();
        $product['productId']=uniqid();
        $product['productName']=$req->getBody('productname');
        $product['originalPrice']=$req->getBody('original_price');
        $product['discountPercentage']=$req->getBody('discount_percentage');
        $product['discountedPrice']=$req->getBody('discounted_price');

        $upload = $req->getUploads();
        $img = $upload->get('image', new DunnArray())->get(0);
        $root = $req->server('HTTP_HOST');
        if($img) {
            $product['image'] = $img->getPath();
            $pdb->add(Products::fromArray($product));
            $product['image'] = "http://$root".$img->getPath();
            $res->send($product);
        } else {
            $res->status(400)->send(['error' => 'Image is required']);
        }

    }
}