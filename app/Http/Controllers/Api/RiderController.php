<?php

namespace App\Http\Controllers\Api;

use App\Models\Rider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RiderResource;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riders = Rider::with(['favoritos.proveedor.menus'])->get();


        return RiderResource::collection($riders);
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
    public function show(Rider $rider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rider $rider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rider $rider)
    {
        //
    }

    public function cercanos($lat, $long)
    {
        
    }
}
