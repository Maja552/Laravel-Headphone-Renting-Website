<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translation.navigation.headphones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                @if (isset($headphone))
                <livewire:headphones.headphone-form :headphone="$headphone" :editMode="true" />
                @else
                <livewire:headphones.headphone-form :editMode="false" />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

