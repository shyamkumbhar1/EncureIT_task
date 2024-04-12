<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isTrue;
use App\Http\Controllers\ThirdPartyApiController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('traverse-record',[ThirdPartyApiController::class,'fetchDataAndStoreInExcel']);
Route::get('exportToExcel',[ThirdPartyApiController::class,'exportToExcel']);
Route::get('getData',[ThirdPartyApiController::class,'getData']);


