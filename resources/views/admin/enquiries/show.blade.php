@extends('layouts.dashboard.master')
@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Enquiry Details</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('enquiries.index') }}" class="text-primary">Enquiries</a></li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Customer Message</h5>
                </div>
                <div class="card-body">
                    <p class="mb-0">{{ $enquiry->message }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Customer Information</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><strong>Name:</strong> {{ $enquiry->customer_name }}</li>
                        <li class="mb-2"><strong>Email:</strong> {{ $enquiry->email }}</li>
                        <li class="mb-2"><strong>Phone:</strong> {{ $enquiry->phone }}</li>
                        <li class="mb-2"><strong>Received:</strong> {{ $enquiry->created_at?->format('Y-m-d H:i') }}</li>
                        <li class="mb-2"><strong>Motorcycle:</strong> {{ $enquiry->motorcycle?->name ?? 'Deleted' }}</li>
                        <li class="mb-2"><strong>Brand:</strong> {{ $enquiry->motorcycle?->brand?->name ?? '-' }}</li>
                        <li class="mb-0"><strong>Category:</strong> {{ $enquiry->motorcycle?->category?->name ?? '-' }}</li>
                    </ul>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('enquiries.index') }}" class="btn btn-outline-secondary">Back</a>

                @can('delete', $enquiry)
                    <form action="{{ route('enquiries.destroy', $enquiry->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Enquiry</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
@endsection
