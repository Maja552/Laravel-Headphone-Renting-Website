
<table class="border-solid border-slate-300 border-b border-t border-l border-r border-gray-200">
    <?php
        $isuser = Illuminate\Support\Facades\Auth::user()->hasRole('user');

        $items = \App\Models\Rentedunit::where('idRent', $ourRent->id)->get();

        $subview = new \App\Http\Livewire\Rentedunits\RentedunitsTableView();
        $subheaders = $subview->headers();
        $actionsByRow = $subview->actionsByRow();
    ?>

    <thead class="bg-gray-100 text-xs leading-4 font-semibold uppercase tracking-wider text-left">
    <tr>
        @if ($this->hasBulkActions)
        <th class="pl-3">
          <span class="flex items-center justify-center">
            <x-lv-checkbox wire:model="allSelected"></x-lv-checkbox>
          </span>
        </th>
        @endif

        {{-- Renders all the headers --}}
        @foreach ($subheaders as $header)
        <th class="px-4 py-2" {{ is_object($header) && ! empty($header->width) ? 'width=' . $header->width . '' : '' }}>
            @if (is_string($header))
            {{ $header }}
            @else
            @if ($header->isSortable())
            <div class="flex">
                <a class="flex-1">
                    {{ $header->title }}
                </a>
            </div>
            @else
            {{ $header->title }}
            @endif
            @endif
        </th>
        @endforeach

        {{-- This is a empty cell just in case there are action rows --}}
        @if (count($actionsByRow) > 0)
        <th></th>
        @endif
    </tr>
    </thead>

    <tbody>
    @foreach ($items as $item)
    <tr class="border-gray-200 text-sm" wire:key="{{ $item->getKey() }}">
        {{-- Renders all the content cells --}}
        @foreach ($subview->row($item) as $column)
        <td class="px-4 py-2 whitespace-no-wrap">
            {!! $column !!}
        </td>
        @endforeach

        {{-- TODO
        @can('rentedunits.index')
            @if (count($actionsByRow) > 0)
            <td>
                <div class="px-3 py-1 flex justify-end">
                    <x-lv-actions :actions="$actionsByRow" :model="$item"></x-lv-actions>
                </div>
            </td>
            @endif
        @endcan
        --}}
    </tr>
    @endforeach
    </tbody>
</table>
