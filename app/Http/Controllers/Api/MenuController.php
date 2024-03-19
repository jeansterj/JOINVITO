<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
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
    public function show(Menu $menu)
    {
        // $menus = Menu::where('id_usu', $ownerId);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function getMenusProvider($provId)
    {

        $menus = Menu::where('id_prov',$provId)->get();

        return MenuResource::collection($menus);

    }

    public function getOrdersProvider($provId)
    {

        $pedidos = Menu::has('pedidos')->with('pedidos')->where('id_prov',$provId)->get();

        return MenuResource::collection($pedidos);

    }

}
