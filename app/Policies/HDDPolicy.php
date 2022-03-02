<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HDDPolicy
{
    use HandlesAuthorization;

    public function viewAny() {
        return true;
    }

    public function store() {
        return true;
    }

    public function update() {
        return true;
    }

    public function destroy() {
        return true;
    }
}
