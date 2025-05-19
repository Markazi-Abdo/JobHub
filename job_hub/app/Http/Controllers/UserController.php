<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserController extends Controller {
    public function showFormRegister() {
        return view("auth.signup");
    }

    public function registerUser(Request $request) {
        $data = $request->validate([
            "username" => "required|alpha_dash|string",
            "email" => ["required", "string", "email", Rule::unique("users", "email")],
            "password" => "required|confirmed|min:6"
        ]);
        $data['email'] = trim($data['email']);
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        Auth::login($user, true);

        Log::info("User created");
        return redirect()->route("index")->with("message", "user registered succesfullly");
    }

    public function showLogin() {
        return view("auth.login");
    }

    public function loginUser(Request $request) {
        $data = $request->validate([
            "email" => "required|email",
            "password" => "required|confirmed|min:6"
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            Log::info("User connectede");
            return redirect()->route("index")->with("message", "User loggedin succesfully");
        } else {
            Log::error("Auth Failed");
            return redirect()->back()->with("message", "Error couldn't verify user");
        }
        // $user = User::where("email", $data["email"])->first();

        // if (!$user || !Hash::check($data["password"], $user->password)) {
        //     return redirect()->route("index")->with("message", "Invalid Credentials");
        // }

        // Auth::login($user, true);
        // return redirect()->route("index")->with("message", "User loggedin succesfully");
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("index")->with("message", "User Logged Out");
    }

    public function showManagePage() {
        return view("pages.manage");
    }

    public function getUserListings() {
        $user = Auth::user();

        $listings = Listing::where("user_id", $user->id)->paginate(4);

        return view("pages.manage", compact("listings"));
    }

    public function filterUserListings(Request $request) {
        $user = Auth::user();

        $listings = Listing::where("user_id", $user->id)
        ->where("title","like", "%$request->search%")->paginate(4);

        return view("pages.manage", compact("listings"));
    }
}
