<?php

namespace App\Factories;

class ClientFactory
{
    public static function build($client)
    {
    
        $obj = new \stdClass();
        $obj->type = strtoupper($client['type']);
        $obj->document = $obj->type == 'PJ' ? self::cnpj(preg_replace("/[^0-9]/", "", $client['document'])) : self::cpf(preg_replace("/[^0-9]/", "", $client['document']));
        $obj->name = $client['name'];

        return $obj;
    }

    /**
    * Formata uma string segundo a máscara de CPF
    * @param string $cpf
    * @return string
    */
    public static function cpf($cpf) {

       if (strlen($cpf) == 11) {
           return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9);
       }
       return $cpf;
    }


    /**
     * Formata uma string segundo a máscara de CNPJ
     * @param $cnpj
     * @return string
     */
    public static function cnpj($cnpj) {
        
        if (strlen($cnpj) == 14) {

            return substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);

        }
        return $cnpj;
    }
}