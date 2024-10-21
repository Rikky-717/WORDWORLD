<x-app-layout>
    <section class="w-full px-6 antialiased bg-white">
        <div class="mx-auto max-w-7xl">
            <!-- Main Hero Content -->
            <div class="text-center sm:w-3/4 w-full sm:py-24 py-16 mx-auto">
                <h2 class="font-bold sm:text-5xl text-3xl pb-12">Are you ready?</h2>
                <form method="post" action="{{ route('words.setCheck') }}">
                    @csrf
                    <label for="how" class="sm:text-2xl text-lg">How many words?</label>
                    <select name="how" class="py-3 px-4 pe-9 block sm:w-1/2 w-3/4 mx-auto my-8 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                        <option value="10" selected>10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                    <div>
                        <input type="submit" value="start" name="submit" class="py-3 px-5 mt-16 block md:w-2/5 w-4/5 mx-auto bg-gray-900 hover:bg-gray-800 text-white rounded-full text-lg disabled:opacity-50 disabled:pointer-events-none transition duration-500 ease-in-out">
                    </div>
                </form>
            </div>
            <!-- End Main Hero Content -->
        </div>
    </section>
</x-app-layout>