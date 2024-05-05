<?php

namespace App\Http\Livewire\Availableunits;

use App\Facades\RentingService;
use App\Http\Livewire\Actions\EditAction;
use App\Http\Livewire\Availableunits\Actions\AddToCartAction;
use App\Http\Livewire\Availableunits\Actions\RemoveFromCartAction;
use App\Http\Livewire\Availableunits\Filters\BacktypeFilter;
use App\Http\Livewire\Availableunits\Filters\DrivertechnologyFilter;
use App\Http\Livewire\Availableunits\Filters\FittypeFilter;
use App\Http\Livewire\Availableunits\Filters\ManufacturerFilter;
use App\Http\Livewire\Filters\SoftDeletedFilter;
use App\Http\Livewire\Traits\Restore;
use App\Http\Livewire\Traits\SoftDeletes;
use App\Http\Livewire\Units\UnitRestoreAction;
use App\Http\Livewire\Units\UnitSoftDeletesAction;
use App\Http\Utils;
use App\Models\Backtype;
use App\Models\Drivertechnology;
use App\Models\Fittype;
use App\Models\Headphone;
use App\Models\Manufacturer;
use App\Models\Rent;
use App\Models\Rentedunit;
use App\Models\Unit;
use LaravelViews\Facades\Header;
use LaravelViews\Views\GridView;
use WireUi\Traits\Actions;

class AvailableunitsGridView extends GridView
{
    use Actions;
    use SoftDeletes;
    use Restore;

    protected $model = Unit::class;
    public $sortBy = 'price';

    public $sortOrder = 'asc';
    public $cardComponent = 'livewire.availableunits.grid-view-item';

    public $maxCols = 3;

    public $searchBy = [
        'id',
        'headphones.name',
        'description'
    ];

    protected function filters() {
        return [
            new SoftDeletedFilter,
            new BacktypeFilter,
            new DrivertechnologyFilter,
            new FittypeFilter,
            new ManufacturerFilter
        ];
    }

    protected function unitIsAvailable($model) {
        $available = true;
        $inCart = false;

        foreach (Rentedunit::all() as $rentedunit) {
            if($rentedunit->idUnit == $model->id) {
                $rent = Rent::where('id', $rentedunit->idRent)->first();
                if($rent->dateEnd <= now()) {
                    $available = false;
                }
            }
        }

        if($available) {
            foreach (RentingService::access() as $cartItem) {
                if($cartItem == $model->id) {
                    $inCart = true;
                    $available = false;
                }
            }
        }

        return [$available, $inCart];
    }

    public function card($model) {
        $headphone = Headphone::where('id', $model->idHeadphone)->first();
        $manufacturer = Manufacturer::where('id', $headphone->idManufacturer)->first();

        $fitName = FitType::where('id', $headphone->idFittype)->first()->name;
        $backName = BackType::where('id', $headphone->idBacktype)->first()->name;
        $driverName = DriverTechnology::where('id', $headphone->idDrivertechnology)->first()->name;

        $availability = $this->unitIsAvailable($model);

        return [
            'id' => $model->id,
            'image' => $headphone->imageUrl(),
            'title' => $manufacturer->name . ' ' . $headphone->name,
            'manufacturer' =>  $manufacturer->name,
            'categories' => [
                Utils::trans('fittypes.fittypes.'.strtolower($fitName), $fitName),
                Utils::trans('backtypes.backtypes.'.strtolower($backName), $backName),
                Utils::trans('drivertechnologies.drivertechnologies.'.strtolower($driverName), $driverName) . ' ' . $headphone->driverSize,
            ],
            'description' => $model->description,
            'price' => $model->price,
            'available' => $availability[0],
            'inCart' => $availability[1],
        ];
    }

    public function row($model): array {
        $headphone = Headphone::where('id', $model->idHeadphone)->first();
        $manufacturer = Manufacturer::where('id', $headphone->idManufacturer)->first();

        return [
            $model->id,
            $manufacturer->name . ' ' . $headphone->name,
            $model->description
        ];
    }

    public function headers(): array {
        return [
            Header::title(__('units.attributes.id'))->sortBy('id'),
            Header::title(__('headphones.attributes.name'))->sortBy('idHeadphone'),
            Header::title(__('units.attributes.description'))->sortBy('description')
        ];
    }

    protected function actionsByRow()
    {
        if (request()->user()->can('units.manage')) {
            return [
                new AddToCartAction(),
                new RemoveFromCartAction(),
                new EditAction(
                    'units.edit',
                    __('units.actions.edit')
                ),
                new UnitSoftDeletesAction('units'),
                new UnitRestoreAction('units')
            ];
        } else {
            return [
                new AddToCartAction(),
                new RemoveFromCartAction()
            ];
        }
    }

    public function render()
    {
        $data = array_merge(
            $this->getRenderData(),
            [
                'view' => $this
            ]
        );

        return view("availableunits.grid-view", $data);
    }
}
