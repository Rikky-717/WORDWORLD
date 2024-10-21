<x-app-layout>
    <section class="w-full px-6 antialiased bg-white">
        <div class="mx-auto max-w-7xl">
            <!-- Main Hero Content -->
            <div class="container max-w-sm py-16 mx-auto mt-px text-left sm:max-w-md md:max-w-lg sm:px-4 md:max-w-none md:text-center">
                <div class="w-full max-w-xl mx-auto">
                    <div class="flex flex-col space-y-4">
                        <div>
                            <label for="word" class="block text-center text-sm font-medium pb-3">Word</label>
                            <h3 class="text-center text-5xl font-bold pb-6">{{ $word->word }}</h3>
                        </div>
                        <div>
                            <label for="meaning" class="block text-center text-sm font-medium pb-3">Meaning</label>
                            <h3 class="text-center text-3xl font-bold">{{ $word->meaning }}</h3>
                        </div>
                        <div>
                            <label for="other" class="block text-center text-sm font-medium pb-3">Other</label>
                            <h3 class="text-center text-3xl font-bold">{{ $word->other }}</h3>
                        </div>
                        <div class="flex flex-col items-center justify-center py-16 space-y-4 text-center sm:flex-row sm:space-y-0 sm:space-x-4">
                            <span class="relative inline-flex w-full md:w-auto">
                                <a href="{{ route('words.edit', ['id' => $word->id]) }}" class="inline-flex items-center justify-center w-full px-12 py-4 text-base font-medium leading-6 text-white bg-gray-900 border border-transparent rounded-full lg:px-20 md:w-auto hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                                    Edit
                                </a>
                            </span>
                            <span class="relative inline-flex w-full md:w-auto"
                                x-data="{ modalOpen: false }"
                                @keydown.escape.window="modalOpen = false"
                                :class="{ 'z-40': modalOpen }">
                                <button @click="modalOpen=true" class="inline-flex items-center justify-center w-full px-12 py-4 text-base font-medium leading-6 text-gray-900 bg-gray-100 border border-transparent rounded-full lg:px-20 md:w-auto hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                                    Delete
                                </button>
                                <template x-teleport="body">
                                    <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                                        <div x-show="modalOpen"
                                            x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0"
                                            x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in duration-300"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-70"></div>
                                        <div x-show="modalOpen"
                                            x-trap.inert.noscroll="modalOpen"
                                            x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
                                            class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg">
                                            <div class="flex items-center justify-between pb-3">
                                                <h3 class="text-lg font-semibold text-red-600">Confirm Deletion</h3>
                                                <button @click="modalOpen=false" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="relative w-auto pb-8">
                                                <p>Are you sure you want to delete this word? This action cannot be undone.</p>
                                            </div>
                                            <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                                                <button @click="modalOpen=false" type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-100 focus:ring-offset-2">Cancel</button>
                                                <form id="delete_{{ $word->id }}" method="post" action="{{ route('words.destroy', ['id' => $word->id]) }}" class="inline-flex items-center justify-center">
                                                    @csrf
                                                    <button type="submit" class="w-full h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-neutral-950 hover:bg-neutral-900">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Hero Content -->
        </div>
    </section>
</x-app-layout>