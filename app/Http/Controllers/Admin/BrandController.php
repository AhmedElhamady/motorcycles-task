<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreBrandRequest;
use App\Http\Requests\Admin\Brand\UpdateBrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Brand::class);

        $brands = Brand::visibleTo(auth()->user())
            ->with('users')
            ->latest()
            ->get();

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        $this->authorize('create', Brand::class);

        return view('admin.brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            $data['logo'] = Helper::storeImage($request->file('logo'), 'brands');
        }

        Brand::create($data);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        $this->authorize('update', $brand);

        return view('admin.brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            $data['logo'] = Helper::updateImage($request->file('logo'), $brand->logo, 'brands');
        }

        $brand->update($data);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        $this->authorize('delete', $brand);

        if ($brand->motorcycles()->exists()) {
            return back()->with('error', 'This brand has motorcycles and cannot be deleted.');
        }

        if ($brand->logo) {
            Helper::deleteImage($brand->logo);
        }

        $brand->delete();

        return back()->with('success', 'Brand deleted successfully.');
    }
}
