<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translation.navigation.rentextensions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                @if (isset($rentextension))
                <livewire:rentextensions.rentextension-form :rentextension="$rentextension" :editMode="true" />
                @else
                <livewire:rentextensions.rentextension-form :editMode="false" />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
