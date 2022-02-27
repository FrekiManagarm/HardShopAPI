<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny() {
        return true;
    }

    public function view() {
        return true;
    }

    public function index(User $user) {
        return true;
    }

    public function store(User $user) {
        return $user === null ?
        $user->is_Admin === true
        : true;
    }

    public function update(User $user) {
        
    }
}
