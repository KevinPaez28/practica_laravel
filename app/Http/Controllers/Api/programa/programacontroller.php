<?php

namespace App\Http\Controllers\Api\programa;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\programa\programaServices;
use App\Http\Requests\Programa\createPrograma;

class programacontroller extends Controller
{
    protected $programaServices;


    public function __construct(programaServices $programaServices)
    {
        $this->programaServices = $programaServices;
    }

    public function index(){
        $response = $this->programaServices->getProgramas();

        
        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }
    public function store(createPrograma $request)
    {
        $data = $request->validated();

        $response = $this->programaServices->createPrograma($data);


        if ($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
    }
    public function destroy(string $id)
    {
        $response = $this->programaServices->deleteCity($id);

        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }
}
