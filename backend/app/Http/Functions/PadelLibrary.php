<?php

namespace App\Http\Functions;

class PadelLibrary{
    
    function prepare_array($data)
    {
        $category = [];
        $game_set = [];
        array_push($game_set, explode("\n", $data));
        for ($i = 0; $i < count($game_set[0]); $i++) {
            if (strpos($game_set[0][$i], " ") !== false) {
                array_push($category, explode(" ", $game_set[0][$i]));
                $category[$i][1] = (int)$category[$i][1];
                $category[$i][3] = (int)$category[$i][3];
                if ($category[$i][1] > $category[$i][3]) {
                    $category[$i][1] = 2;
                    $category[$i][3] = 1;
                } else {
                    $category[$i][1] = 1;
                    $category[$i][3] = 2;
                }
            } else
                array_push($category, $game_set[0][$i]);
        }
        return $category;
    }

    function calc_points_result($category){
        //sum points
        $teams = [];
        $points = [];
        $results = "";

        for ($i = 0; $i < count($category); $i++) {
            if (is_array($category[$i]) == 1) {
                $index = array_search($category[$i][0], $teams);
                if (is_integer($index) && $index >= 0)
                    $points[$index] = $points[$index] + $category[$i][1];
                else {
                    array_push($teams, $category[$i][0]);
                    array_push($points, $category[$i][1]);
                }
                $index = array_search($category[$i][2], $teams);
                if (is_integer($index) && $index >= 0)
                    $points[$index] = $points[$index] + $category[$i][3];
                else {
                    array_push($teams, $category[$i][2]);
                    array_push($points, $category[$i][3]);
                }
            } else {
                if ($category[$i] == "FIN") {

                    //get max point
                    $max = $points[0];
                    $max_index = 0;
                    for ($j = 0; $j < count($points); $j++) {
                        if ($points[$j] > $max) {
                            $max_index = $j;
                            $max = $points[$j];
                        }
                    }

                    $draw = 0;
                    for ($j = 0; $j < count($points); $j++) {
                        if ($points[$j] == $max)
                        $draw = $draw + 1;
                    }

                    // get non played games
                    $total_games = (count($teams) - 1) * 2; //True formula to get the games to play for each team, in the example this line is incorrect!!
                    $played_games = 0;
                    for ($j = 0; $j < count($category); $j++) {
                        if (is_array($category[$j]) == 1) {
                            if ($category[$j][0] == $teams[$max_index] || $category[$j][2] == $teams[$max_index])
                                $played_games++;
                        }
                    }
                    
                    if ($draw > 1)
                        $results = $results . "  - " . "EMPATE" . " " . ($total_games - $played_games) . "\n";
                    else {
                        $results = $results . "  - " . $teams[$max_index] . " " . ($total_games - $played_games) . "\n";
                    }

                    $teams = [];
                    $points = [];
                } else {
                    $results = $results . $category[$i] . ":\n";
                }
            }
        }

        return $results;
    }

}