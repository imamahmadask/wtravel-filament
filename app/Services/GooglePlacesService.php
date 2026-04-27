<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GooglePlacesService
{
    protected string $apiKey;
    protected string $placeId;

    public function __construct()
    {
        $this->apiKey  = config('services.google_places.key', '');
        $this->placeId = config('services.google_places.place_id', '');
    }

    /**
     * Fetch Google Place reviews, cached for 12 hours to save API calls.
     */
    public function getReviews(): array
    {
        if (empty($this->apiKey) || empty($this->placeId)) {
            return [];
        }

        return Cache::remember('google_place_reviews', now()->addHours(12), function () {
            try {
                $response = Http::timeout(10)->get('https://maps.googleapis.com/maps/api/place/details/json', [
                    'placeid' => $this->placeId,
                    'fields'  => 'name,rating,reviews,user_ratings_total',
                    'key'     => $this->apiKey,
                    'language' => 'en',
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    if (isset($data['result'])) {
                        return [
                            'reviews'            => $data['result']['reviews'] ?? [],
                            'rating'             => $data['result']['rating'] ?? null,
                            'user_ratings_total' => $data['result']['user_ratings_total'] ?? null,
                            'name'               => $data['result']['name'] ?? 'West Travel Indonesia',
                        ];
                    }
                }
            } catch (\Exception $e) {
                Log::warning('GooglePlacesService: Failed to fetch reviews. ' . $e->getMessage());
            }

            return [];
        });
    }
}
