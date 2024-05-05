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
                <label for="name">{{ __('rentextensions.attributes.requestDate') }}</label>
            </div>
            <div class="">
                <x-wireui-datetime-picker
                    placeholder="{{ __('translation.choose_date') }}"
                    wire:model.defer="rentextension.requestDate"
                    without-time >
                </x-wireui-datetime-picker>
            </div>

            <div class="">
                <label for="name">{{ __('rentextensions.attributes.oldEndDate') }}</label>
            </div>
            <div class="">
                <x-wireui-datetime-picker
                    placeholder="{{ __('translation.choose_date') }}"
                    wire:model.defer="rentextension.oldEndDate"
                    without-time >
                </x-wireui-datetime-picker>
            </div>

            <div class="">
                <label for="name">{{ __('rentextensions.attributes.newEndDate') }}</label>
            </div>
            <div class="">
                <x-wireui-datetime-picker
                    placeholder="{{ __('translation.choose_date') }}"
                    wire:model.defer="rentextension.newEndDate"
                    without-time >
                </x-wireui-datetime-picker>
            </div>

            <div class=""> <label for="idRent">{{ __('rentextensions.attributes.rent') }}</label> </div>
            <div class="">
                <x-wireui-select
                    placeholder="{{ __('translation.select') }}"
                    wire:model.defer="rentextension.idRent"
                    :async-data="route('async.rents')"
                    option-label="name"
                    option-value="id">
                </x-wireui-select>
            </div>

            <div class="">
                <label for="price">{{ __('rentextensions.attributes.price') }}</label>
            </div>
            <div class="">
                <x-wireui-inputs.currency thousands=" " precision="2" placeholder="{{ __('translation.enter') }}" wire:model="rentextension.price"></x-wireui-inputs.currency>
            </div>

            <div class="">
                <label for="description">{{ __('rentextensions.attributes.description') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="rentextension.description"></x-wireui-input>
            </div>

        </div>

        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('rentextensions.index') }}" secondary class="mr-2"
                             label="{{ __('translation.back') }}"></x-wireui-button>
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner></x-wireui-button>
        </div>
    </form>
</div>
