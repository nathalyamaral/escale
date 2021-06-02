<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Service\UserService;
use App\Service\ItemService;
Use App\Http\Controllers\UserController;

class ItemController extends Controller
{

    private $itemService;
    private $userService;
    private $userController;

    /**
     * ItemService constructor.
     * @param ItemService $itemService
     */
    public function __construct(ItemService $itemService, UserService $userService, UserController $userController)
    {
        $this->itemService = $itemService;
        $this->userService = $userService;
        $this->userController = $userController;
    }


    /**
     * Cria um item
     * @param Request $request
     * @return array|string
     */
    public function createItem(Request $request){
       
        try {

            if ($this->userController->valiteAcess($request)->status() == 401) {
                return $this->userController->valiteAcess($request);
            }
            
            $validator = $this->itemService->validate($request);

            if ($validator->fails()) {
                return response()->json(['message' => "Bad Request", 'errors' => $validator->errors()],400);
            }
            
            return response()->json(['data' => $this->itemService->createItem($request)], 200);
        }catch (\Exception $err){
            return $err->getMessage();
        }
    }
}
