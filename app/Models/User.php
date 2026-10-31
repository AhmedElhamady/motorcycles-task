<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => Role::class,
            'is_active' => 'boolean',
        ];
    }

    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'user_brand');
    }

    public function isAdmin(): bool
    {
        return $this->role === Role::Admin;
    }

    public function isDataEntry(): bool
    {
        return $this->role === Role::DataEntry;
    }

    public function brandIds(): Collection
    {
        return  $this->brands()->pluck('brands.id');
    }

    public function managesBrand(int $brandId): bool
    {
        return $this->brandIds()->contains($brandId);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
