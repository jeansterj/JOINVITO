<?php

namespace App\Http\Controllers\Api;

use App\Models\Riders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RidersResource;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riders = Riders::with(['favoritos.proveedor.menus'])->get();


        return RidersResource::collection($riders);
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
    public function show(Riders $riders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Riders $riders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Riders $riders)
    {
        //
    }
}
