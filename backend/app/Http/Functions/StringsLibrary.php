<?php

namespace App\Http\Functions;

class StringsLibrary
{
    function solve_strings($data)
    {
        $max = 0;
        for ($i = 1; $i <= strlen($data); $i++) {
            $substr = substr($data, 0, $i);
            $k = 0;
            $cc = 0;
            while (strlen($substr) <= strlen(substr($data, $k))) {
                if (str_contains(substr($data, $k, strlen($substr)), $substr))
                    $cc++;
                $k++;
            }
            if ($cc * strlen($substr) > $max)
                $max = $cc * strlen($substr);
        }
        return $max;
    }
}
