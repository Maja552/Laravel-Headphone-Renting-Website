
<x-lv-layout>
    {{-- Search input and filters --}}
    <div class="py-4 px-3 pb-0">
        @include('laravel-views::components.toolbar.toolbar')
    </div>

    @if (count($items))
    {{-- Content table --}}
    <div class="overflow-x-scroll lg:overflow-x-visible">
        @include('rents.table')
    </div>

    @else
    {{-- Empty data message --}}
    <div class="flex justify-center items-center p-4">
        <h3>{{ __('rents.table_empty') }}</h3>
    </div>
    @endif

    {{-- Paginator, loading indicator and totals --}}
    <div class="p-4">
        {{ $items->links() }}
    </div>
</x-lv-layout>

