<div class="mt-8 game">
    <div class="relative inline-block">
        <a href="{{ route('games.show', $game['slug']) }}">
            <img src="{{ isset($game['cover_url']) ? $game['cover_url'] : '' }}" alt="game cover" class="transition duration-150 ease-in-out hover:opacity-75">
        </a>
        @if (isset($game['rating']))
            <div id="{{ $game['slug'] }}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: -20px; bottom: -20px">
                @push('scripts')
                    <x-progressBarScript slug="{{ $game['slug'] }}" :rating="isset($game['rating']) ? $game['rating'] : null" :event=null />
                @endpush
                {{-- <div class="flex items-center justify-center h-full text-xs font-semibold">
                    {{ $game['rating'].'%' }}
                </div> --}}
            </div>
        @endif
    </div>
    <a href="{{ route('games.show', $game['slug']) }}" class="block mt-8 text-base font-semibold leading-tight hover:text-gray-400">{{ $game['name'] }}</a>
    <div class="mt-1 text-gray-400">
        @foreach ($game['platforms'] as $platform)
            {{ $platform }},
        @endforeach
    </div>
</div>