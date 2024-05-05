<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
            @if ($editMode)
            {{ __('units.labels.edit_form_title') }}
            @else
            {{ __('units.labels.create_form_title') }}
            @endif
        </h3>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

            <div class=""> <label for="idHeadphone">{{ __('units.attributes.headphone') }}</label> </div>
            <div class="">
                <x-wireui-select
                    placeholder="{{ __('translation.select') }}"
                    wire:model.defer="unit.idHeadphone"
                    :options='App\Http\Utils::queryHeadphoneNames("Headphone", "headphones")'
                    option-label="name"
                    option-value="id">
                </x-wireui-select>
            </div>

            <div class="">
                <label for="name">{{ __('units.attributes.owner') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="unit.owner"></x-wireui-input>
            </div>

            <div class="">
                <label for="price">{{ __('units.attributes.price') }}</label>
            </div>
            <div class="">
                <x-wireui-inputs.currency placeholder="{{ __('translation.enter') }}" wire:model="unit.price"></x-wireui-inputs.currency>
            </div>

            <div class="">
                <label for="description">{{ __('units.attributes.description') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="unit.description"></x-wireui-input>
            </div>

        </div>

        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('units.index') }}" secondary class="mr-2"
                             label="{{ __('translation.back') }}"></x-wireui-button>
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner></x-wireui-button>
        </div>
    </form>
</div>
