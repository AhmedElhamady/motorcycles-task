@extends('layouts.dashboard.master')
@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Enquiries</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active">Enquiries</li>
            </ol>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive pt-3">
                        <table class="table datatable" id="datatable_1">
                            <thead>
                                <tr>
                                    <th class="wd-5p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">Customer</th>
                                    <th class="wd-20p border-bottom-0">Email</th>
                                    <th class="wd-15p border-bottom-0">Phone</th>
                                    <th class="wd-15p border-bottom-0">Motorcycle</th>
                                    <th class="wd-15p border-bottom-0">Brand</th>
                                    <th class="wd-10p border-bottom-0">Date</th>
                                    <th class="wd-15p border-bottom-0">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enquiries as $index => $enquiry)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $enquiry->customer_name }}</td>
                                        <td>{{ $enquiry->email }}</td>
                                        <td>{{ $enquiry->phone }}</td>
                                        <td>{{ $enquiry->motorcycle?->name ?? 'Deleted' }}</td>
                                        <td>{{ $enquiry->motorcycle?->brand?->name ?? '-' }}</td>
                                        <td>{{ $enquiry->created_at?->format('Y-m-d') }}</td>
                                        <td class="text-start d-flex flex-nowrap">
                                            @can('view', $enquiry)
                                                <a class="btn btn-sm bg-primary-subtle me-1"
                                                    href="{{ route('enquiries.show', $enquiry->id) }}">
                                                    <i class="mdi mdi-eye-outline fs-14"></i>
                                                </a>
                                            @endcan

                                            @can('delete', $enquiry)
                                                <button type="button" class="btn btn-sm bg-danger-subtle text-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-route="{{ route('enquiries.destroy', $enquiry->id) }}"
                                                    data-name="{{ $enquiry->customer_name }}">
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
                            Are you sure you want to delete the enquiry from
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
