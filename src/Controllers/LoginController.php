<?php

namespace Handmade\Controllers;

use DunnServer\MVC\Controller;
use Handmade\Models\UsersDatabase;

class LoginController extends Controller
{
    function doPost($req, $res)
    {
        $udb=new UsersDatabase();
        $user["userName"]=$req->getBody('userName');
        $user["password"]=$req->getBody('password');

        try {
            $userAuth = $udb->login($user);
            $userAuth['token'] = $user['userName'].":".$user['password'];
            $res->send($userAuth);
        } catch (\Throwable $th) {
            $res->status($th->getCode());
            $res->send(['error' => $th->getMessage()]);
        }
    }
}
