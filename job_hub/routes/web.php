<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Auth Routes
Route::get("/signup", [UserController::class, "showFormRegister"])->name("signup")->middleware("guest");
Route::post("/user/signup", [UserController::class, "registerUser"])->name("register");
Route::get("/login", [UserController::class, "showLogin"])->name("login")->middleware('guest');
Route::post("/user/login", [UserController::class, "loginUser"])->name("auth");
Route::post("/logout", [UserController::class, "logout"])->name("logout")->middleware('auth');

Route::get("/user/manage", [UserController::class, "getUserListings"])->name("manage")->middleware("auth");
Route::post("/user_filter", [UserController::class, "filterUserListings"])->name("filter")->middleware("auth");

// Routes concerned with Listings
Route::get("/", [ListingController::class, "getListings"])->name("index");
Route::get("/{listing}", [ListingController::class, "getListing"]);
Route::post("/filter", [ListingController::class, "searchListings"])->name("search");
Route::post("/create", [ListingController::class, "createListing"])->middleware('auth');
Route::get("/edit/{listing}", [ListingController::class, "edit"])->name("edit")->middleware('auth');
Route::put("/update/{listing}", [ListingController::class, "updateListing"])->middleware('auth');
Route::delete("/delete/{listing}", [ListingController::class, "deleteListing"])->middleware('auth');
Route::get("/listings/create", fn() => view("pages.create"))->name("create")->middleware('auth');







































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
