<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle($id)
    {
        $user = Auth::user();
        $listing = Listing::findOrFail($id);

        if ($user->hasFavorited($id)) {
            $user->favorites()->detach($id);
            return response()->json(['favorited' => false]);
        } else {
            $user->favorites()->attach($id);
            return response()->json(['favorited' => true]);
        }
    }

    public function index()
    {
        $favorites = Auth::user()->favorites()->with('profile')->latest()->paginate(8);
        return view('job.favorites', compact('favorites'));
    }
     public function favorites()
    {
        $user = Auth::user();

        // Nếu bạn dùng bảng trung gian favorites (belongsToMany)
        $favorites = $user->favorites; // bạn phải có quan hệ trong model User

        return view('job.favorites', compact('favorites'));
    }
}

