<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\InputProdukController;


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


//API route for register new user
Route::post('/register', [AuthController::class, 'register']);
//API route for login user
Route::post('/login', [AuthController::class, 'login']);


//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });


    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
    // API route for input produk
    Route::post('/api_simpan_input_produk', [inputprodukcontroller::class, 'api_simpan_input_produk']);
    // API route for get produk
    Route::get('/api_get_produk', [inputprodukcontroller::class, 'api_get_produk']);
    // API route simpan edit produk
    Route::post('/api_simpan_edit_produk', [inputprodukcontroller::class, 'api_simpan_edit_produk']);
    //API route hapus
    Route::post('/api_hapus_produk', [inputprodukcontroller::class, 'api_hapus_produk']);
});
    