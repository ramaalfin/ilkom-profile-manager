<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $user, User $model){
        return in_array($user->email, ['admin@gmail.com', $model->email]);
    }

    public function delete(User $user, User $model){
        return in_array($user->email, ['admin@gmail.com', $model->email]);
    }
}
