<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Listing $listing)
    {
        $user = auth()->user();

        $exists = $user->favorites()->where('listing_id', $listing->id)->exists();

        $exists
            ? $user->favorites()->detach($listing->id)
            : $user->favorites()->attach($listing->id);

        return response()->json(['favorited' => ! $exists]);
    }
}

