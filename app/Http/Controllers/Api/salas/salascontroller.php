<?php

namespace App\Http\Controllers\Api\salas;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\salas\createsalas;
use App\Services\salas\salasServices;
use Illuminate\Http\Request;

class salascontroller extends Controller
{
    protected $horaServices;

    public function __construct(salasServices $horaservices) {

        $this->horaServices = $horaservices;

    }

    public function index(){
        $response = $this->horaServices->getUser();

        
        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }

    public function store(createsalas $request)
    {

        $data = $request->validated();

        $response = $this->horaServices->CreateUser($data);

        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }

    public function destroy(string $id)
    {
        $response = $this->horaServices->deleteCity($id);

        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }
}
