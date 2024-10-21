<x-app-layout>
    <section class="w-full px-6 antialiased bg-white">
        <div class="mx-auto max-w-7xl">
            <!-- Main Hero Content -->
            <div class="container max-w-sm py-16 mx-auto mt-px text-left sm:max-w-md md:max-w-lg sm:px-4 md:max-w-none md:text-center">
                <div class="w-full max-w-xl mx-auto">
                    <form method="POST" action="{{ route('words.update', ['id' => $word->id]) }}" class="flex flex-col space-y-4">
                    @csrf
                        <div>
                            <label for="word" class="block text-left text-xl font-bold pb-3">Word</label>
                            <input value="{{ $word->word }}" type="text" name="word" class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">
                        </div>
                        <div>
                            <label for="meaning" class="block text-left text-xl font-bold pb-3">Meaning</label>
                            <textarea x-data="{ 
                                    resize () { 
                                        $el.style.height = '0px'; 
                                        $el.style.height = $el.scrollHeight + 'px' 
                                    } 
                                }"
                                x-init="resize()"
                                @input="resize()"
                                type="text"
                                name="meaning"
                                class="flex w-full h-auto min-h-[80px] px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">{{ $word->meaning }}</textarea>
                        </div>
                        <div>
                            <label for="other" class="block text-left text-xl font-bold pb-3">Other</label>
                            <textarea x-data="{ 
                                    resize () { 
                                        $el.style.height = '0px'; 
                                        $el.style.height = $el.scrollHeight + 'px' 
                                    } 
                                }"
                                x-init="resize()"
                                @input="resize()"
                                type="text"
                                name="other"
                                class="flex w-full h-auto min-h-[80px] px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50">{{ $word->other }}</textarea>
                        </div>
                        <div>
                            <input type="submit" value="edit" name="submit" class="py-3 px-5 mt-3 block md:w-2/5 w-4/5 mx-auto bg-blue-600 hover:bg-blue-500 text-white rounded-full text-lg disabled:opacity-50 disabled:pointer-events-non transition duration-500 ease-in-out">
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Main Hero Content -->
        </div>
    </section>
</x-app-layout>