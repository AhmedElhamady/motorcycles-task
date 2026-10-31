@extends('layouts.dashboard.master')
@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Brands</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active">Brands</li>
            </ol>
        </div>
    </div>

    @can('create', App\Models\Brand::class)
        <a class="btn d-block btn-outline-primary mb-3" href="{{ route('brands.create') }}">Add Brand</a>
    @endcan

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive pt-3">
                        <table class="table datatable" id="datatable_1">
                            <thead>
                                <tr>
                                    <th class="wd-5p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">Logo</th>
                                    <th class="wd-20p border-bottom-0">Name</th>
                                    <th class="wd-25p border-bottom-0">Description</th>
                                    <th class="wd-10p border-bottom-0">Status</th>
                                    <th class="wd-10p border-bottom-0">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $index => $brand)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>
                                            @if ($brand->logo)
                                                <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}"
                                                    style="max-height: 50px; max-width: 120px; object-fit: contain;">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ Str::limit(strip_tags($brand->description ?? ''), 60) }}</td>
                                        <td>
                                            @if ($brand->is_active)
                                                <span class="badge bg-success-subtle text-success">Active</span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-start d-flex flex-nowrap">
                                            @can('update', $brand)
                                                <a class="btn btn-sm bg-primary-subtle me-1"
                                                    href="{{ route('brands.edit', $brand->id) }}">
                                                    <i class="mdi mdi-pencil fs-14"></i>
                                                </a>
                                            @endcan

                                            @can('delete', $brand)
                                                <button type="button" class="btn btn-sm bg-danger-subtle text-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-route="{{ route('brands.destroy', $brand->id) }}"
                                                    data-name="{{ $brand->name }}">
                                                    <i class="mdi mdi-delete-outline fs-14"></i>
                                                </button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">
                            Are you sure you want to delete
                            <strong class="text-danger" id="form-name"></strong>?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#deleteModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                $('#form-name').text(button.data('name'));
                $('#deleteForm').attr('action', button.data('route'));
            });
        });
    </script>
@endsection
