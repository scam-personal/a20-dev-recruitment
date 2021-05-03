<?php

namespace App\Http\Controllers;

use App\Http\Functions\ChessLibrary;
use Illuminate\Http\Request;

class ChessController extends Controller
{
    function solve_chess(Request $request)
    {
        $tools = new ChessLibrary();
        $input_data = $request->input('input_data');
        // get tuples
        $data = explode("\n", $input_data);
        $tuples = [];
        foreach ($data as $item)
            array_push($tuples, explode(" ", $item));

        // convert to int
        for ($i = 0; $i < count($tuples); $i++) {
            $tuples[$i][0] = (int)$tuples[$i][0];
            $tuples[$i][1] = (int)$tuples[$i][1];
        }

        $n = $tuples[0][0];     //number of rows
        $k = $tuples[0][1];
        $rq = $tuples[1][0];
        $cq = $tuples[1][1];
        $obstacles = array_slice($tuples, 2, count($tuples) - 2);

        // queensAttack(n, k, rq, cq, obstacles)
        $movements = $tools->queensAttack($n, $k, $rq, $cq, $obstacles);
        return response([
            'input_data' => "possible movements: " . $movements
        ], 200);
    }
}
