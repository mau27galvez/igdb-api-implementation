<div wire:init='loadComingSoon'>
    <h2 class="mt-12 font-semibold tracking-wide text-blue-500 uppercase">Coming Soon</h2>
    <div class="mt-8 space-y-10 most-anticipated-container">
        @forelse ($comingSoon as $game)
            <x-smallGameCard :game="$game" />
        @empty
            @for ($i = 0; $i < 4; $i++)
                <x-small-game-card-skeleton />
            @endfor
        @endforelse
    </div>
</div>
