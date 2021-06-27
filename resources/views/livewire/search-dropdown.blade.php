<div x-data="{ isVisible: true }" @click.away="isVisible = false" class="relative">
    <input
        wire:model="search"
        @focus="isVisible = true"
        type="text"
        class="w-64 px-3 py-1 pl-8 text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2"
        placeholder="Search..."
        >
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg class="w-4 text-gray-400 fill-current" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" /></svg>
    </div>

    <div wire:loading class="top-0 right-0 mt-3 mr-4 spinner" style="position: absolute;"></div>

    @if (strlen($search) >= 2)
        <div x-show.transition.opacity.duration.250="isVisible" class="absolute z-50 w-64 mt-2 text-sm bg-gray-800 rounded">
            <ul>
                @if (count($searchResults) > 0)
                    @foreach ($searchResults as $game)
                        <li class="border-b border-gray-700">
                            @if ($loop->last)
                                <a
                                    @keydown.tab="isVisible = false"
                                    href="{{ route('games.show', $game['slug']) }}"
                                    class="flex items-center px-3 py-3 transition duration-150 ease-in-out hover:bg-gray-700">
                                    <img src="{{ isset($game['cover']['url']) ? $game['cover']['url'] : '' }}" alt="cover" class="w-10" />
                                    <span class="ml-4">{{ $game['name'] }}</span>
                                </a>
                            @endif
                            <a
                                href="{{ route('games.show', $game['slug']) }}"
                                class="flex items-center px-3 py-3 transition duration-150 ease-in-out hover:bg-gray-700">
                                <img src="{{ isset($game['cover']['url']) ? $game['cover']['url'] : '' }}" alt="cover" class="w-10" />
                                <span class="ml-4">{{ $game['name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li class="flex items-center px-3 py-3 transition duration-150 ease-in-out border-b border-gray-700 hover:bg-gray-700">
                        <span class="">No results found for "{{ $search }}"</span>
                    </li>
                @endif

            </ul>
        </div>
    @endif
</div>