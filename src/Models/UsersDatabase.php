<?php 
namespace Handmade\Models;
use Handmade\Utils\Database;
class UsersDatabase
{
    static function getAll()
    {
        $db= Database::connect();
        $data=$db->select("SELECT * FROM users");
        return $data;
    }
    static function getById($id)
    {
        $db= Database::connect();
        $data=$db->selectOne("SELECT * FROM users WHERE userid=?",[$id]);
        return $data;
    }
    static function add($user)
    {
        $db= Database::connect();
        $db->insert("INSERT INTO users(userid,username,password,email) VALUES (?,?,?,?)",[$user->getUserId(),$user->getUserName(),$user->getPassword(),$user->getEmail()]);
    }
    static function update($user)
    {
        $db= Database::connect();
        $db->update("UPDATE users SET password=? WHERE userid=?",[$user->getPassword(),$user->getUserId()]);
    }
    static function delete($id)
    {
        $db= Database::connect();
        $db->delete("DELETE FROM users WHERE userid=?",[$id]);
    }
    
    public function checkrole($username){
        $data=self::getAll();
        for ($i= 0;$i<count($data);$i++){
            // $arr=Users::fromArray($data[$i]);
            $arr=$data[$i];
            if ($arr['username']==$username) {
                if ($arr['role']=="admin") {
                return true;
                }
                return false;
            }
        }
        return false;
    }

    public function login($user)
    {
        $db = Database::connect();
        $data = $db->selectOne("SELECT * FROM users WHERE username = ?", [$user["userName"]]);
        if (!$data)
            throw new \Exception("Không tìm thấy người dùng!", 404);
        // $data = Users::fromArray($data);
        if ($data["password"]!= $user['password'])
            throw new \Exception("Mật khẩu không chính xác!", 401);
        return $data;
    }

    public function check($username)
    {
        $db= Database::connect();
        $data=$db->select("SELECT * FROM users WHERE username=?", [$username]);
        if (!$data) return true;
        return false;
    }
}