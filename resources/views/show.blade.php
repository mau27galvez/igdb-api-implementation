<x-app>
    <x-header />

    <main class="py-8">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col pb-12 border-b border-gray-800 lg:flex-row">
                <div class="flex-none">
                    <img src="{{ $game['cover_url'] }}" alt="game cover" />
                </div>

                <div class="lg:ml-12 lg:mr-64">
                    <h2 class="mt-1 text-4xl font-semibold leading-tight lg:mt-0">
                        {{ $game['name'] }}
                    </h2>
                    <div class="text-gray-400">
                        @if(isset($game['genres']))
                            <span>
                                @foreach ($game['genres'] as $genre)
                                    {{ $genre }},
                                @endforeach
                            </span>
                            &middot;
                        @endif
                        <span>
                            {{ $game['company'] }}
                        </span>
                        &middot;
                        <span>
                            @foreach ($game['platforms'] as $platform)
                                {{ $platform }},
                            @endforeach
                        </span>
                    </div>

                    <div class="flex flex-wrap items-center mt-8">
                        <div class="flex flex-wrap items-center">
                            <div class="flex items-center">
                                <div id="membersScore" class="relative w-16 h-16 text-sm bg-gray-800 rounded-full">
                                    @push('scripts')
                                        <x-progressBarScript slug="membersScore" :rating="isset($game['rating']) ? $game['rating'] : '-'" :event=null />
                                    @endpush

                                    {{-- <div class="flex items-center justify-center h-full text-xs font-semibold">
                                        @if (isset($game['rating']))
                                            {{ round($game['rating']) }}%
                                        @else
                                            -
                                        @endif
                                    </div> --}}
                                </div>
                                <div class="ml-4 text-xs">
                                    Members <br> Score
                                </div>
                            </div>

                            <div class="flex items-center ml-12">
                                <div id="criticScore" class="relative w-16 h-16 text-sm bg-gray-800 rounded-full">
                                    @push('scripts')
                                        <x-progressBarScript slug="criticScore" :rating="isset($game['aggregated_rating']) ? $game['aggregated_rating'] : '-'" :event=null />
                                    @endpush

                                    {{-- <div class="flex items-center justify-center h-full text-xs font-semibold">
                                        @if (isset($game['aggregated_rating']))
                                            {{ round($game['aggregated_rating']) }}%
                                        @else
                                            -
                                        @endif
                                    </div> --}}
                                </div>
                                <div class="ml-4 text-xs">
                                    Critic <br> Score
                                </div>
                            </div>

                            <div class="flex items-center mt-4 space-x-4 lg:mt-0 lg:ml-12">
                                @if(isset($game['social']['instagram']))
                                    <div class="flex items-center justify-center w-8 h-8 bg-gray-800 rounded-full">
                                        <a href="{{ $game['social']['instagram'] }}" class="hover:text-gray-500">
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 16 18" fill="none">
                                                <g clip-path="url(#clip0)">
                                                    <path
                                                        d="M8.004 4.957c-2.272 0-4.104 1.804-4.104 4.04 0 2.235 1.832 4.039 4.104 4.039 2.271 0 4.103-1.804 4.103-4.04 0-2.235-1.832-4.039-4.103-4.039zm0 6.666c-1.468 0-2.668-1.178-2.668-2.627 0-1.448 1.196-2.626 2.668-2.626 1.471 0 2.667 1.178 2.667 2.626 0 1.449-1.2 2.627-2.667 2.627zm5.228-6.831a.948.948 0 01-.957.942.948.948 0 01-.957-.942.95.95 0 01.957-.942.95.95 0 01.957.942zm2.718.956c-.06-1.262-.354-2.38-1.293-3.301-.936-.921-2.071-1.21-3.353-1.273C9.982 1.1 6.02 1.1 4.7 1.174c-1.279.06-2.414.348-3.354 1.27-.939.92-1.228 2.038-1.292 3.3-.075 1.301-.075 5.2 0 6.5.06 1.263.353 2.381 1.292 3.302.94.921 2.072 1.21 3.354 1.273 1.321.074 5.282.074 6.604 0 1.282-.06 2.417-.348 3.353-1.273.936-.921 1.229-2.039 1.293-3.301.075-1.3.075-5.196 0-6.497zm-1.707 7.893a2.68 2.68 0 01-1.522 1.497c-1.053.412-3.553.317-4.717.317-1.165 0-3.668.091-4.718-.317a2.68 2.68 0 01-1.522-1.497c-.418-1.037-.321-3.498-.321-4.645 0-1.146-.093-3.61.321-4.644a2.68 2.68 0 011.522-1.497c1.053-.412 3.553-.317 4.718-.317 1.164 0 3.667-.091 4.717.317.7.274 1.24.805 1.522 1.497.418 1.037.321 3.498.321 4.644 0 1.147.097 3.611-.321 4.645z" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                        <path fill="#fff" d="M0 0h16v18H0z" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                                @if(isset($game['social']['twitter']))
                                    <div class="flex items-center justify-center w-8 h-8 bg-gray-800 rounded-full">
                                        <a href="{{ $game['social']['twitter'] }}" class="hover:text-gray-500">
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M6.382 15h-.06a8.152 8.152 0 01-3.487-.818 1.035 1.035 0 01-.585-1.08 1.057 1.057 0 01.87-.885 4.972 4.972 0 001.905-.667 7.117 7.117 0 01-2.633-6.803 1.058 1.058 0 01.75-.862 1.012 1.012 0 011.073.308 5.317 5.317 0 003.66 2.062A3.375 3.375 0 018.932 3.93a3.352 3.352 0 014.778.142.525.525 0 00.585.075 1.043 1.043 0 011.455 1.2 4.993 4.993 0 01-.96 1.95A8.093 8.093 0 016.382 15zm0-1.5h.06a6.592 6.592 0 006.818-6.442.99.99 0 01.277-.638c.183-.232.34-.483.465-.75a1.92 1.92 0 01-1.432-.638 1.836 1.836 0 00-1.32-.532 1.875 1.875 0 00-1.343.518 1.897 1.897 0 00-.54 1.814l.195.856-.877.06a6.225 6.225 0 01-4.905-1.8 5.34 5.34 0 002.797 4.845l.713.405-.473.675a4.216 4.216 0 01-2.01 1.44 6.25 6.25 0 001.568.187h.007z" />
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                                @if(isset($game['social']['facebook']))
                                    <div class="flex items-center justify-center w-8 h-8 bg-gray-800 rounded-full">
                                        <a href="{{ $game['social']['facebook'] }}" class="hover:text-gray-500">
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 14 16" fill="none">
                                                <path
                                                    d="M14 2.5v11a1.5 1.5 0 01-1.5 1.5H9.834V9.463h1.894L12 7.35H9.834V6c0-.612.17-1.028 1.047-1.028H12V3.084A15.044 15.044 0 0010.369 3C8.756 3 7.65 3.984 7.65 5.794v1.56h-1.9v2.112h1.903V15H1.5A1.5 1.5 0 010 13.5v-11A1.5 1.5 0 011.5 1h11A1.5 1.5 0 0114 2.5z" />
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <p class="mt-12">{{ $game['summary'] }}</p>

                    <div x-data="{ isTrailerModalVisible: false }" class="mt-12">
                        <button
                            @click="isTrailerModalVisible = true"
                            class="inline-flex px-4 py-4 font-semibold text-white transition ease-in-out bg-blue-500 rounded hover:bg-blue-600 duration-50">
                            <svg class="w-6 fill-current" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z">
                                </path>
                            </svg>

                            <span class="ml-2">
                                Play Trailer
                            </span>
                        </button>

                        <template x-if="isTrailerModalVisible">
                            <div
                                style="background-color: rgba(0, 0, 0, .5);"
                                class="fixed top-0 left-0 z-50 flex items-center w-full h-full overflow-y-auto shadow-lg"
                            >
                                <div class="container mx-auto overflow-y-auto rounded-lg lg:px-32">
                                    <div class="bg-gray-900 rounded">
                                        <div class="flex justify-end pt-2 pr-4">
                                            <button
                                                @click="isTrailerModalVisible = false"
                                                @keydown.escape.window="isTrailerModalVisible = false"
                                                class="text-3xl leading-none hover:text-gray-300"
                                            >
                                                &times;
                                            </button>
                                        </div>
                                        <div class="px-8 py-8 modal-body">
                                            <div class="relative overflow-hidden responsive-container" style="padding-top: 56.25%">
                                                <iframe width="560" height="315" class="absolute top-0 left-0 w-full h-full responsive-iframe" src="{{ $game['trailer_url'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <div
                x-data="{ isImageModalVisible: false, image: '' }"
                class="pb-12 mt-8 border-b border-gray-800">
                <h2 class="font-semibold tracking-wide text-blue-500 uppercase"></h2>

                <div class="grid grid-cols-1 gap-12 mt-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($game['screenshots'] as $screenshot)
                        <div>
                            <a
                                href="#"
                                @click.prevent="
                                    isImageModalVisible = true
                                    image='{{ $screenshot['big'] }}'
                                ">
                                <img src="{{ $screenshot['big'] }}"
                                    class="transition duration-150 ease-in-out hover:opacity-75" alt="screenshot" />
                            </a>
                        </div>
                    @endforeach
                </div>

                <template x-if="isImageModalVisible">
                    <div
                        style="background-color: rgba(0, 0, 0, .5);"
                        class="fixed top-0 left-0 z-50 flex items-center w-full h-full overflow-y-auto shadow-lg"
                    >
                        <div class="container mx-auto overflow-y-auto rounded-lg lg:px-32">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pt-2 pr-4">
                                    <button
                                        class="text-3xl leading-none hover:text-gray-300"
                                        @click="isImageModalVisible = false"
                                        @keydown.escape.window="isImageModalVisible = false"
                                    >
                                        &times;
                                    </button>
                                </div>
                                <div class="px-8 py-8 modal-body">
                                    <img :src="image" alt="screenshot">
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            @if(isset($game['similar_games']))
                <div class="mt-8">
                    <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Similar Games</h2>

                    <div class="grid grid-cols-1 gap-12 pb-16 text-sm md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6">
                        @foreach ($game['similar_games'] as $similarGame)
                            <x-gameCard :game="$similarGame" />
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </main>

    <x-footer />
</x-app>
