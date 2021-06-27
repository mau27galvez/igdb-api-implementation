<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isTrue;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $unformattedGame = Http::withHeaders(config('services.igdb.headers'))
            ->withBody(
                "
                fields name, cover.url, first_release_date, platforms.abbreviation, rating,
                slug, involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*, similar_games.cover.url, similar_games.name, similar_games.rating,similar_games.platforms.abbreviation, similar_games.slug;
                where slug=\"{$slug}\";
            ",
                'text/plain'
            )
            ->post(config('services.igdb.endpoint'))
            ->json()[0];

        abort_if(!$unformattedGame, 404);

        $game = $this->formatToView($unformattedGame);

        return view('show', compact('game'));
    }

    private function formatToView($unformattedGame)
    {
        // dd(collect($unformattedGame['websites'])->pluck('url')->filter(function ($value) {
        //     return Str::contains($value, 'facebook');
        // })->flatten());

        $game = collect($unformattedGame)->merge([
            'cover_url' => isset($unformattedGame['cover']) ? Str::replaceFirst('thumb', 'cover_big', $unformattedGame['cover']['url']) : null,
            'platforms' => isset($unformattedGame['platforms']) ? collect($unformattedGame['platforms'])->pluck('abbreviation') : null,
            'company' => isset($unformattedGame['involved_companies']) ? $unformattedGame['involved_companies'][0]['company']['name'] : null,
            'genres' => isset($unformattedGame['genres']) ? collect($unformattedGame['genres'])->pluck('name') : null,
            'trailer_url' => isset($unformattedGame['videos']) ? 'https://youtube.com/embed/' . $unformattedGame['videos'][0]['video_id'] : null,
            'screenshots' => isset($unformattedGame['screenshots']) ? collect($unformattedGame['screenshots'])->pluck('url')->map(
                fn ($screenshot) => [
                    'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot),
                    'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot)
                ]
            )->take(9) : null,
            'similar_games' => isset($unformattedGame['similar_games']) ? collect($unformattedGame['similar_games'])->map(
                function ($game) {
                    return collect($game)->merge([
                        'cover_url' => isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : null,
                        'rating' => isset($game['rating']) ? round($game['rating']) : null,
                        'platforms' => collect($game['platforms'])->pluck('abbreviation'),
                    ]);
                }
            )->take(6) : null,
            'social' => isset($unformattedGame['websites']) ? [
                'instagram' => collect($unformattedGame['websites'])->pluck('url')->filter(function ($value) {
                    return Str::contains($value, 'instagram');
                })->flatten()->isEmpty() ? null : collect($unformattedGame['websites'])->pluck('url')->filter(function ($value) {
                    return Str::contains($value, 'instagram');
                })->flatten()[0],
                'twitter' => collect($unformattedGame['websites'])->pluck('url')->filter(function ($value) {
                    return Str::contains($value, 'twitter');
                })->flatten()->isEmpty() ? null : collect($unformattedGame['websites'])->pluck('url')->filter(function ($value) {
                    return Str::contains($value, 'twitter');
                })->flatten()[0],
                'facebook' => collect($unformattedGame['websites'])->pluck('url')->filter(function ($value) {
                    return Str::contains($value, 'facebook');
                })->flatten()->isEmpty() ? null : collect($unformattedGame['websites'])->pluck('url')->filter(function ($value) {
                    return Str::contains($value, 'facebook');
                })->flatten()[0],
            ] : null,
        ]);

        return $game;
    }
}
