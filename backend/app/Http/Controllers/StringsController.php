<?php

namespace App\Http\Controllers;

use App\Http\Functions\StringsLibrary;
use Illuminate\Http\Request;

class StringsController extends Controller
{
    function solve_strings(Request $request)
    {
        $data = $request->input('input_data');
        $tools = new StringsLibrary();
        $max = $tools->solve_strings($data);
        return response([
            'input_data' => $max
        ], 200);
    }
}
