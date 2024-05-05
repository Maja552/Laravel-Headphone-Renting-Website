<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
            @if ($editMode)
            {{ __('backtypes.labels.edit_form_title') }}
            @else
            {{ __('backtypes.labels.create_form_title') }}
            @endif
        </h3>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('backtypes.attributes.name') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model="backtype.name"></x-wireui-input>
            </div>
        </div>

        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('backtypes.index') }}" secondary class="mr-2"
                             label="{{ __('translation.back') }}"></x-wireui-button>
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner></x-wireui-button>
        </div>
    </form>
</div>
