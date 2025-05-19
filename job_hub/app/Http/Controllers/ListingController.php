<?php
namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\search;

class ListingController extends Controller {
    public function getListings(): View {
        try {
            $listings = Listing::latest()->paginate(6);
            $message = null;

            if ($listings->isEmpty()) {
                $message = "No listings available";
                return view("pages.index", compact(["message", "listings"]));
            }


            $message = "Retrieval succesfull";
            return view("pages.index", compact(["message", "listings"]));

        } catch(Exception $error) {
            return view("pages.index", compact("error"));
        }
    }

    public function getListing(Listing $listing) {
        try {
            $message = "Got listing succesfully";
            return view("pages.listing", compact(["message", "listing"]));

        } catch (ModelNotFoundException $error) {
            $message = "Listing not found";
            return view("pages.listing", compact(["error", "message"]));
        }
    }

    public function searchListings(Request $request) {
        try {
            $searchInput = $request->input("search");
            $listings = Listing::where("title", "like", "%$searchInput%")
            ->orWhere("tags", "like", "%$searchInput%")
            ->orWhere("company", "like", "%$searchInput%")
            ->paginate(6);
            $message = null;

            if ($listings->isEmpty()) {
                $message = "Listing doesn't exist";
                return view("pages.filters", compact(["listings", "message"]));
            }

            return view("pages.filters", compact(["listings", "message"]));
        } catch (Exception $error) {
            $message = "Couldn't get listing";
            return view("pages.filters", compact(["error", "message"]));
        }
    }

    public function createListing(Request $request) {
        $inputs = $request->validate([
            "title" => "required",
            "description" => "required|max:150",
            "company" => "required",
            "email" => "required|email",
            "website" => "required",
            "location" => "required",
            "tags" => "required|regex:/^#[A-Za-z ]+$/",
            "photo" => "required|mimes:png,jpeg,jpg"
        ]);

        $path = $request->file("photo")->store("images", "public");
        if (!$path) {
            return redirect()->back()->with("message", "Couldn't upload photo");
        }

        $inputs['photo'] = $path;
        $inputs['user_id'] = Auth::user()->id;
        Listing::create($inputs);

        return redirect()->back()->with("message", "Listing created succesfully");
    }

    public function edit(Listing $listing) {
        return view("pages.edit", compact("listing"));
    }

    public function updateListing(Request $request, Listing $listing) {
        if (!Auth::check() && Auth::user()->id !== $listing->user_id) {
            return redirect()->back()->with("message", "Not Owner can't manipulate it");
        }

        $inputs = $request->validate([
        "title" => "required",
        "description" => "required|max:150",
        "company" => "required",
        "email" => "required|email",
        "website" => "required",
        "location" => "required",
        "tags" => "required|regex:/^#[A-Za-z ]+$/",
        "photo" => "mimes:png,jpeg,jpg"
        ]);

        if ($request->hasFile("photo")) {
            $path = $request->file("photo")->store("images", "public");
            if (!$path) {
                return redirect()->back()->with("message", "Couldn't upload photo");
            }

            $inputs['photo'] = $path;
        }

        $listing->update($inputs);
        return redirect()->back()->with("message", "Item Updated Succesfully");
    }

    public function deleteListing(Listing $listing) {
        if (!Auth::check() && Auth::user()->id !== $listing->user_id) {
            return redirect()->back()->with("message", "Not Owner can't manipulate it");
        }

        $listing->delete();
        return redirect()->route("index")->with("message", "Item deleted succesfully");
    }
}
