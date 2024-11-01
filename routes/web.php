<?php

use App\Http\Controllers\PeopleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'OK'
    ]);
});

Route::get('/somar', function(Request $request) {
    // Não está chegando nada pela request
    if(count($request->all()) < 1) {
        return response()->json([
            'message' => 'Não há valores para somar'
        ], 406);
    }

    $soma = array_sum($request->all());
    return response()->json([
        'message' => 'somado com sucesso',
        'sum' => $soma
    ]);
});

    Route::get('people/list', [PeopleController::class, 'list']);

    Route::post('people/store', [PeopleController::class, 'store']);

    Route::post('people/storeInterest', [PeopleController::class, 'storeInterest']);
