<x-app-layout>
    <section class="w-full px-6 antialiased bg-white">
        <div class="mx-auto max-w-7xl">
            <!-- Main Hero Content -->
            <div class="container max-w-sm py-16 mx-auto mt-px text-left sm:max-w-md md:max-w-lg sm:px-4 md:max-w-none md:text-center">
                <div class="w-full max-w-xl mx-auto">
                    <div class="flex flex-col space-y-4">
                        @csrf
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
                                <form id="delete_{{ $word->id }}" method="post" action="{{ route('words.destroy', ['id' => $word->id]) }}">
                                    @csrf
                                    <button data-id="{{ $word->id }}" onclick="deletePost(this)" type="submit" class="inline-flex items-center justify-center w-full px-12 py-4 text-base font-medium leading-6 text-white bg-gray-900 border border-transparent rounded-full lg:px-20 md:w-auto hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                                        Delete
                                    </button>
                                </form>
                            </span>
                            <span class="relative inline-flex w-full md:w-auto">
                                <a href="{{ route('words.edit', ['id' => $word->id]) }}" class="inline-flex items-center justify-center w-full px-12 py-4 text-base font-medium leading-6 text-gray-900 bg-gray-100 border border-transparent rounded-full lg:px-20 md:w-auto hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                                    Edit
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Hero Content -->
        </div>
    </section>
    <script>
        function deletePost(e) {
            'use strict'
            if (confirm('Are you sure you want to delete this?')) {
                document.getElementById('delete_' + e.dataset.id).submit()
            }
        }
    </script>
</x-app-layout>