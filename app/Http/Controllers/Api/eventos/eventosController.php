<?php

namespace App\Http\Controllers\Api\eventos;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\eventos\createEventos;
use App\Services\eventos\eventosServices;
use Illuminate\Http\Request;

class eventosController extends Controller
{

    protected $horaServices;

    public function __construct(eventosServices $horaservices)
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

    public function store(createEventos $request)
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
