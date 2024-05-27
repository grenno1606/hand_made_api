<?php 
namespace Handmade\controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\Users;
use Handmade\Models\UsersDatabase;
class RegisterController extends Controller
{
    function doPost($req, $res)
    {
        $udb=new UsersDatabase();
        $user["userId"]=uniqid();
        $user["userName"]=$req->getBody("userName");
        $password = $req->getBody("password") ?? '';
        $user["email"]=$req->getBody("email");
        $confirmPassword = $req->getBody('confirm-password') ?? '';

        if(strlen($password) < 6) {
            return $res->send(['message' => 'Mật khẩu phải trên 6 ký tự!']);
        }

        if($password != $confirmPassword) {
           return $res->send(['message' => 'Mật khẩu nhập lại không khớp!']);
        }

        $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';

        if(!preg_match($pattern, $user['email'])) {
            return $res->send(['message'=> 'Email không đúng định dạng!']);
        }

        if (!$udb->check($user["userName"])) {
            return $res->send(["message"=> "Người dùng đã tồn tại!"]);
        }

        $user['password'] = $password;
        $udb->add(Users::fromArray($user));
        return $res->send(['message'=> 'Đăng ký thành công!']);
    }
}