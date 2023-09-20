<?php

use App\Http\Controllers\Api\SeasonsController;
use App\Http\Controllers\Api\SeriesController;
use App\Models\Episode;
use App\Models\Series;
use App\Models\User;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    
    
    Route::apiResource("/series",SeriesController::class);
    
    Route::post("/upload", [SeriesController::class,"upload"]);
    
    Route::get("/series/{series}/seasons", [SeasonsController::class,"index"]);
    
Route::get("/series/{series}/episodes", function (Series $series) {
    return $series->episodes;
});

Route::patch("/episodes/{episode}",function (Episode $episode, Request $request) {
    $episode->watched = $request->watched;
    $episode->save();
    
    return $episode;
});

});
Route::post("/login",function (Request $request) {
    $credentials = $request->only(["email","password"]);
    
    if(Auth::attempt($credentials) === false){
        return response()->json("Unauthorized",401);
    };
    
    $user = Auth::user();
    
    // $user = User::whereEmail($credentials["email"])->first();
    // // dd($user->password);
    // if($user == null || Hash::check($credentials["password"],$user->password) === false){
        //     return response()->json("Unauthorized",401);
        // };
        
        $token = $user->createToken("token");
        
        return response()->json($token->plainTextToken);
        
    });