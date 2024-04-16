<?php

namespace App\Http\Controllers;

// use App\Models\QrCode;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\QrCodeController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
// use SimpleSoftwareIQ\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    // $idRider, $idProv
    public function show(Request $request)
    {
        
        $idProv = $request->idProv;
        $idRider = $request->idRider;
        // Esta el JOINVITO en mayuscula porque en mi casa esta la carpeta en mayuscula, en clase es joinvito en minuscula
        $url = "http://localhost:8080/JOINVITO/public/api/pedidos/".$idRider. "/". $idProv;
        $response = Http::put($url); 
        $statusCode = $response->status();
 
        if ($statusCode >= 200 && $statusCode < 300) {
            var_dump('bien');
            die();
        } else {
            var_dump('mal');
            die();
        }
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QrCode $qrCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QrCode $qrCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QrCode $qrCode)
    {
        //
    }

    public function confirm($idRider)
    {
        $idRider;
        // $idProv = Auth::user()->id_usu;
        $data['idRider'] = $idRider;
        return view('confirmQr', compact('data'));
    }
}
