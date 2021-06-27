<div class="w-full mr-0 recently-reviewed lg:w-3/4 lg:mr-32" wire:init='loadRecentlyReviewed'>
    <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Recently Reviewed</h2>
    <div class="mt-8 space-y-12 recently-reviewed-container">
        @forelse ($recentlyReviewed as $game)
            <div class="flex px-6 py-6 bg-gray-800 rounded-lg shadow-md game">
                <div class="relative flex-none">
                    <a href="{{ route('games.show', $game['slug']) }}">
                        <img src="{{ isset($game['cover_url']) ? $game['cover_url'] : '' }}"
                            alt="game cover" class="w-48 transition duration-150 ease-in-out hover:opacity-75">
                    </a>
                    <div id="{{ 'recently-reviewed-' . $game['slug'] }}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                        style="right: -20px; bottom: -20px">
                        @push('scripts')
                            <x-progressBarScript slug="{{ $game['slug'] }}" :rating="isset($game['rating']) ? $game['rating'] : null" />
                        @endpush
                        {{-- <div class="flex items-center justify-center h-full text-xs font-semibold">
                            {{ $game['rating'] . '%' }}
                        </div> --}}
                    </div>
                </div>
                <div class="ml-6 lg:ml-12">
                    <a href="{{ route('games.show', $game['slug']) }}"
                        class="block mt-4 text-lg font-semibold leading-tight hover:text-gray-400">{{ $game['name'] }}</a>
                    <div class="mt-1 text-gray-400">
                        @foreach ($game['platforms'] as $platform)
                                {{ $platform }},
                        @endforeach
                    </div>
                    <p class="hidden mt-6 text-gray-400 lg:block">
                        {{ $game['summary'] }}
                    </p>
                </div>
            </div>
        @empty
            @for ($i = 0; $i < 3; $i++)
                <div class="flex px-6 py-6 bg-gray-800 rounded-lg shadow-md game">
                    <div class="relative flex-none">
                        <div class="w-48 bg-gray-900 h-60"></div>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                            style="right: -20px; bottom: -20px">
                            <div class="flex items-center justify-center h-full text-xs font-semibold"></div>
                        </div>
                    </div>
                    <div class="ml-6 lg:ml-12">
                        <div class="w-48 h-6 mt-4 bg-gray-900"></div>
                        <div class="w-56 h-4 mt-2 bg-gray-900"></div>
                        <div class="hidden mt-6 space-y-4 lg:block">
                            <span class="inline-block text-transparent bg-gray-900 rounded">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, maxime.
                            </span>
                            <span class="inline-block text-transparent bg-gray-900 rounded">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, maxime.
                            </span>
                            <span class="inline-block text-transparent bg-gray-900 rounded">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, maxime.
                            </span>
                            <span class="inline-block text-transparent bg-gray-900 rounded">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, maxime.
                            </span>
                        </div>
                    </div>
                </div>
            @endfor
        @endforelse
    </div>
</div>

@push('scripts')
    <x-progressBarScript event='recentlyLoaded' />
@endpush
