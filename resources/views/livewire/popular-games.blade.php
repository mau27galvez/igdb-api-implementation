<div wire:init='loadPopularGames'>
    <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Popular Games</h2>
    <div class="grid grid-cols-1 gap-12 pb-16 text-sm border-b border-gray-800 popular-games md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6">
        @forelse ($popularGames as $game)
            <x-gameCard :game="$game" />
        @empty
            @for ($i = 0; $i < 12; $i++)
                <div class="mt-8 game">
                    <div class="relative inline-block">
                        <div class="h-56 bg-gray-800 w-44"></div>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-700 rounded-full" style="right: -20px; bottom: -20px">
                            <div class="flex items-center justify-center h-full text-xs font-semibold">
                            </div>
                        </div>
                    </div>
                    <div class="block h-6 mt-6 text-base font-semibold leading-tight bg-gray-700 hover:text-gray-400 w-44"></div>
                </div>
            @endfor
        @endforelse
    </div>
</div>

@push('scripts')
    <x-progressBarScript event='PopularLoaded' />
@endpush
