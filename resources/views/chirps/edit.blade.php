<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form action="{{ route('chirps.update', $chirp) }}"
            method="POST">
            @method('patch')
            @csrf
            <label for="Message"
                   class="text-black w-100 m-1">
                I want to chirp about....
            </label>
            <textarea
                name="message" id="Message"
                placeholder="{{ __('Editing the Chirp...') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 text-gray-800
                        focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm">
                {{ old('message', $chirp->message) }}</textarea>
            <x-input-error :messages="$errors->get('messages')"
                           class="mt-2"/>
            <x-primary-button class="mt-4">{{ __('Save')}}</x-primary-button>
            <a href="{{ route('chirps.index') }}">{{ __('Cancel') }}</a>
        </form>
    </div>
</x-app-layout>
