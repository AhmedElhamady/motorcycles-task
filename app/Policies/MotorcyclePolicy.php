<?php

namespace App\Policies;

use App\Models\Motorcycle;
use App\Models\User;

class MotorcyclePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Motorcycle $motorcycle): bool
    {
        return $user->managesBrand($motorcycle->brand_id);
    }

    public function create(User $user): bool
    {
        return $user->brandIds()->isNotEmpty();
    }

    public function update(User $user, Motorcycle $motorcycle): bool
    {
        return $user->managesBrand($motorcycle->brand_id);
    }

    public function delete(User $user, Motorcycle $motorcycle): bool
    {
        return $user->managesBrand($motorcycle->brand_id);
    }
}
