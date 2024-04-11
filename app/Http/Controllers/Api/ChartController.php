<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChartResource;

class ChartController extends Controller
{
    public function barChart($userType, $userId,$year)
    {

        $userType == 'proveedor' ? $userType = 'id_provider' : $userType = 'id_rider';

        // $entregas = Pedido::with('entregas')->where('id_rider',$userId)->get();
        $entregas = Pedido::selectRaw('MONTH(STR_TO_DATE(fecha, "%Y-%m-%d")) AS mes, COUNT(*) AS total_entregas')
                            ->where($userType, $userId)
                            ->whereYear('fecha', $year)
                            ->groupByRaw('MONTH(STR_TO_DATE(fecha, "%Y-%m-%d"))')
                            ->get();

        $items = Array();

        $data['labels'] = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        

        $items = Array();
        
        foreach ($entregas as $entrega) {
            array_push($items,$entrega->total_entregas);
        }

        $data['data'] = $items;

        // return $data;
        return ChartResource::collection($data);
    }
}
