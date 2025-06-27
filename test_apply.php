<?php

require_once 'vendor/autoload.php';

use App\Models\User;
use App\Models\Listing;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Testing apply functionality...\n";

// Get employee user
$user = User::where('email', 'employee@vieclam24h.com')->first();
echo "User: " . $user->name . " (ID: " . $user->id . ")\n";

// Get first listing
$listing = Listing::first();
echo "Listing: " . $listing->title . " (ID: " . $listing->id . ")\n";

// Check if user has already applied
$hasApplied = $user->listings()->where('listing_id', $listing->id)->exists();
echo "Has applied: " . ($hasApplied ? 'Yes' : 'No') . "\n";

// Check user's resume
echo "User has resume: " . ($user->resume ? 'Yes' : 'No') . "\n";

// Check user type
echo "User type: " . $user->user_type . "\n"; 