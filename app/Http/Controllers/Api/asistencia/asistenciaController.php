<?php

namespace App\Http\Controllers\Api\asistencia;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\asistencia\createasistencia;
use App\Services\asistencia\asistenciaServices;
use Illuminate\Http\Request;

class asistenciaController extends Controller
{
    protected $horaServices;

    public function __construct(asistenciaServices $horaservices)
    {

        $this->horaServices = $horaservices;
    }

    public function index()
    {
        $response = $this->horaServices->get();


        if ($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
    }

    public function total()
    {
        $response = $this->horaServices->total();


        if ($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
    }

    
    public function store(createasistencia $request)
    {

        $data = $request->validated();

        $response = $this->horaServices->Create($data);

        if ($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
    }

    public function destroy(string $id)
    {
        $response = $this->horaServices->delete($id);

        if ($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data'] ?? []);
    }
}
