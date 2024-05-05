<div>
    <x-order-wizard.steps-bar :steps="$steps" />
    <div class="p-4">
        <div class="m-4">
            <x-wireui-card class="bg-gray-50" shadow="false">
                <div class="grid grid-cols-1 gap-2 md:grid-cols-3 md:gap-4">
                    <div class="flex items-start">
                        <div class="flex-1">
                            <h3 class="font-bold leading-6 text-gray-900">
                                {{ __('order_wizard.confirm_rent.labels.delivery') }}
                            </h3>

                            <span class="text-sm text-gray-600">
                                {{ __('order_wizard.confirm_rent.labels.delivery_name') }}:
                                {{ $delivery['name'] . ' ' . $delivery['surname'] }}
                            </span>

                            <span class="flex justify-start text-sm text-gray-600">
                                {{ __('order_wizard.confirm_rent.labels.delivery_address') }}:
                                {{ $delivery['city'] . ' ' . $delivery['postal_code'] }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <div class="flex-1">
                            <h3 class="font-bold leading-6 text-gray-900">
                                {{ __('order_wizard.confirm_rent.labels.total_cost') }}
                            </h3>
                            <span class="flex justify-start text-sm text-gray-600">
                                {{ __('order_wizard.confirm_rent.labels.total_cost') }}:
                                {{ number_format($totalCost, 2) }} zł
                            </span>
                        </div>
                    </div>

                    <div>
                        <div class="flex-1">
                            <h3 class="font-bold leading-6 text-gray-900">
                                {{ __('order_wizard.confirm_rent.labels.rent_duration') }}
                            </h3>
                            <span class="flex justify-start text-sm text-gray-600">
                                {{ __('order_wizard.confirm_rent.labels.startdate') }}:
                                {{ $startdate }}
                            </span>
                            <span class="flex justify-start text-sm text-gray-600">
                                {{ __('order_wizard.confirm_rent.labels.enddate') }}:
                                {{ $enddate }}
                            </span>
                            @php
                                $datenow = new DateTime($startdate);
                                $dateend = new DateTime($enddate);
                                $interval = $datenow->diff($dateend);
                            @endphp
                            <span class="flex justify-start text-sm text-gray-600">
                                {{ __('order_wizard.confirm_rent.labels.duration') }}:
                                {{ $interval->days . ' ' . __('order_wizard.confirm_rent.labels.days') }}
                            </span>
                        </div>
                    </div>

                </div>
            </x-wireui-card>
        </div>

        <div class="m-4">
            <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">{{ __('order_wizard.confirm_rent.columns.image') }}</span>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            {{ __('order_wizard.confirm_rent.columns.product') }}
                        </th>

                        <th scope="col" class="px-6 py-3">
                            {{ __('order_wizard.confirm_rent.columns.unit_price') }}
                        </th>

                        <th scope="col" class="px-6 py-3">
                            {{ __('order_wizard.confirm_rent.columns.cost') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $datenow = new DateTime($startdate);
                        $dateend = new DateTime($enddate);
                        $interval = $datenow->diff($dateend);
                        $interval = ($interval->days / 7.0);
                    @endphp
                    @foreach ($this->items as $id => $ourItem)
                        @php
                            $headphone = App\Models\Headphone::where('id', $ourItem->idHeadphone)->first();
                            $manufacturer = App\Models\Manufacturer::where('id', $headphone->idManufacturer)->first();
                            $value = $interval * $ourItem->price;
                        @endphp
                        <tr
                            class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                            <td class="w-32 p-4">
                                <img src="{{ $headphone->imageUrl() }}" alt="Zdjęcie">
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $manufacturer->name . ' ' . $headphone->name }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ number_format($ourItem->price, 2) }} zł {{ __('order_wizard.renting.price') }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ number_format($value, 2) }} zł
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="m-4 flex justify-between">
            <x-wireui-button wire:click="previousStep" icon="chevron-double-left"
                label="{{ __('order_wizard.delivery.title') }}" secondary spinner></x-wireui-button>

            <x-wireui-button wire:click="submit" right-icon="chevron-double-right"
                label="{{ __('order_wizard.confirm_rent.labels.confirm_rent') }}" primary spinner></x-wireui-button>
        </div>
    </div>
</div>
