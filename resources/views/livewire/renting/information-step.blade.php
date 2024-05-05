<div>
    <x-order-wizard.steps-bar :steps="$steps"></x-order-wizard.steps-bar>

    @if(count($this->tabitems) > 0)
        <div class="p-8">
            <hr class="my-2">

            <div class="p-2">
                <label for="name">{{ __('order_wizard.renting.renting_startdate') }}</label>
            </div>
            <div style="width:400px">
                <x-wireui-datetime-picker
                    without-time
                    without-tips
                    :min="now()->addDays(2)"
                    :max="now()->addDays(7)"
                    placeholder="{{ __('order_wizard.renting.input_startdate') }}"
                    wire:model="startdate"
                ></x-wireui-datetime-picker>
            </div>

            <br>

            <div class="p-2">
                <label for="name">{{ __('order_wizard.renting.renting_enddate') }}</label>
            </div>
            <div style="width:400px">
                <x-wireui-datetime-picker
                    without-time
                    without-tips
                    :min="now()->addDays(7)"
                    :max="now()->addDays(120)"
                    placeholder="{{ __('order_wizard.renting.input_enddate') }}"
                    wire:model="enddate"
                ></x-wireui-datetime-picker>
            </div>
        </div>
        <br>

        <div class="">
            <div class="p-4">
                <table class="w-full text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-50 text-sm uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">{{ __('order_wizard.renting.columns.image') }}</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('order_wizard.renting.columns.name') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('order_wizard.renting.columns.unit_price') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($this->tabitems as $item)
                        <?php
                            $ourItem = \App\Models\Unit::where('id', $item)->first();
                            $headphone = \App\Models\Headphone::where('id', $ourItem->idHeadphone)->first();
                            $manufacturer = \App\Models\Manufacturer::where('id', $headphone->idManufacturer)->first();
                        ?>
                        <tr class="text-lg border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                            <td class="p-4">
                                <img src="{{ $headphone->imageUrl() }}" alt="NAME" class="h-[200px]" style="object-fit: contain; width: 128px;">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $manufacturer->name . ' ' . $headphone->name }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $ourItem->price }} zł {{ __('order_wizard.renting.price') }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $ourItem->duration }}
                            </td>
                            <td class="px-6 py-4">
                                <x-wireui-button.circle outline xs secondary icon="trash"
                                                        wire:click="remove({{ $item }})"></x-wireui-button.circle>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="m-4 flex justify-between">
                    <x-wireui-button squared wire:click="cancel" right-icon="chevron-double-right"
                                     label="{{ __('order_wizard.renting.cancel_button') }}" primary spinner></x-wireui-button>

                    <x-wireui-button squared orange wire:click="submit" right-icon="chevron-double-right"
                                     label="{{ __('order_wizard.renting.rent_button') }}" primary spinner></x-wireui-button>
                </div>
            </div>
        </div>
    @else
        <h2 class="p-8 text-center">{{ __('order_wizard.renting.labels.empty') }}</h2>
    @endif
</div>
