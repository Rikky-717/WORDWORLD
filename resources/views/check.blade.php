<x-app-layout>
    <section class="w-full px-6 antialiased bg-white">
        <div class="mx-auto max-w-7xl">
            <!-- Main Hero Content -->
            <div class="w-2/3 mx-auto my-16 text-center">
                <div class="">
                    <p class="font-bold">{{ $count + 1 }}/{{ count(session('randomWords')) }}</p>
                </div>
                <div class="py-24">
                    <div id="word">
                        <h2 class="text-5xl">{{ $word->word }}</h2>
                    </div>
                    <div id="meaning" style="display: none;">
                        <h2 class="text-3xl">{{ $word->meaning }}</h2>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center mt-8 space-y-4 text-center sm:flex-row sm:space-y-0 sm:space-x-4">
                    <span class="relative inline-flex w-full md:w-auto">
                        <button id="checkButton" class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-medium leading-6 text-white bg-gray-900 border border-transparent rounded-full xl:px-10 md:w-auto hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                            Check
                        </button>
                    </span>
                    <span class="relative inline-flex w-full md:w-auto">
                        @if ($count === count(session('randomWords')) - 1)
                        <a href="{{ route('words.resultCheck') }}" class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-medium leading-6 text-gray-900 bg-gray-100 border border-transparent rounded-full xl:px-10 md:w-auto hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                            Finish
                        </a>
                        @else
                        @php $count++ @endphp
                        <a href="{{ route('words.check', ['count' => $count]) }}" class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-medium leading-6 text-gray-900 bg-gray-100 border border-transparent rounded-full xl:px-10 md:w-auto hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                            Next
                        </a>
                        @endif
                    </span>
                </div>
            </div>
            <script>
                document.getElementById('checkButton').addEventListener('click', function() {
                    var wordDiv = document.getElementById('word');
                    var meaningDiv = document.getElementById('meaning');

                    // 表示・非表示を切り替える
                    if (wordDiv.style.display === 'none') {
                        wordDiv.style.display = 'block';
                        meaningDiv.style.display = 'none';
                    } else {
                        wordDiv.style.display = 'none';
                        meaningDiv.style.display = 'block';
                    }
                });
            </script>
            <!-- End Main Hero Content -->
        </div>
    </section>
</x-app-layout>