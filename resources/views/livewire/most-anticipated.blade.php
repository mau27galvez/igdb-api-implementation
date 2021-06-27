<div wire:init='loadMostAnticipated'>
    <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Most Anticipated</h2>
    <div class="mt-8 space-y-10 most-anticipated-container">
        @forelse ($mostAnticipated as $game)
            <x-smallGameCard :game="$game" />
        @empty
            @for ($i = 0; $i < 4; $i++)
                <x-small-game-card-skeleton />
            @endfor
        @endforelse
    </div>
</div>
