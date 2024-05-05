<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
            @if ($editMode)
            {{ __('headphones.labels.edit_form_title') }}
            @else
            {{ __('headphones.labels.create_form_title') }}
            @endif
        </h3>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class=""> <label for="name">{{ __('headphones.attributes.name') }}</label> </div>
            <div class=""> <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="headphone.name"></x-wireui-input> </div>

            <div class=""> <label for="idManufacturer">{{ __('headphones.attributes.idManufacturer') }}</label> </div>
            <div class="">
                <x-wireui-select
                    placeholder="{{ __('translation.select') }}"
                    wire:model.defer="headphone.idManufacturer"
                    :async-data="route('async.manufacturers')"
                    option-label="name"
                    option-value="id">
                </x-wireui-select>
            </div>

            <div class=""> <label for="idDrivertechnology">{{ __('headphones.attributes.idDrivertechnology') }}</label> </div>
            <div class="">
                <x-wireui-select
                    placeholder="{{ __('translation.select') }}"
                    wire:model.defer="headphone.idDrivertechnology"
                    :async-data="route('async.drivertechnologies')"
                    option-label="name"
                    option-value="id">
                </x-wireui-select>
            </div>

            <div class=""> <label for="idFittype">{{ __('headphones.attributes.idFittype') }}</label> </div>
            <div class="">
                <x-wireui-select
                    placeholder="{{ __('translation.select') }}"
                    wire:model.defer="headphone.idFittype"
                    :async-data="route('async.fittypes')"
                    option-label="name"
                    option-value="id">
                </x-wireui-select>
            </div>

            <div class=""> <label for="idBacktype">{{ __('headphones.attributes.idBacktype') }}</label> </div>
            <div class="">
                <x-wireui-select
                    placeholder="{{ __('translation.select') }}"
                    wire:model.defer="headphone.idBacktype"
                    :async-data="route('async.backtypes')"
                    option-label="name"
                    option-value="id">
                </x-wireui-select>
            </div>


            <div class=""> <label for="releaseYear">{{ __('headphones.attributes.releaseYear') }}</label> </div>
            <div class=""> <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="headphone.releaseYear"></x-wireui-input> </div>

            <div class=""> <label for="weight">{{ __('headphones.attributes.weight') }}</label> </div>
            <div class=""> <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="headphone.weight"></x-wireui-input> </div>

            <div class=""> <label for="impedance">{{ __('headphones.attributes.impedance') }}</label> </div>
            <div class=""> <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="headphone.impedance"></x-wireui-input> </div>

            <div class=""> <label for="sensitivity">{{ __('headphones.attributes.sensitivity') }}</label> </div>
            <div class=""> <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="headphone.sensitivity"></x-wireui-input> </div>

            <div class=""> <label for="sensitivityUnit">{{ __('headphones.attributes.sensitivityUnit') }}</label> </div>
            <div class=""> <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="headphone.sensitivityUnit"></x-wireui-input> </div>

            <div class=""> <label for="driverSize">{{ __('headphones.attributes.driverSize') }}</label> </div>
            <div class=""> <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="headphone.driverSize"></x-wireui-input> </div>

            <div class="">
                <label for="image">{{ __('headphones.attributes.image') }}</label>
            </div>
            <div class="">
                @if ($imageExists)
                    <div class="relative">
                        <img class="w-full" src="{{ $imageUrl }}" alt="{{ $headphone->name }}">
                        <div class="absolute right-2 top-2 h-16">
                            <x-wireui-button.circle outline xs secondary icon="trash"
                                                    wire:click="confirmDeleteImage"></x-wireui-button.circle>
                        </div>
                    </div>
                @else
                    <x-wireui-input type="file" wire:model="image"></x-wireui-input>
                @endif
            </div>
        </div>

        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('headphones.index') }}" secondary class="mr-2"
                             label="{{ __('translation.back') }}"></x-wireui-button>
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner></x-wireui-button>
        </div>
    </form>
</div>
