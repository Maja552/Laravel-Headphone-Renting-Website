<?php

namespace App\Http\Livewire\Backtypes;

use App\Http\Livewire\TableView;

class BacktypesTableView extends TableView
{
    public string $tableName = 'backtype';
    public string $tableNamePlural = 'backtypes';
    public string $className = 'Backtype';
}
