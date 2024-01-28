<?php

use App\Http\Controllers\Api\CommonApi;
use App\Http\Controllers\Api\LoginApi;
use App\Http\Controllers\Api\SaleApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Api Login
Route::post('login', [LoginApi::class, 'loginPost']);
Route::post('common-data', [CommonApi::class, 'commonData']);
Route::post('sale-list', [SaleApi::class, 'saleList']);
Route::post('sale-create', [SaleApi::class, 'saleCreatePost']);
Route::post('sale/detail', [SaleApi::class, 'saleDetail']);
Route::post('sale-add-product', [SaleApi::class, 'saleProductAddPost']);
Route::post('sale-product/remove', [SaleApi::class, 'saleProductRemovePost']);
Route::post('sale-clear', [SaleApi::class, 'saleClearPost']);
Route::post('sale-confirm', [SaleApi::class, 'saleConfirm']);
Route::post('sale-confirm/detail', [SaleApi::class, 'saleConfirmDetail']);





