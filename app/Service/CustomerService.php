<?php


namespace App\Service;

use Illuminate\Validation\Rule;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Factories\CustomerFactory;

class CustomerService
{

    public function createCustomer($client){

        $customer = Customer::create([
                            'client_document' => $client->document,
                            'customer_idcliente' => $client->id
                        ]);;

        return $customer;
    }

}
