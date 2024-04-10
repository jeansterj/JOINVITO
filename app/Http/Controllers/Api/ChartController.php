<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChartResource;

class ChartController extends Controller
{
    public function barChart()
    {
        // Replace this with your actual data retrieval logic
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [65, 59, 80, 81, 56],
        ];

        return ChartResource::collection($data);
    }
}
