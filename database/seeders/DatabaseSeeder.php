<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Motorcycle;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@moto.test'],
            [
                'name' => 'Admin',
                'password' => 'password',
                'role' => Role::Admin,
                'is_active' => true,
            ]
        );

        $dataEntry = User::updateOrCreate(
            ['email' => 'entry@moto.test'],
            [
                'name' => 'Data Entry',
                'password' => 'password',
                'role' => Role::DataEntry,
                'is_active' => true,
            ]
        );

        if (Brand::exists()) {
            return;
        }

        $brands = Brand::factory()->count(10)->create();
        $categories = Category::factory()->count(4)->create();

        Service::factory()->count(5)->create();

        $dataEntry->brands()->sync($brands->take(2)->pluck('id'));

        foreach ($brands as $brand) {
            Motorcycle::factory()
                ->count(3)
                ->create([
                    'brand_id' => $brand->id,
                    'category_id' => $categories->random()->id,
                ]);
        }

        $motorcycles = Motorcycle::all();

        foreach ($motorcycles as $motorcycle) {
            Enquiry::factory()->count(2)->create([
                'motorcycle_id' => $motorcycle->id,
            ]);
        }
    }
}
