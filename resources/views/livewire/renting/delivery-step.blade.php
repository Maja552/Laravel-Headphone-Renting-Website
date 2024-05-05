<div>
    <x-order-wizard.steps-bar :steps="$steps"></x-order-wizard.steps-bar>
    <div class="p-4">
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">

            <div class="">
                <label for="name">{{ __('order_wizard.delivery.attributes.name') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('order_wizard.delivery.attributes.enter_name') }}" wire:model="name"></x-wireui-input>
            </div>

            <div class="">
                <label for="surname">{{ __('order_wizard.delivery.attributes.surname') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('order_wizard.delivery.attributes.enter_surname') }}" wire:model="surname"></x-wireui-input>
            </div>

            <div class="">
                <label for="email">{{ __('order_wizard.delivery.attributes.email') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('order_wizard.delivery.attributes.enter_email') }}" wire:model="email"></x-wireui-input>
            </div>

            <div class="">
                <label for="phone">{{ __('order_wizard.delivery.attributes.phone') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('order_wizard.delivery.attributes.enter_phone') }}" wire:model="phone"></x-wireui-input>
            </div>

            <div class="">
                <label for="street">{{ __('order_wizard.delivery.attributes.street') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('order_wizard.delivery.attributes.enter_street') }}" wire:model="street"></x-wireui-input>
            </div>

            <div class="">
                <label for="house_number">{{ __('order_wizard.delivery.attributes.house_number') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('order_wizard.delivery.attributes.enter_house_number') }}" wire:model="house_number"></x-wireui-input>
            </div>

            <div class="">
                <label for="apartment_number">{{ __('order_wizard.delivery.attributes.apartment_number') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('order_wizard.delivery.attributes.enter_apartment_number') }}" wire:model="apartment_number"></x-wireui-input>
            </div>

            <div class="">
                <label for="city">{{ __('order_wizard.delivery.attributes.city') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('order_wizard.delivery.attributes.enter_city') }}" wire:model="city"></x-wireui-input>
            </div>

            <div class="">
                <label for="postal_code">{{ __('order_wizard.delivery.attributes.postal_code') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('order_wizard.delivery.attributes.enter_postal_code') }}" wire:model="postal_code"></x-wireui-input>
            </div>

        </div>
        <div class="m-4 flex justify-between">
            <x-wireui-button wire:click="previousStep" icon="chevron-double-left"
                label="{{ __('order_wizard.information.title') }}" secondary spinner></x-wireui-button>

            <x-wireui-button wire:click="submit" right-icon="chevron-double-right"
                label="{{ __('order_wizard.confirm_rent.title') }}" primary spinner></x-wireui-button>
        </div>
    </div>
</div>
