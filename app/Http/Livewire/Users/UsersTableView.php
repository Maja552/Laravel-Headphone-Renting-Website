<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Users\Filters\RoleFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Users\Filters\EmailVerifiedFilter;
use App\Http\Livewire\Users\Actions\AssignAdminRoleAction;
use App\Http\Livewire\Users\Actions\RemoveAdminRoleAction;
use App\Http\Livewire\Users\Actions\AssignWorkerRoleAction;
use App\Http\Livewire\Users\Actions\RemoveWorkerRoleAction;

class UsersTableView extends TableView
{
    protected $paginate = 10;

    public $searchBy = [
        'name',
        'email',
        'roles.name',
        'email_verified_at',
        'created_at'
    ];

    public function repository(): Builder {
        return User::query()->with('roles');
    }

    public function headers(): array {
        return [
            Header::title(__('users.attributes.name'))->sortBy('name'),
            Header::title(__('users.attributes.email'))->sortBy('email'),
            __('users.attributes.roles'),
            Header::title(__('users.attributes.email_verified_at'))->sortBy('email_verified_at'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at')
        ];
    }

    public function row($model): array {
        return [
            $model->name,
            $model->email,
            $model->roles->implode('name', ','),
            $model->email_verified_at,
            $model->created_at
        ];
    }

    protected function filters() {
        return [
            new RoleFilter,
            new EmailVerifiedFilter
        ];
    }

    /** Actions by item */
    protected function actionsByRow() {
        return [
            new AssignAdminRoleAction,
            new RemoveAdminRoleAction,
            new AssignWorkerRoleAction,
            new RemoveWorkerRoleAction
        ];
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
