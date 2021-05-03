<?php

use App\Http\Controllers\ChessController;
use App\Http\Controllers\PadelController;
use App\Http\Controllers\StringsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('padel',[PadelController::class, 'solve_padel']);
Route::post('chess',[ChessController::class, 'solve_chess']);
Route::post('strings',[StringsController::class, 'solve_strings']);