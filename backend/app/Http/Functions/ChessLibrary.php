<?php

namespace App\Http\Functions;

class ChessLibrary
{
    function queensAttack($n, $k, $rq, $cq, $obstacles)
    {
        $up = [];
        if ($rq < $n) {
            for ($i = $rq + 1; $i <= $n; $i++) {
                if (is_bool(array_search([$i, $cq], $obstacles)))
                    array_push($up, [$i, $cq]);
                else
                    break;
            }
        }
        $down = [];
        if ($rq > 1) {
            for ($i = $rq - 1; $i >= 1; $i--) {
                if (is_bool(array_search([$i, $cq], $obstacles)))
                    array_push($down, [$i, $cq]);
                else
                    break;
            }
        }
        $left = [];
        if ($cq > 1) {
            for ($i = $cq - 1; $i >= 1; $i--) {
                if (is_bool(array_search([$rq, $i], $obstacles)))
                    array_push($left, [$rq, $i]);
                else
                    break;
            }
        }
        $right = [];
        if ($cq < $n) {
            for ($i = $cq + 1; $i <= $n; $i++) {
                if (is_bool(array_search([$rq, $i], $obstacles)))
                    array_push($right, [$rq, $i]);
                else
                    break;
            }
        }
        $up_left = [];
        if ($cq > 1 && $rq < $n) {
            $aux_c = $cq - 1;
            $aux_r = $rq + 1;
            while ($aux_c >= 1 && $aux_r <= $n) {
                if (is_bool(array_search([$aux_r, $aux_c], $obstacles)))
                    array_push($up_left, [$aux_r, $aux_c]);
                else
                    break;
                $aux_c--;
                $aux_r++;
            }
        }
        $down_left = [];
        if ($cq > 1 && $rq > 1) {
            $aux_c = $cq - 1;
            $aux_r = $rq - 1;
            while ($aux_c >= 1 && $aux_r >= 1) {
                if (is_bool(array_search([$aux_r, $aux_c], $obstacles)))
                    array_push($down_left, [$aux_r, $aux_c]);
                else
                    break;
                $aux_c--;
                $aux_r--;
            }
        }
        $up_right = [];
        if ($cq < $n && $rq < $n) {
            $aux_c = $cq + 1;
            $aux_r = $rq + 1;
            while ($aux_c <= $n && $aux_r <= $n) {
                if (is_bool(array_search([$aux_r, $aux_c], $obstacles)))
                    array_push($up_right, [$aux_r, $aux_c]);
                else
                    break;
                $aux_c++;
                $aux_r++;
            }
        }
        $down_right = [];
        if ($cq < $n && $rq > 1) {
            $aux_c = $cq + 1;
            $aux_r = $rq - 1;
            while ($aux_c <= $n && $aux_r >= 1) {
                if (is_bool(array_search([$aux_r, $aux_c], $obstacles)))
                    array_push($down_right, [$aux_r, $aux_c]);
                else
                    break;
                $aux_c++;
                $aux_r--;
            }
        }
        return (count($up) + count($down) + count($left) + count($right)
            + count($up_left) + count($up_right) + count($down_left) + count($down_right));
    }
}
