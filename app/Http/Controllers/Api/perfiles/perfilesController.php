<?php

namespace App\Http\Controllers\Api\perfiles;

use App\Http\Controllers\Controller;
use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Services\perfiles\perfilServices;
use App\Http\Requests\perfiles\createPerfiles;
class perfilesController extends Controller
{
    protected $perfilServices;

    public function __construct(PerfilServices $perfilServices){
        $this->perfilServices = $perfilServices;
    }

    public function store(createPerfiles $request)
    {

        $data = $request->validated();

        $response = $this->perfilServices->CreatePerfil($data);

        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }

}
