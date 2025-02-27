<?php

use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['listing' => Listings::getData()]);
});

Route::get('/find/{id}', function($id){
    return view('lisitings', ["listing" => Listings::find($id)]);
});

Route::get('/markazi', function(){
    return response('yeah', 200)
    ->header("Content-Type", "text/plain")
    ->header("abdo", "markazi");
});

Route::get('/post/{id}', function($id){
    dd($id);
    return response('Post'. $id, 200)
    ->header('parameter', $id);
})->where('id','[0-9]+');

Route::get('/search', function(Request $request){
    dd($request->name);
});


//Api Route
Route::get('/api/message',  function(){
    return response()->json([
        "name" => "Abdelaltrif"
    ]);
});
