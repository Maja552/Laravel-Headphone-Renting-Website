<div class="md:col-span-1 flex justify-between bg-white p-4 shadow-2xl bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-90">
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
