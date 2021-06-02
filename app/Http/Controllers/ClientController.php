<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Service\UserService;
use App\Service\ClientService;
Use App\Http\Controllers\UserController;

class ClientController extends Controller
{

    private $clientService;
    private $userService;
    private $userController;

    /**
     * ClientController constructor.
     * @param ClientService $clientService
     */
    public function __construct(ClientService $clientService, UserService $userService, UserController $userController)
    {
        $this->clientService = $clientService;
        $this->userService = $userService;
        $this->userController = $userController;
    }


    /**
     * Cria um cliente
     * @param Request $request
     * @return array|string
     */
    public function createClient(Request $request){
       
        try {

            if ($this->userController->valiteAcess($request)->status() == 401) {
                return $this->userController->valiteAcess($request);
            }
            
            $validator = $this->clientService->validate($request);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()]);
            }
            
            return response()->json(['data' => $this->clientService->createClient($request)], 200);
        }catch (\Exception $err){
            return $err->getMessage();
        }
    }

}
