<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Actions\EditAction;
use App\Http\Livewire\Actions\RestoreAction;
use App\Http\Livewire\Actions\SoftDeletesAction;
use App\Http\Livewire\Traits\Restore;
use App\Http\Livewire\Traits\SoftDeletes;
use App\Http\Utils;
use WireUi\Traits\Actions;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView as LaravelViewsTableView;
use App\Http\Livewire\Filters\SoftDeletedFilter;
use Illuminate\Database\Eloquent\Builder;

abstract class TableView extends LaravelViewsTableView
{
    use Actions;
    use SoftDeletes;
    use Restore;

    public string $tableName;
    public string $tableNamePlural;
    public string $className;

    public $searchBy = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function headers(): array {
        return [
            Header::title(__('translation.attributes.id'))->sortBy('id'),
            Header::title(__($this->tableNamePlural.'.attributes.name'))->sortBy('name'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at')
        ];
    }

    public function row($model): array {
        return [
            $model->id,
            Utils::trans($this->tableNamePlural.'.'.$this->tableNamePlural.'.'.strtolower($model->name), $model->name),
            $model->created_at,
            $model->updated_at,
            $model->deleted_at
        ];
    }

    protected function filters() {
        return [
            new SoftDeletedFilter
        ];
    }

    protected function actionsByRow() {
        return [
            new EditAction(
                $this->tableNamePlural.'.edit',
                __($this->tableNamePlural.'.actions.edit')
            ),
            new SoftDeletesAction($this->tableNamePlural),
            new RestoreAction($this->tableNamePlural)
        ];
    }

    public function repository(): Builder {
        return call_user_func('App\Models\\'.$this->className.'::query')->withTrashed();
    }

    public function softDeletes(int $id) {
        $result = call_user_func('App\Models\\'.$this->className.'::find', $id);
        $result->delete();
        $this->notification()->success(
            $title = __('translation.messages.successes.destroyed_title'),
            $description = __($this->tableNamePlural.'.messages.successes.destroyed', [
                'name' => $result->name
            ])
        );
    }

    public function restore(int $id) {
        $result = call_user_func('App\Models\\'.$this->className.'::withTrashed')->find($id);
        $result->restore();
        $this->notification()->success(
            $title = __('translation.messages.successes.restored_title'),
            $description = __($this->tableNamePlural.'.messages.successes.restored', [
                'name' => $result->name
            ])
        );
    }

    public function render()
    {
        $data = array_merge(
            $this->getRenderData(),
            [
                'view' => $this
            ]
        );

        return view("_overrides.table-view", $data);
    }
}

