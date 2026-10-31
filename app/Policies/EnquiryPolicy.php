<?php

namespace App\Policies;

use App\Models\Enquiry;
use App\Models\User;

class EnquiryPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Enquiry $enquiry): bool
    {
        return $enquiry->motorcycle !== null && $user->managesBrand($enquiry->motorcycle->brand_id);
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Enquiry $enquiry): bool
    {
        return false;
    }

    public function delete(User $user, Enquiry $enquiry): bool
    {
        return $enquiry->motorcycle !== null && $user->managesBrand($enquiry->motorcycle->brand_id);
    }
}
