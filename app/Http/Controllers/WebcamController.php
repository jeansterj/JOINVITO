<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class WebcamController extends Controller
{
    public function index()
    {
        return view('register/cameraPage');
    }

    public function scan(Request $request)
    {
        $content = $request->input('content');
        // Puedes hacer lo que quieras con el contenido del código QR, como guardarlo en la base de datos.
        // return response()->json(['success' => true, 'content' => $content]);
        return response()->json(['success' => true, 'content' => $content]);
    }
}
