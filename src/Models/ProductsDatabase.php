<?php 
namespace Handmade\Models;
use Handmade\Utils\Database;
class ProductsDatabase
{
    static function getAll()
    {
        $db= Database::connect();
        $data=$db->select("SELECT * FROM products");
        return $data;
    }
    static function getById($id)
    {
        $db= Database::connect();
        $data=$db->selectOne("SELECT * FROM products WHERE productid=?",[$id]);
        return $data;
    }
    static function add($product)
    {
        $db= Database::connect();
        $db->insert("INSERT INTO products(productid,image,productname,original_price,discount_percentage,discounted_price) VALUES (?,?,?,?,?,?)",[$product->getProductId(),$product->getImage(),$product->getProductName(),$product->getOriginalPrice(),$product->getDiscountPercentage(),$product->getDiscountedPrice()]);
    }
    static function update($product)
    {
        $db= Database::connect();
        $db->update("UPDATE products SET image=?,productname=?,original_price=?,discount_percentage=?,discounted_price=? WHERE productid=?",[$product->getImage(),$product->getProductName(),$product->getOriginalPrice(),$product->getDiscountPercentage(),$product->getDiscountedPrice(),$product->getProductId()]);
    }
    static function delete($id)
    {
        $db= Database::connect();
        $db->delete("DELETE FROM products WHERE productid=?",[$id]);
    }

}