<?php

namespace App\Http\Controllers\Api\ficha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ficha\FichaServices;
use App\Http\Requests\Ficha\createficha;
use App\Helpers\ResponseFormatter;

class fichaController extends Controller
{

    protected $fichaServices;
    public function __construct(FichaServices $fichaServices) {

        $this->fichaServices = $fichaServices;

    }

    public function store(createficha $request){

        $data = $request->validated();

        $response = $this -> fichaServices->createFicha($data);

        if ($response['error'])
        return ResponseFormatter::error($response['message'], $response['code']);

    return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
    }

}
