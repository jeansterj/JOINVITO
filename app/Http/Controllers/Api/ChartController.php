<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Pedido;
use App\Models\Entrega;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChartResource;

class ChartController extends Controller
{
    public function barChart($userType, $userId,$year)
    {

        $userType == 'proveedor' ? $userType = 'id_provider' : $userType = 'id_rider';

        $data['labels'] = ['January','February','March','April','May','June','July','August','September','October','November','December'];

        $items = Array(0,0,0,0,0,0,0,0,0,0,0,0);

       
        $entregas = Entrega::with(['pedido' => function ($query) use ($userType, $userId) {
            $query->where($userType, $userId); // No es necesario especificar select() si deseas recuperar todos los campos de la relación "pedido"
        }])
        ->whereHas('pedido') // Asegura que solo se seleccionen las entregas que tienen al menos una relación de pedido
        ->get();

        // Sumar la cantidad de packs por mes
        foreach ($entregas as $entrega) {
            // Verificar si el campo "pedido" no es null
            if ($entrega['pedido'] !== null) {
                $mes = date('n', strtotime($entrega['fecha'])); // Obtener el mes de la fecha de entrega
                $items[$mes - 1] += $entrega['cantidad_packs']; // Sumar la cantidad de packs al mes correspondiente (se resta 1 para ajustar al índice del array)
            }
        }


        // Añadimos cada valor de la key a un array no asociativo

        $cantidades = Array();
        foreach ($items as $datos) {
            array_push($cantidades,$datos);
        }

        //Asociamos el array a un array asociativo
        $data['data'] = $cantidades;

        return ChartResource::collection($data);
    }
}
