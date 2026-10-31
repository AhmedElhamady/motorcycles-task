@extends('layouts.dashboard.master')
@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Edit Brand</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('brands.index') }}" class="text-primary">Brands</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('brands.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_{{ $localeCode }}">Name {{ $localeCode }} <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('name.' . $localeCode) is-invalid @enderror"
                                    name="name[{{ $localeCode }}]" id="name_{{ $localeCode }}"
                                    value="{{ old('name.' . $localeCode, $brand->getTranslation('name', $localeCode)) }}"
                                    placeholder="Enter brand name in {{ $localeCode }}" required>
                                @error('name.' . $localeCode)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach

                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description_{{ $localeCode }}">Description {{ $localeCode }}</label>
                                <textarea class="form-control ckeditor @error('description.' . $localeCode) is-invalid @enderror"
                                    name="description[{{ $localeCode }}]" id="description_{{ $localeCode }}" rows="4"
                                    placeholder="Enter brand description in {{ $localeCode }}">{{ old('description.' . $localeCode, $brand->getTranslation('description', $localeCode)) }}</textarea>
                                @error('description.' . $localeCode)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="logo">Brand Logo</label>
                            @if ($brand->logo)
                                <div class="mb-2 p-2 bg-light rounded d-inline-block">
                                    <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}"
                                        style="max-height: 80px; max-width: 200px; object-fit: contain;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo"
                                id="logo" accept="image/*">
                            <small class="text-muted">Leave empty to keep current logo. Allowed formats: JPG, JPEG, PNG,
                                WEBP (Max 2MB)</small>
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="d-block">Status</label>
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                                    value="1" @checked(old('is_active', $brand->is_active))>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary w-100 mt-4">Update Brand</button>
            </form>
        </div>
    </div>
@endsection
