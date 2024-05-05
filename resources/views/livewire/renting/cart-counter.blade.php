<span>
    <a type="button" href="{{ route('renting.index') }}"
        class="relative inline-flex items-center rounded-lg bg-white p-3 text-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none focus:outline-none">

        <x-wireui-icon name="shopping-cart" class="h-5 w-5"></x-wireui-icon>
        @if ($count > 0)
            <div class="absolute -right-2 -top-1 inline-flex h-6 w-6 items-center justify-center rounded-full border-2 border-white bg-blue-500 text-xs font-bold text-white dark:border-gray-900">
                {{ $count }}
            </div>
        @endif
    </a>
</span>
