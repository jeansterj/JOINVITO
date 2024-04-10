<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChartResource;

class ChartController extends Controller
{
    public function barChart($userId)
    {

        // $entregas = Pedido::with('entregas')->where('id_rider',$userId)->get();
        // $entregas = Pedido::with('entregas')
        //                 ->selectRaw('MONTH(fecha) AS mes,YEAR(fecha) AS anyo, COUNT(*) AS total_entregas')
        //                 ->where('id_rider', $userId)
        //                 ->groupByRaw('YEAR(fecha), MONTH(fecha)')
        //                 ->get();
        
        // Replace this with your actual data retrieval logic
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [65, 59, 80, 81, 56],
        ];

        return ChartResource::collection($data);
    }
}
