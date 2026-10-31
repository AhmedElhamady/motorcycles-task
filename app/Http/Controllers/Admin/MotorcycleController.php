<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Motorcycle\StoreMotorcycleRequest;
use App\Http\Requests\Admin\Motorcycle\UpdateMotorcycleRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Motorcycle;

class MotorcycleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Motorcycle::class);

        $motorcycles = Motorcycle::visibleTo(auth()->user())
            ->with(['brand', 'category'])
            ->latest()
            ->get();

        return view('admin.motorcycles.index', compact('motorcycles'));
    }

    public function create()
    {
        $this->authorize('create', Motorcycle::class);

        $brands = Brand::visibleTo(auth()->user())->orderBy('id')->get();
        $categories = Category::orderBy('id')->get();

        return view('admin.motorcycles.create', compact('brands', 'categories'));
    }

    public function store(StoreMotorcycleRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = Helper::storeImage($request->file('image'), 'motorcycles');
        }

        Motorcycle::create($data);

        return redirect()->route('motorcycles.index')->with('success', 'Motorcycle created successfully.');
    }

    public function edit(Motorcycle $motorcycle)
    {
        $this->authorize('update', $motorcycle);

        $brands = Brand::visibleTo(auth()->user())->orderBy('id')->get();
        $categories = Category::orderBy('id')->get();

        return view('admin.motorcycles.edit', compact('motorcycle', 'brands', 'categories'));
    }

    public function update(UpdateMotorcycleRequest $request, Motorcycle $motorcycle)
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = Helper::updateImage($request->file('image'), $motorcycle->image, 'motorcycles');
        }

        $motorcycle->update($data);

        return redirect()->route('motorcycles.index')->with('success', 'Motorcycle updated successfully.');
    }

    public function destroy(Motorcycle $motorcycle)
    {
        $this->authorize('delete', $motorcycle);

        if ($motorcycle->image) {
            Helper::deleteImage($motorcycle->image);
        }

        $motorcycle->delete();

        return back()->with('success', 'Motorcycle deleted successfully.');
    }
}
