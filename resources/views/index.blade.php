<x-app>
    <x-header />

    <div class="container px-4 mx-auto">
        <livewire:popular-games />

        <div class="flex flex-col my-10 lg:flex-row">
            <livewire:recently-reviewed />

            <div class="mt-12 most-anticipated lg:w-1/4 lg:mt-0">
                <livewire:most-anticipated />
                <livewire:coming-soon />
            </div>
        </div>
    </div>

    <x-footer />
</x-app>
