<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VenueController extends Controller
{
    public function fetchVenues(Request $request)
    {
        try {
            $countryId = $request->input('country_id');
            Log::info('Fetching venues for country ID: ' . $countryId);

            if (!$countryId) {
                Log::warning('No country ID provided');
                return response()->json(['error' => 'Country ID is required'], 400);
            }

            $venues = Venue::where('country_id', $countryId)->get();
            Log::info('Found ' . $venues->count() . ' venues');

            return response()->json([
                'success' => true,
                'venues' => $venues
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching venues: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching venues'], 500);
        }
    }
}
