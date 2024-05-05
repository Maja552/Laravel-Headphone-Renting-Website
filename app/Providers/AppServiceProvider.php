<?php

namespace App\Providers;

use App\Http\Livewire\Renting\Steps\ConfirmRentStep;
use App\Http\Livewire\Renting\Steps\DeliveryStep;
use App\Http\Livewire\Renting\Steps\InformationStep;
use App\View\Components\Dropdownmenu;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('package-dropdownmenu', Dropdownmenu::class);

        // Logowanie wszystkich zapytań do bazy
        if (config('app.log_db_query')) {
            DB::listen(function ($query) {
                Log::info(
                    $query->sql,
                    $query->bindings,
                    $query->time
                );
            });
        }

        Livewire::component('information-step', InformationStep::class);
        Livewire::component('delivery-step', DeliveryStep::class);
        Livewire::component('confirm-order-step', ConfirmRentStep::class);
    }
}
