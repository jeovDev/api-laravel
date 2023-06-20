<?php
use App\Http\Controllers\productController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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


//By default----------------------------------------------
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



//Protected Routes
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/product', [productController::class,'store']);

    Route::put('/product/{id}', [productController::class,'update']);
    Route::delete('/product/{id}', [productController::class,'destroy']);
});


//Public Routes
// Route::resource('products', productController::class);

Route::post('/register', [AuthController::class, 'register']);



Route::get('/products', [productController::class, 'index']);
Route::get('/products/{id}', [productController::class, 'show']);
Route::get('products/search/{name}', [productController::class, 'search']);
//