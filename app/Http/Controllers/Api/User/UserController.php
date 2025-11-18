<?php

namespace App\Http\Controllers\Api\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreaterUser;
use App\Services\User\userServices;

class UserController extends Controller
{
    protected $userService;

    public function __construct(userServices $userservice) {

        $this->userService = $userservice;

    }

    public function index(){
        $response = $this->userService->getUser();

        
        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }

    public function store(CreaterUser $request)
    {

        $data = $request->validated();

        $response = $this->userService->CreateUser($data);

        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }

    public function destroy(string $id)
    {
        $response = $this->userService->deleteCity($id);

        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }
}
