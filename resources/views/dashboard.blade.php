<x-app-layout>
    <section class="w-full px-6 antialiased bg-white">
        <div class="mx-auto max-w-7xl">
            <!-- Main Hero Content -->
            <div class="container max-w-sm py-32 mx-auto mt-px text-left sm:max-w-md md:max-w-lg sm:px-4 md:max-w-none md:text-center">
                <h1 class="text-4xl font-bold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:text-5xl md:text-7xl lg:text-8xl">Discover New Worlds <br class="hidden sm:block"> Through Words</h1>
                <div class="mx-auto mt-5 text-gray-400 md:mt-8 md:max-w-lg md:text-center md:text-xl">Simplifying Your Journey to Master New Words and Expand Your Horizons</div>
                <div class="mt-8 space-y-4 text-center sm:flex-row sm:space-y-0 sm:space-x-4">
                    <span class="relative w-full">
                        <a href="{{ route('words.create') }}" class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-medium leading-6 text-white bg-gray-900 border border-transparent rounded-full xl:px-10 md:w-1/4 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                            Start Now
                        </a>
                    </span>
                </div>
            </div>
            <!-- End Main Hero Content -->

        </div>
    </section>
</x-app-layout>