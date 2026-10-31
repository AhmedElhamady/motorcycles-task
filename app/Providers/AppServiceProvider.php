<?php

namespace App\Providers;

use App\Enums\Role;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Gate::before(function (User $user) {
            return $user->isAdmin() ? true : null;
        });

        $abilities = [];

        foreach (Role::cases() as $role) {
            foreach ($role->abilities() as $ability) {
                $abilities[$ability][] = $role;
            }
        }

        foreach ($abilities as $ability => $roles) {
            Gate::define($ability, function (User $user) use ($roles) {
                return in_array($user->role, $roles, true);
            });
        }

        View::share('Brands', Cache::remember('footer_brands', now()->addHours(1), function () {
            return Brand::limit(6)->get();
        }));
    }
}
