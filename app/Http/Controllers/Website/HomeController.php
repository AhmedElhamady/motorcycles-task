<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Motorcycle;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $services = Service::latest()->get();
        $brands = Brand::active()->latest()->get();
        $featuredMotos = Motorcycle::active()
            ->withCount('enquiries')
            ->orderByDesc('enquiries_count')
            ->latest()
            ->limit(12)
            ->get();

        $motos = Motorcycle::get(['id', 'name']);

        return view('website.home', compact(
            'categories',
            'services',
            'brands',
            'featuredMotos',
            'motos',
        ));
    }
}
