<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasSlug, HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];

    public array $translatable = ['name', 'description'];
}
