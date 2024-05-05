<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
            @if ($editMode)
            {{ __('rents.labels.edit_form_title') }}
            @else
            {{ __('rents.labels.create_form_title') }}
            @endif
        </h3>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

            <div class="">
                <label for="name">{{ __('rents.attributes.totalPrice') }}</label>
            </div>
            <div class="">
                <x-wireui-inputs.currency thousands=" " precision="2" placeholder="{{ __('translation.enter') }}" wire:model="rent.totalPrice"></x-wireui-inputs.currency>
            </div>

            <div class="">
                <label for="name">{{ __('rents.attributes.startDate') }}</label>
            </div>
            <div class="">
                <x-wireui-datetime-picker
                    placeholder="{{ __('translation.choose_date') }}"
                    wire:model.defer="rent.startDate"
                    without-time >
                </x-wireui-datetime-picker>
            </div>

            <div class="">
                <label for="name">{{ __('rents.attributes.endDate') }}</label>
            </div>
            <div class="">
                <x-wireui-datetime-picker
                    placeholder="{{ __('translation.choose_date') }}"
                    wire:model.defer="rent.endDate"
                    without-time >
                </x-wireui-datetime-picker>
            </div>

            <div class="">
                <label for="name">{{ __('rents.attributes.requestDate') }}</label>
            </div>
            <div class="">
                <x-wireui-datetime-picker
                    placeholder="{{ __('translation.choose_date') }}"
                    wire:model.defer="rent.requestDate"
                    without-time >
                </x-wireui-datetime-picker>
            </div>

            <div class="">
                <label for="name">{{ __('rents.attributes.user') }}</label>
            </div>
            <div class="">
                <x-wireui-select
                    placeholder="{{ __('translation.select') }}"
                    wire:model.defer="rent.userId"
                    :async-data="route('async.users')"
                    option-label="name"
                    option-value="id">
                </x-wireui-select>
            </div>

            <div class="">
                <label for="statusId">{{ __('rents.attributes.status') }}</label>
            </div>
            <div class="">
                <x-wireui-select
                    placeholder="{{ __('translation.select') }}"
                    wire:model.defer="rent.statusId"
                    :async-data="route('async.rentstatuses')"
                    option-label="name"
                    option-value="id">
                </x-wireui-select>
            </div>

            <div class="">
                <label for="description">{{ __('rents.attributes.description') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="rent.description"></x-wireui-input>
            </div>

            <div class="">
                <label for="name">{{ __('rents.attributes.name') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="rent.deliveryName"></x-wireui-input>
            </div>

            <div class="">
                <label for="email">{{ __('rents.attributes.email') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="rent.deliveryEmail"></x-wireui-input>
            </div>

            <div class="">
                <label for="phone">{{ __('rents.attributes.phone') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="rent.deliveryPhone"></x-wireui-input>
            </div>

            <div class="">
                <label for="address">{{ __('rents.attributes.address') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="rent.deliveryAddress"></x-wireui-input>
            </div>
        </div>

        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('rents.index') }}" secondary class="mr-2"
                             label="{{ __('translation.back') }}"></x-wireui-button>
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner></x-wireui-button>
        </div>
    </form>
</div>
