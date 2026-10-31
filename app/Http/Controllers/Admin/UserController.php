<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\Brand;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $users = User::with('brands')->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', User::class);

        $brands = Brand::orderBy('id')->get();

        return view('admin.users.create', compact('brands'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');
        $brandIds = $data['brand_ids'] ?? [];
        unset($data['brand_ids']);

        $user = User::create($data);
        $user->brands()->sync($user->isDataEntry() ? $brandIds : []);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $brands = Brand::orderBy('id')->get();

        return view('admin.users.edit', compact('user', 'brands'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if (blank($data['password'] ?? null)) {
            unset($data['password']);
        }

        $data['is_active'] = $request->boolean('is_active');
        $brandIds = $data['brand_ids'] ?? [];
        unset($data['brand_ids']);

        if ($user->is(auth()->user())) {
            $data['role'] = $user->role;
            $data['is_active'] = true;
        }

        $user->update($data);
        $user->brands()->sync($user->isDataEntry() ? $brandIds : []);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function toggleActive(User $user)
    {
        $this->authorize('update', $user);

        if ($user->is(auth()->user())) {
            return back()->with('error', 'You cannot deactivate your own account.');
        }

        $user->update(['is_active' => ! $user->is_active]);

        return back()->with('success', 'User status updated successfully.');
    }
}
