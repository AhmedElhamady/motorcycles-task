@extends('layouts.dashboard.master')
@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Users</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </div>
    </div>

    <a class="btn d-block btn-outline-primary mb-3" href="{{ route('users.create') }}">Add User</a>

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive pt-3">
                        <table class="table datatable" id="datatable_1">
                            <thead>
                                <tr>
                                    <th class="wd-5p border-bottom-0">#</th>
                                    <th class="wd-20p border-bottom-0">Name</th>
                                    <th class="wd-25p border-bottom-0">Email</th>
                                    <th class="wd-10p border-bottom-0">Role</th>
                                    <th class="wd-25p border-bottom-0">Brands</th>
                                    <th class="wd-10p border-bottom-0">Status</th>
                                    <th class="wd-15p border-bottom-0">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $user->isAdmin() ? 'bg-primary-subtle text-primary' : 'bg-info-subtle text-info' }}">
                                                {{ $user->role->label() }}
                                            </span>
                                        </td>
                                        <td>
                                            @forelse ($user->brands as $brand)
                                                <span class="badge bg-secondary-subtle text-secondary">{{ $brand->name }}</span>
                                            @empty
                                                <span class="text-muted">-</span>
                                            @endforelse
                                        </td>
                                        <td>
                                            @if ($user->is_active)
                                                <span class="badge bg-success-subtle text-success">Active</span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-start d-flex flex-nowrap">
                                            <a class="btn btn-sm bg-primary-subtle me-1"
                                                href="{{ route('users.edit', $user->id) }}">
                                                <i class="mdi mdi-pencil fs-14"></i>
                                            </a>

                                            <form action="{{ route('users.toggle-active', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn btn-sm {{ $user->is_active ? 'bg-danger-subtle text-danger' : 'bg-success-subtle text-success' }}"
                                                    @disabled($user->is(auth()->user()))>
                                                    <i
                                                        class="mdi {{ $user->is_active ? 'mdi-account-off-outline' : 'mdi-account-check-outline' }} fs-14"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
