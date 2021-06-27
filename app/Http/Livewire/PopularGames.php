<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class PopularGames extends Component
{
    public $popularGames = [];

    public function render()
    {
        return view('livewire.popular-games');
    }

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $popularGamesUnformatted = Http::withHeaders(config('services.igdb.headers'))
            ->withBody(
                "fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;
            where platforms = (48,49,130,6)
            & (first_release_date >= {$before}
            & first_release_date < {$after}
            & total_rating_count > 5);
            sort total_rating_count desc;
            limit 12;",
                "text/plain"
            )->post(config('services.igdb.endpoint'))
            ->json();

        $this->popularGames = $this->formatForView($popularGamesUnformatted);

        collect($this->popularGames)->each(function ($game) {
            $this->emit('PopularLoaded', [
                'slug' => $game['slug'],
                'rating' => isset($game['rating']) ? $game['rating'] : '-',
            ]);
        });

        // collect($this->popularGames)->filter(function ($game) {
        //     return $game['rating'];
        // })->each(function ($game) {
        //     $this->emit('loaded', [
        //         'slug' => $game['slug'],
        //         'rating' => $game['rating'] / 100
        //     ]);
        // });
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'cover_url' => isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : null,
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation'),
            ]);
        })->toArray();
    }
}
