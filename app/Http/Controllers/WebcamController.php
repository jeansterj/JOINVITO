<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class WebcamController extends Controller
{
    public function index()
    {
        return view('cameraPage');
    }

    public function scan(Request $request)
    {
        $content = $request->input('content');
        // Puedes hacer lo que quieras con el contenido del código QR, como guardarlo en la base de datos.
        // return response()->json(['success' => true, 'content' => $content]);
        return response()->json(['success' => true, 'content' => $content]);
    }
}

// namespace App\Http\Controllers;
    
// use Illuminate\Http\Request;
// use Storage;
  
// class WebcamController extends Controller
// {
//     /**
//      * Write code on Method
//      *
//      * @return response()
//      */
//     public function index()
//     {
//         return view('webcam');
//     }
  
//     /**
//      * Write code on Method
//      *
//      * @return response()
//      */
//     public function store(Request $request)
//     {
//         $img = $request->image;
//         $folderPath = "uploads/";
        
//         $image_parts = explode(";base64,", $img);
//         $image_type_aux = explode("image/", $image_parts[0]);
//         $image_type = $image_type_aux[1];
        
//         $image_base64 = base64_decode($image_parts[1]);
//         $fileName = uniqid() . '.png';
        
//         $file = $folderPath . $fileName;
//         Storage::put($file, $image_base64);
        
//         dd('Image uploaded successfully: '.$fileName);
//     }
// }