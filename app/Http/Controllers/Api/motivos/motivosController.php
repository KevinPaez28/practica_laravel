<?php

namespace App\Http\Controllers\Api\motivos;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\motivos\createMotivo;
use App\Services\motivos\motivosServices;
use Illuminate\Http\Request;

class motivosController extends Controller
{
    protected $motivosServices;

    public function __construct(motivosServices $motivoservices) {

        $this->motivosServices = $motivoservices;

    }

    public function index(){
        $response = $this->motivosServices->get();

        
        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }

    public function store(createMotivo $request)
    {

        $data = $request->validated();

        $response = $this->motivosServices->Create($data);

        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }

    public function destroy(string $id)
    {
        $response = $this->motivosServices->delete($id);

        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }
}
