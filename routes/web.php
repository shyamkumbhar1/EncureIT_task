<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isTrue;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\IPTrackerController;
use App\Http\Controllers\ThirdPartyApiController;

Route::get('/', function () {
    return view('welcome');
});

// Task 1 : Store Data to database with execution time
Route::get('/demo', [DemoController::class, 'index']);
Route::post('/demo', [DemoController::class, 'store']);


// Task 2 : Find Location Using IP
Route::get('/ip', [IPTrackerController::class, 'track']);


// Task 3 : Get All ID's and Store to excel File
// Main Logic
Route::get('getData',[ThirdPartyApiController::class,'getData']);
Route::get('exportToExcel',[ThirdPartyApiController::class,'exportToExcel']);

// Helper function ##Handle Json
Route::get('/parse-json', [JsonController::class, 'parseJson']);
Route::get('/import-excel', [ExcelController::class, 'importExcel']);

// Task 4 : Send Email
Route::get('/send-email', [EmailController::class, 'showForm']);
Route::post('/send-email', [EmailController::class, 'sendEmail']);
