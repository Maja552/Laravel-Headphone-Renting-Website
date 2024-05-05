<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
            @if ($editMode)
            {{ __('rentedunits.labels.edit_form_title') }}
            @else
            {{ __('rentedunits.labels.create_form_title') }}
            @endif
        </h3>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="price">{{ __('rentedunits.attributes.price') }}</label>
            </div>
            <div class="">
                <x-wireui-inputs.currency thousands=" " precision="2" placeholder="{{ __('translation.enter') }}" wire:model="rentedunit.price"></x-wireui-inputs.currency>
            </div>

            <div class=""> <label for="idRent">{{ __('rentedunits.attributes.rent') }}</label> </div>
            <div class="">
                <x-wireui-select
                    placeholder="{{ __('translation.select') }}"
                    wire:model.defer="rentedunit.idRent"
                    :options='$this->queryNames()'
                    option-label="name"
                    option-value="id">
                </x-wireui-select>
            </div>

            <div class=""> <label for="idUnit">{{ __('rentedunits.attributes.headphone') }}</label> </div>
            <div class="">
                <x-wireui-select
                    placeholder="{{ __('translation.select') }}"
                    wire:model.defer="rentedunit.idUnit"
                    :options='App\Http\Utils::queryHeadphoneNames("Headphone", "headphones")'
                    option-label="name"
                    option-value="id">
                </x-wireui-select>
            </div>

        </div>

        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('rentedunits.index') }}" secondary class="mr-2"
                             label="{{ __('translation.back') }}"></x-wireui-button>
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner></x-wireui-button>
        </div>
    </form>
</div>
