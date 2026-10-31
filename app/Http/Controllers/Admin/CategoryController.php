<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('manage-categories');

        $categories = Category::withCount('motorcycles')->latest()->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('manage-categories');

        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = Helper::storeImage($request->file('image'), 'categories');
        }

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $this->authorize('manage-categories');

        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = Helper::updateImage($request->file('image'), $category->image, 'categories');
        }

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $this->authorize('manage-categories');

        if ($category->motorcycles()->exists()) {
            return back()->with('error', 'This category has motorcycles and cannot be deleted.');
        }

        if ($category->image) {
            Helper::deleteImage($category->image);
        }

        $category->delete();

        return back()->with('success', 'Category deleted successfully.');
    }
}
