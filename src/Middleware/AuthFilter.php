<?php

namespace Handmade\Middleware;

use DunnServer\Middlewares\Filter;
use Handmade\Models\UsersDatabase;

class AuthFilter implements Filter
{
    function doFilter($req, $res, $chain)
    {
        $authorization = $req->getHeaders('Authorization');
        if (!$authorization) {
            $res->status(401)->send([
                'error' => 'Unauthorized'
            ]);
            return;
        }
        $token = explode(' ', $authorization)[1];
        $data = explode(':', $token);
        $username = $data[0];
        $password = $data[1];
        $udb = new UsersDatabase();
        $user["userName"] = $username;
        $user["password"] = $password;
        try {
            $userAuth = $udb->login($user);
            $req->setParams('user', $userAuth);
            $chain->doFilter($req, $res);
        } catch (\Throwable $th) {
            $res->status($th->getCode());
            $res->send(['error' => $th->getMessage()]);
            return;
        }
    }
}