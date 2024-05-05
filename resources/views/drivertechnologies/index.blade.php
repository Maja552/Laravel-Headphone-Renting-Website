<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('translation.navigation.drivertechnologies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="table-view-wrapper bg-white shadow-2xl bg-white shadow-xl bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-90">
                <div class="grid justify-items-stretch pr-2 pt-2">
                    @can('create', App\Models\Drivertechnology::class)
                    <x-wireui-button squared color="pink" primary label="{{ __('drivertechnologies.actions.create') }}"
                                     href="{{ route('drivertechnologies.create') }}" class="justify-self-end"></x-wireui-button>
                    @endcan
                </div>
                <livewire:drivertechnologies.drivertechnologies-table-view />
            </div>
        </div>
    </div>
</x-app-layout>
