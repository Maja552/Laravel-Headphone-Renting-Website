@props([
'id' => '',
'image' => '',
'title' => '',
'manufacturer' => '',
'description' => '',
'withBackground' => false,
'model',
'actions' => [],
'hasDefaultAction' => false,
'selected' => false,
'available' => false,
'inCart' => false
])

<div class="shadow-md p-4 shadow-2xl shadow-xl bg-clip-padding backdrop-filter backdrop-blur-sm">
  @if ($hasDefaultAction)
  <a href="#!" wire:click.prevent="onCardClick({{ $model->id }})">
    <img style="object-fit: contain;" src="{{ $image }}" alt="{{ $image }}" class="bg-white hover:shadow-lg cursor-pointer rounded-md h-48 w-full object-cover {{ $withBackground ? 'rounded-b-none' : '' }} {{ $selected ? variants('gridView.selected') : "" }}">
  </a>
  @else
  <img style="object-fit: contain;" src="{{ $image }}" alt="{{ $image }}" class="bg-white rounded-md h-48 w-full object-cover {{ $withBackground ? 'rounded-b-none' : '' }}  {{ $selected ? variants('gridView.selected') : "" }}">
  @endif

  <div class="pt-4 {{ $withBackground ? 'bg-white rounded-b-md p-4' : '' }}">
    <div class="flex items-start">
      <div class="flex-1">
        <h3 class="font-bold leading-6 text-lg text-gray-900 {{ $model->deleted_at ? 'line-through' : ''}}">
          @if ($hasDefaultAction)
          <a href="#!" class="hover:underline" wire:click.prevent="onCardClick({{ $model->getKey() }})">
            {!! $title !!}
          </a>
          @else
          {!! $title !!}
          @endif
        </h3>
        @if ($manufacturer)
        <span class="text-base text-gray-800">
          {{ __('availableunits.attributes.manufacturer') }}: {!! $manufacturer !!}
        </span>
        @endif
        @if ($price)
        <span class="text-base text-gray-800 flex justify-start">
            <b>{{ __('availableunits.attributes.price') }}: {!! $price !!} zł za tydzień</b>
        </span>
        @endif
          <br>
        @if ($categories)
        <span class="text-sm text-gray-800 flex justify-end">
          @foreach ($categories as $category)
          <span class="bg-gray-100 text-gray-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ $category }}</span>
          @endforeach
        </span>
        @endif
      </div>

        <?php
            $newactions = [];

            if(count($actions) > 3) {
                $newactions = [
                    $actions[2],
                    $actions[3]
                ];
            }
        ?>

        @if (count($newactions) > 1)
            <x-slot name="trigger">
                <x-lv-icon-button icon="more-horizontal" size="sm"></x-lv-icon-button>
            </x-slot>
            <div class="flex justify-end items-center">
                <x-lv-actions.drop-down :actions="$newactions" :model="$model"></x-lv-actions.drop-down>
            </div>
        @endif
    </div>

    @if (isset($description))
    <p class="line-clamp-3 mt-2">
      {!! $description !!}
    </p>
    @endif
    <br>
      <?php
        $action = $actions[0];
        $actionAddMethod = $model ? "executeAction('{$action->id}','{$model->getKey()}')" : "executeBulkAction('{$action->id}')";

        $action2 = $actions[1];
        $actionRemoveMethod = $model ? "executeAction('{$action2->id}','{$model->getKey()}')" : "executeBulkAction('{$action2->id}')";
      ?>

      @if ($available && $actions[0]->renderIf($model, $this))
            <x-wireui-button
                squared
                color="orange"
                primary
                label="{{ __('availableunits.actions.add_to_cart') }}"
                wire:click.prevent="{{ $actionAddMethod }}"
                class="justify-self-end">
            </x-wireui-button>
      @endif

      @if ($inCart && $actions[1]->renderIf($model, $this))
          <x-wireui-button
              squared
              color="red"
              primary
              label="{{ __('availableunits.actions.remove_from_cart') }}"
              wire:click.prevent="{{ $actionRemoveMethod }}"
              class="justify-self-end">
          </x-wireui-button>
      @endif

      @if(!$available && !$inCart)
          <x-wireui-button
              squared
              color="red"
              disabled
              primary
              label="{{ __('availableunits.actions.not_available') }}"
              class="justify-self-end">
          </x-wireui-button>
      @endif
  </div>
</div>
