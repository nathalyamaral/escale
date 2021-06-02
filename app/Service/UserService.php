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

        $chave = $request->header('token');
        $secret = strtoupper(md5('Auth@'));
        $data = strtoupper(md5(date('Ymd')));
        $key = strtoupper(md5('3sCal3'.$secret.$data));

        return $chave == $key;
    }
}
