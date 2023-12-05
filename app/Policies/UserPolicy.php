<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->email === 'dralnegar@gmail.com';
    }

    public function edit(User $authUser, User $userToEdit)
    {
        return $authUser->email === 'dralnegar@gmail.com';
    }

    public function delete(User $authUser, User $userToDelete)
    {
        return $authUser->email === 'dralnegar@gmail.com' && $authUser->email != $userToDelete->email;
    }

}
    
