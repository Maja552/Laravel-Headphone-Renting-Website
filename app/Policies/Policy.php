<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;

abstract class Policy
{
    use HandlesAuthorization;

    public string $tableNamePlural = '';

    public function viewAny(User $user) {
        return $user->can($this->tableNamePlural.'.index');
    }

    public function create(User $user) {
        return $user->can($this->tableNamePlural.'.manage');
    }

    public function update(User $user, Model $modelInstance) {
        return $modelInstance->deleted_at === null && $user->can($this->tableNamePlural.'.manage');
    }

    public function delete(User $user, Model $modelInstance) {
        return $modelInstance->deleted_at === null && $user->can($this->tableNamePlural.'.manage');
    }

    public function restore(User $user, Model $modelInstance)  {
        return $modelInstance->deleted_at !== null && $user->can($this->tableNamePlural.'.manage');
    }
}
