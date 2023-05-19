<x-app-layout>
    <x-header name="Quiz"></x-layout>

    <x-page-section class="rounded-xl">

                <h1 class="text-center font-bold text-2xl">Take out job finder quiz!</h1>

                <form method="POST" action="/contact" class="mt-10 p-4">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-6">
                        <label class="block mb-2 font-bold text-m text-gray-700"
                            for="Perfered_Work_Enviroment"
                        >Perfered Work Enviroment
                        </label>

                        <input type="radio" id="Indoor" name="Perfered_Work_Enviroment" value="Indoor">
                        <label for="html">Indoor</label><br>
                        <input type="radio" id="Outdoor" name="Perfered_Work_Enviroment" value="Outdoor">
                        <label for="css">Outdoor</label><br>

                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="mb-6">
                        <button type="submit"
                            class="bg-blue-500 text-white font-semibold text-xl rounded py-2 px-4"
                        >Submit
                        </button>
                    </div>
                </form>
    </x-page-section>
</x-app-layout>
