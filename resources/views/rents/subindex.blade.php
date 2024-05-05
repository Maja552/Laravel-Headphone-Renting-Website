<x-app-layout>
    <x-slot name="header" >
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('translation.navigation.rents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
            <div class="table-view-wrapper shadow-2xl bg-white shadow-xl bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-90">
                <div class="grid justify-items-stretch pr-2 pt-2">
                    @can('create', App\Models\Rent::class)
                    <x-wireui-button
                        squared color="pink"
                        primary label="{{ __('rents.actions.create') }}"
                        href="{{ route('rents.create') }}" class="justify-self-end"></x-wireui-button>
                    @endcan
                </div>
                <livewire:rents.subrents-table-view />
            </div>
        </div>
    </div>
</x-app-layout>
