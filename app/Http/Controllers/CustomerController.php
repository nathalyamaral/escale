<?php

namespace App\Http\Controllers;

use App\Models\Custome;
use Illuminate\Http\Request;
use App\Service\UserService;
use App\Service\CustomerService;
use App\Service\ClientService;
Use App\Http\Controllers\UserController;
use App\Service\ItemService;

class CustomerController extends Controller
{

    private $customerService;
    private $userService;
    private $userController;
    private $clientService;
    private $itemService;

    /**
     * CustomerController constructor.
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService, UserService $userService, UserController $userController, ClientService $clientService, ItemService $itemService)
    {
        $this->customerService = $customerService;
        $this->userService = $userService;
        $this->userController = $userController;
        $this->clientService = $clientService;
        $this->itemService = $itemService;
    }


    /**
     * Cria um customer
     * @param Request $request
     * @return array|string
     */
    public function createCustomer(Request $request){
       
        try {
            
            if ($this->userController->valiteAcess($request)->status() == 401) {
                return $this->userController->valiteAcess($request);
            }
            
            $validator = $this->clientService->validate($request);

            if ($validator->fails()) {
                return response()->json(['message' => "Bad Request", 'errors' => $validator->errors()],400);
            }

            $validator = $this->itemService->validate($request);

            if ($validator->fails()) {
                return response()->json(['message' => "Bad Request", 'errors' => $validator->errors()],400);
            }

            $client = $this->clientService->createClient($request);

            if ($client) {
                $customer = $this->customerService->createCustomer($client);
                if ($customer) {
                    $item = $this->itemService->createItem($request, $customer->id);
                }else{
                    return $customer;
                }
            }else{
                return $client;
            }
            
            return response()->json(['message' => "Ok", 'client' => $client, 'customer' => $customer, 'items' => $item],200);
        }catch (\Exception $err){
            return $err->getMessage();
        }
    }

}
