<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isTrue;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\IPTrackerController;
use App\Http\Controllers\ThirdPartyApiController;

Route::get('/', function () {
    return view('welcome');
});

// Task 1
Route::get('/demo', [DemoController::class, 'index']);
Route::post('/demo', [DemoController::class, 'store']);


// Task 2
Route::get('/ip', [IPTrackerController::class, 'track']);


// Task 3
// Main Logic
Route::get('getData',[ThirdPartyApiController::class,'getData']);
Route::get('exportToExcel',[ThirdPartyApiController::class,'exportToExcel']);

// Helper function ##Handle Json
Route::get('/parse-json', [JsonController::class, 'parseJson']);
Route::get('/import-excel', [ExcelController::class, 'importExcel']);


