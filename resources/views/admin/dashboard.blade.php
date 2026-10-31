@extends('layouts.dashboard.master')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid py-4">

        <div class="hero-card mb-4 shadow-sm">
            <div class="row align-items-center text-center text-md-start">
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    <div class="brand-logo-wrapper">
                        <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="img-fluid" style="max-height: 100px;">
                    </div>
                </div>
                <div class="col-md-9">
                    <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-2 rounded-pill fw-medium">
                        <i class="far fa-smile me-1"></i> Welcome Back
                    </span>
                    <h2 class="fw-bold mb-2 text-body">Hello, {{ auth()->user()->name }}!</h2>
                    <p class=" mb-0 fs-6" style="max-width: 620px;">
                        Welcome to your motorcycle management panel. Select a section below or use the sidebar menu to
                        manage your content.
                    </p>
                </div>
            </div>
            <i class="fas fa-layer-group bg-pattern"></i>
        </div>

        <h5 class="fw-bold mb-3 text-body">Overview</h5>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="action-card">
                    <div class="action-icon">
                        <iconify-icon icon="solar:tag-horizontal-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <p class="text-muted mb-1">Brands</p>
                        <h4 class="mb-0">{{ $brandsCount }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="action-card">
                    <div class="action-icon">
                        <iconify-icon icon="solar:wheel-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <p class="text-muted mb-1">Motorcycles</p>
                        <h4 class="mb-0">{{ $motorcyclesCount }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="action-card">
                    <div class="action-icon">
                        <iconify-icon icon="solar:check-circle-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <p class="text-muted mb-1">Active Motorcycles</p>
                        <h4 class="mb-0">{{ $activeMotorcyclesCount }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="action-card">
                    <div class="action-icon">
                        <iconify-icon icon="solar:chat-round-line-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <p class="text-muted mb-1">Enquiries</p>
                        <h4 class="mb-0">{{ $enquiriesCount }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="fw-bold mb-3 text-body">Quick Navigation</h5>

        <div class="row g-3">
            @can('manage-users')
                <div class="col-md-4">
                    <a href="{{ route('users.index') }}" class="action-card">
                        <div class="action-icon">
                            <iconify-icon icon="solar:users-group-rounded-bold-duotone"></iconify-icon>
                        </div>
                        <div>
                            <h6 class="mb-1">Users</h6>
                            <p class="text-muted mb-0">Manage admins and data entry users.</p>
                        </div>
                    </a>
                </div>
            @endcan

            <div class="col-md-4">
                <a href="{{ route('brands.index') }}" class="action-card">
                    <div class="action-icon">
                        <iconify-icon icon="solar:tag-horizontal-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <h6 class="mb-1">Brands</h6>
                        <p class="text-muted mb-0">Manage the brands you are assigned to.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('motorcycles.index') }}" class="action-card">
                    <div class="action-icon">
                        <iconify-icon icon="solar:wheel-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <h6 class="mb-1">Motorcycles</h6>
                        <p class="text-muted mb-0">Manage motorcycles and their details.</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('enquiries.index') }}" class="action-card">
                    <div class="action-icon">
                        <iconify-icon icon="solar:chat-round-line-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <h6 class="mb-1">Enquiries</h6>
                        <p class="text-muted mb-0">Review customer enquiries.</p>
                    </div>
                </a>
            </div>

            @can('manage-categories')
                <div class="col-md-4">
                    <a href="{{ route('categories.index') }}" class="action-card">
                        <div class="action-icon">
                            <iconify-icon icon="solar:widget-add-bold-duotone"></iconify-icon>
                        </div>
                        <div>
                            <h6 class="mb-1">Categories</h6>
                            <p class="text-muted mb-0">Organize motorcycles by category.</p>
                        </div>
                    </a>
                </div>
            @endcan

            @can('manage-services')
                <div class="col-md-4">
                    <a href="{{ route('services.index') }}" class="action-card">
                        <div class="action-icon">
                            <iconify-icon icon="solar:case-round-bold-duotone"></iconify-icon>
                        </div>
                        <div>
                            <h6 class="mb-1">Services</h6>
                            <p class="text-muted mb-0">Manage the services shown on the website.</p>
                        </div>
                    </a>
                </div>
            @endcan
        </div>

    </div>
@endsection

@section('css')
    <style>
        .hero-card {
            background-color: var(--bs-tertiary-bg);
            border: 1px solid var(--bs-border-color-translucent);
            border-radius: 20px;
            padding: 35px 30px;
            position: relative;
            overflow: hidden;
        }

        .hero-card .bg-pattern {
            position: absolute;
            right: -20px;
            bottom: -30px;
            font-size: 13rem;
            opacity: 0.04;
            color: var(--bs-body-color);
            pointer-events: none;
        }

        .brand-logo-wrapper {
            background: var(--bs-body-bg);
            padding: 16px;
            border-radius: 16px;
            display: inline-block;
            border: 1px solid var(--bs-border-color-translucent);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .action-card {
            border: 1px solid var(--bs-border-color-translucent);
            border-radius: 16px;
            background-color: var(--bs-body-bg);
            padding: 22px;
            transition: all 0.25s ease-in-out;
            text-decoration: none;
            color: var(--bs-body-color);
            display: flex;
            align-items: center;
            gap: 18px;
            height: 100%;
        }

        .action-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06);
            border-color: var(--bs-primary);
            color: var(--bs-primary);
        }

        .action-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background-color: var(--bs-tertiary-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
            transition: all 0.25s ease-in-out;
        }

        .action-card:hover .action-icon {
            background-color: var(--bs-primary);
            color: #ffffff !important;
        }
    </style>
@endsection
