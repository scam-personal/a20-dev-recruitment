<?php

namespace App\Http\Controllers;

use App\Http\Functions\PadelLibrary;
use Illuminate\Http\Request;

class PadelController extends Controller
{
    function solve_padel(Request $request)
    {
        $tools = new PadelLibrary();
        $data = $request->input('input_data');
        $category = $tools->prepare_array($data);
        $results = $tools->calc_points_result($category);
        return response([
            'input_data' => $results
        ], 200);
    }
}
