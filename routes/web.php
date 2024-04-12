<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isTrue;
use App\Http\Controllers\{DemoController};
use App\Http\Controllers\EmailController;
use App\Http\Controllers\IPTrackerController;
use App\Http\Controllers\ThirdPartyApiController;

Route::get('/', function () {
    return view('welcome');
});

// Task 1 : Store Data to database with execution time
Route::get('/demo', [DemoController::class, 'index'])->name('demo');
Route::post('/demo', [DemoController::class, 'store']);

// Task 2 : Find Location Using IP
Route::get('/ip', [IPTrackerController::class, 'track'])->name('ip');


// Task 3 : Get All ID's and Store to excel File
Route::get('getData',[ThirdPartyApiController::class,'getData'])->name('getData');
Route::get('exportToExcel',[ThirdPartyApiController::class,'exportToExcel']);

// Task 4 : Send Email
Route::get('/send-email', [EmailController::class, 'showForm'])->name('send.email');
Route::post('/send-email', [EmailController::class, 'sendEmail']);
