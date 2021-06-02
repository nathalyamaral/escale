<?php


namespace App\Service;

use Illuminate\Validation\Rule;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Factories\ClientFactory;

class ClientService
{

    public function validate(Request $request){

        $request->type = strtoupper($request->type);

        $validate = Validator::make($request->all(), [
            "document" => 'required',
            "type" => [
                        'required', Rule::in(['PF', 'PJ', 'pF', 'Pf', 'pf', 'pJ', 'pj', 'Pj'])
                       ],
            "name" => 'required',
        ]);

        if ($validate->fails()) {
            return $validate;
        }

        if (strtoupper($request->type) == 'PJ') {
            $type = 'cnpj';
        }else if (strtoupper($request->type) == 'PF') {
            $type = 'cpf';
        }

        $validate = Validator::make($request->all(), [
            "document" => $type,
        ]);

        return $validate;
    }

    public function createClient(Request $request){

        $data = ClientFactory::build($request->all());
       
        $client = Client::create([
                            'document' => $data->document,
                            'type' => $data->type,
                            'name' => $data->name
                        ]);;

        return $client;
    }

}
