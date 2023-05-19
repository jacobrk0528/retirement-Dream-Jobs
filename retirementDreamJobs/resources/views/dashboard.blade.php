<x-app-layout>
    <x-header name="Dashboard"></x-header>

    {{-- Loged in message --}}
    <x-page-section>
        <div class="p-6 text-gray-900">
            {{ __("You're logged in!") }}
        </div>
    </x-page-section>

    {{-- Quiz Sections --}}
    <x-page-section>
        <div class="flex justify-center items-center">
            <div class="p-6">
                <h2>Quiz</h2>
            </div>

            <div class="p-6 ml-auto">
                @if (Auth::user()->quizTaken == 0)
                    <a href="/quiz">
                        <x-primary-button>{{ __('Take Quiz') }}</x-primary-button>
                    </a>
                @else
                    <a href="/quiz">
                        <x-primary-button>{{ __('View Quiz') }}</x-primary-button>
                    </a>
                @endif
            </div>
        </div>
    </x-page-section>

</x-app-layout>
