<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Enquiry;
use App\Models\Motorcycle;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $brandsCount = Brand::visibleTo($user)->count();
        $motorcyclesCount = Motorcycle::visibleTo($user)->count();
        $enquiriesCount = Enquiry::visibleTo($user)->count();
        $activeMotorcyclesCount = Motorcycle::visibleTo($user)->active()->count();

        return view('admin.dashboard', compact(
            'brandsCount',
            'motorcyclesCount',
            'enquiriesCount',
            'activeMotorcyclesCount'
        ));
    }
}
