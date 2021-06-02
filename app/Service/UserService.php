<?php

namespace App\Service;

use Illuminate\Http\Request;

class UserService
{

    /**
     * Metodo valida token acesso
     *
     * @param Request $request
     * @return bool
     */
    public function validateAccess(Request $request){

        $keyrequest = $request->header('token');
        $secret = strtoupper(md5('Auth@'));
        $data = strtoupper(md5(date('Ymd')));
        $key = strtoupper(md5('3sCal3'.$secret.$data));

        return $keyrequest == $key;
    }

    /**
     * Gera o token autenticação
     *
     * @return string
     */
    public function generateAccessKey(){

        $secret = strtoupper(md5('Auth@'));
        $data = strtoupper(md5(date('Ymd')));
        $key = strtoupper(md5('3sCal3'.$secret.$data));

        return ['status' => 200, 'message' => 'Ok', 'token' => $key];
    }
}
