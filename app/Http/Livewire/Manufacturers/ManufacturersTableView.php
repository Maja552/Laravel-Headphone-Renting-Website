<?php

namespace App\Http\Livewire\Manufacturers;

use App\Http\Livewire\TableView;

class ManufacturersTableView extends TableView
{
    public string $tableName = 'manufacturer';
    public string $tableNamePlural = 'manufacturers';
    public string $className = 'Manufacturer';
}
