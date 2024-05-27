<?php 
namespace Handmade\Models;
use Handmade\Utils\Database;
class UserCartDatabase
{
    static function getAll()
    {
        $db= Database::connect();
        $data=$db->select("SELECT * FROM usercart");
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
        $db->insert("INSERT INTO usercart(username,productid,quantity) VALUES (?,?,?)",[$product->getUserName(),$product->getProductId(),$product->getQuantity()]);
    }
    static function update($product)
    {
        $db= Database::connect();
        $db->update("UPDATE usercart SET quantity=? WHERE productid=?",[$product->getQuantity(),$product->getProductId()]);
    }
    static function delete($id)
    {
        $db= Database::connect();
        $db->delete("DELETE FROM usercart WHERE productid=?",[$id]);
    }
}