<?php

namespace App\Http\Controllers\Api\jornadas;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\jornada\createjornada;
use App\Services\jornada\jornadaServices;
use Illuminate\Http\Request;

class jornadasController extends Controller
{
    protected $jornadaservices;

    public function __construct(jornadaServices $jornadaServices) {

        $this->jornadaservices = $jornadaServices;

    }

    public function index(){
        $response = $this->jornadaservices->get();

        
        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }

    public function store(createjornada $request)
    {

        $data = $request->validated();

        $response = $this->jornadaservices->Create($data);

        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }

    public function destroy(string $id)
    {
        $response = $this->jornadaservices->delete($id);

        if($response['error'])
            return ResponseFormatter::error($response['message'], $response['code']);

        return ResponseFormatter::success($response['message'], $response['code'], $response['data']??[]);
    }
}
