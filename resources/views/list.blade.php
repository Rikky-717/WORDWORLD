<x-app-layout>
    <section class="w-full antialiased bg-white">
        <div class="mx-auto max-w-7xl pt-8">
            <!-- Main Hero Content -->
            <div class="flex flex-col md:w-4/5 w-full mx-auto pb-8">
                <!-- Search form -->
                <form method="get" action="{{ route('words.index') }}" class="sm:w-1/2 w-3/4 mx-auto mb-8">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Input"/>
                        <button class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                </form>
                <!-- End Search form -->
                <table class="w-full table-fixed divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 sm:w-1/12 w-1/6 whitespace-nowrap text-sm text-start font-medium uppercase text-gray-500">No.</th>
                            <th class="px-6 py-3 sm:w-4/12 w-3/6 text-sm text-start font-medium uppercase text-gray-500">meaning</th>
                            <th class="px-6 py-3 sm:w-5/12 hidden sm:table-cell text-sm text-start font-medium uppercase text-gray-500">other</th>
                            <td class="px-6 py-3 sm:w-2/12 w-2/6 whitespace-nowrap text-sm text-start font-medium uppercase text-gray-500">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($words) && $words->isNotEmpty())
                        @foreach($words as $word)
                        <tr>
                            <td class="px-6 py-4 sm:w-1/12 w-1/6 whitespace-nowrap text-sm text-start font-medium text-gray-800">{{ $loop->iteration + ($words->perPage() * ($words->currentPage() - 1)) }}</td>
                            <td class="px-6 py-4 sm:w-4/12 w-3/6 truncate text-sm text-start font-medium text-gray-800">{{ $word->word }}</td>
                            <td class="px-6 py-4 sm:w-5/12 hidden sm:table-cell truncate text-sm text-start font-medium text-gray-800">{{ $word->meaning }}</td>
                            <td class="px-6 py-3 sm:w-2/12 w-2/6 whitespace-nowrap text-sm text-start font-medium uppercase text-blue-600 hover:text-blue-500">
                                <a href="{{ route('words.show', ['id' => $word->id]) }}">detail</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $words->links() }}
        </div>
        <!-- End Main Hero Content -->
    </section>
</x-app-layout>