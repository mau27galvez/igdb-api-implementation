<div class="flex game">
    <a href="{{ route('games.show', $game['slug']) }}"><img
            src="{{ isset($game['cover_url']) ? $game['cover_url'] : '' }}"
            alt="game cover"
            class="w-16 transition duration-150 ease-in-out hover:opacity-75"></a>
    <div class="ml-4">
        <a href="{{ route('games.show', $game['slug']) }}" class="hover:text-gray-300">{{ $game['name'] }}</a>
        <div class="mt-1 text-sm text-gray-400">
            {{ $game['release_date'] }}</div>
    </div>
</div>