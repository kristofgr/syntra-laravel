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
    </div>
</x-app-layout>
