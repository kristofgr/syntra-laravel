<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Entries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                    <form method="POST" action="{{ route('entries.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="plate" :value="__('Plate')" />
                            <x-text-input id="plate" class="block w-full" type="plate" name="plate" :value="old('plate')" required autofocus />
                            <x-input-error :messages="$errors->get('plate')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="plate" :value="__('Message')" />
                            <textarea
                                name="message"
                                placeholder="{{ __('What\'s on your mind?') }}"
                                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            >{{ old('message') }}</textarea>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        </div>

                        <x-primary-button class="mt-4">{{ __('Add') }}</x-primary-button>

                    </form>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden">

                <div class="mt-6">
                    @foreach ($entries as $entry)
                        <div class="p-6 mb-6 bg-white flex space-x-2 shadow-sm rounded-lg divide-y">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-gray-800">{{ $entry->user->name }}</span>
                                        <small class="ml-2 text-sm text-gray-600">{{ $entry->created_at->format('j M Y, g:i a') }}</small>
                                    </div>
                                </div>
                                <p class="mt-4 text-lg text-gray-900">{{ $entry->plate }} | {{ $entry->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
