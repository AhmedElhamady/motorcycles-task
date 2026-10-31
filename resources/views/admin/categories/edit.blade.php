@extends('layouts.dashboard.master')
@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Edit Category</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}" class="text-primary">Categories</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
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
                                    value="{{ old('name.' . $localeCode, $category->getTranslation('name', $localeCode)) }}"
                                    placeholder="Enter category name in {{ $localeCode }}" required>
                                @error('name.' . $localeCode)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image">Category Image</label>
                            @if ($category->image)
                                <div class="mb-2 p-2 bg-light rounded d-inline-block">
                                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}"
                                        style="max-height: 80px; max-width: 200px; object-fit: contain;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                id="image" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image. Allowed formats: JPG, JPEG, PNG,
                                WEBP (Max 2MB)</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary w-100 mt-4">Update Category</button>
            </form>
        </div>
    </div>
@endsection
