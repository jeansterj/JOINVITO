<?php

namespace App\Http\Controllers\Api;

// use App\Models\QrCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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

        $qr = QrCode::generate($idRider);
        
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
