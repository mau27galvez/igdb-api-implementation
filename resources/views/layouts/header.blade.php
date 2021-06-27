<header class="border-b border-gray-800">
    <nav class="container flex flex-col items-center justify-between px-4 py-6 mx-auto space-y-4 lg:space-y-0 lg:flex-row">
        <div class="flex flex-col items-center space-y-4 lg:space-y-0 lg:flex-row">
            <a href="/">
                <img src="/laracasts-logo.svg">
            </a>

            <ul class="flex space-x-8 lg:ml-16">
                <li><a href="#" class="hover:text-gray-400">Games</a></li>
                <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                <li><a href="#" class="hover:text-gray-400">Coming soon</a></li>
            </ul>
        </div>

        <div class="flex items-center">
            <livewire:search-dropdown />

            <div class="ml-6">
                <a href="#">
                    <img src="/avatar.jpg" alt="avatar" class="w-8 rounded-full">
                </a>
            </div>
        </div>
    </nav>
</header>
