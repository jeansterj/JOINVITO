<?php

namespace App\Http\Controllers\Api;

// use App\Models\QrCode;
use App\Models\Rider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // var_dump
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($idRider)
    {

        $idRider;
        // $idProv;
    
        /** Cuando estemos en el server */
        // $env = env('APP_URL');
        // $info = $env . "/joinvito/public/api/pedidos/".$idRider."/1";
        $info = "http://localhost:8080/joinvito/public/confirmQr/". $idRider;
        // $info ;= "http://localhost:8080/joinvito/public/api/pedidos/".$idRider. "/". $idProv;
        // Http::put($info); 

        $url = json_encode(['ruta'=>$info]);

        // $url = json_encode(['ruta'=>$info]);

        // response()->json(['ruta'=>$response])

        $array_url = json_decode($url, true);

        // Acceder a la URL en el array asociativo
        $ruta = $array_url['ruta'];

        // Mostrar solo la URL

        $qr = QrCode::generate($ruta);
        
        return $qr;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QrCodeController $qrCodeController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QrCodeController $qrCodeController)
    {
        //
    }
}
