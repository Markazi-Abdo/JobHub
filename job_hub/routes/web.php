<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("/", [ListingController::class, "getListings"])->name("index");
Route::get("/{listing}", [ListingController::class, "getListing"]);
Route::post("/filter", [ListingController::class, "searchListings"])->name("search");
Route::post("/create", [ListingController::class, "createListing"]);
Route::get("/edit/{listing}", [ListingController::class, "edit"])->name("edit");
Route::put("/update/{listing}", [ListingController::class, "updateListing"]);
Route::delete("/delete/{listing}", [ListingController::class, "deleteListing"]);
Route::get("/listings/create", fn() => view("pages.create"))->name("create");





































// Route::get('/', function () {
//     return view('welcome', ['listing' => Listings::getData()]);
// });

// Route::get('/find/{id}', function($id){
//     return view('lisitings', ["listing" => Listings::find($id)]);
// });

// Route::get('/markazi', fn() =>
//     response('yeah', 200)
//     ->header("Content-Type", "text/plain")
//     ->header("abdo", "markazi")
// );

// Route::get('/post/{id}', function($id){
//     dd($id);
//     return response('Post'. $id, 200)
//     ->header('parameter', $id);
// })->where('id','[0-9]+');

// Route::get('/search', function(Request $request){
//     dd($request->name);
// });


// //Api Route
// Route::get('/api/message',  function(){
//     return response()->json([
//         "name" => "Abdelaltrif"
//     ], 200);
// });
