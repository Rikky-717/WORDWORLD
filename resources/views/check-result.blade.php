<x-app-layout>
    <section class="w-full antialiased bg-white">
        <div class="mx-auto max-w-7xl pt-8">
            <!-- Main Hero Content -->
            <div class="flex flex-col md:w-4/5 w-full mx-auto pb-8">
                <div class="w-full text-left">
                    <h3 class="text-3xl pb-4">Result</h3>
                </div>
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
                            <td class="px-6 py-4 sm:w-1/12 w-1/6 whitespace-nowrap text-sm text-start font-medium text-gray-800">{{ $loop->iteration }}</td>
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
        </div>
        <!-- End Main Hero Content -->
    </section>
</x-app-layout>