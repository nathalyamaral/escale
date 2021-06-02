<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function makeAccessKey()
    {
        return $this->userService->generateAccessKey();
    }

    public function valiteAcess(Request $request){

        if (!$this->userService->validateAccess($request)){
            return response()->json(['message' => 'No authorized'],401);
        }else{
            return response()->json(['message' => 'Ok'],200);
        }
    }
}
