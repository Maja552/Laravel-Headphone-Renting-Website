<?php

namespace App\Http\Livewire\Rentstatuses;

use App\Http\Livewire\TableView;

class RentstatusesTableView extends TableView
{
    public string $tableName = 'rentstatus';
    public string $tableNamePlural = 'rentstatuses';
    public string $className = 'Rentstatus';
}
