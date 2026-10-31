@extends('layouts.dashboard.master')
@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Edit Motorcycle</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('motorcycles.index') }}" class="text-primary">Motorcycles</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('motorcycles.update', $motorcycle->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="brand_id">Brand <span class="text-danger">*</span></label>
                            <select class="form-select select2 @error('brand_id') is-invalid @enderror" name="brand_id"
                                id="brand_id" required>
                                <option value="">Select brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        @selected(old('brand_id', $motorcycle->brand_id) == $brand->id)>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">Category <span class="text-danger">*</span></label>
                            <select class="form-select select2 @error('category_id') is-invalid @enderror" name="category_id"
                                id="category_id" required>
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @selected(old('category_id', $motorcycle->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_{{ $localeCode }}">Name {{ $localeCode }} <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('name.' . $localeCode) is-invalid @enderror"
                                    name="name[{{ $localeCode }}]" id="name_{{ $localeCode }}"
                                    value="{{ old('name.' . $localeCode, $motorcycle->getTranslation('name', $localeCode)) }}"
                                    placeholder="Enter motorcycle name in {{ $localeCode }}" required>
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
                                    name="description[{{ $localeCode }}]" id="description_{{ $localeCode }}" rows="3"
                                    placeholder="Enter motorcycle description in {{ $localeCode }}">{{ old('description.' . $localeCode, $motorcycle->getTranslation('description', $localeCode)) }}</textarea>
                                @error('description.' . $localeCode)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0"
                                class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                                value="{{ old('price', $motorcycle->price) }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Motorcycle Image</label>
                            @if ($motorcycle->image)
                                <div class="mb-2 p-2 bg-light rounded d-inline-block">
                                    <img src="{{ asset($motorcycle->image) }}" alt="{{ $motorcycle->name }}"
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

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="d-block">Status</label>
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                                    value="1" @checked(old('is_active', $motorcycle->is_active))>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary w-100 mt-4">Update Motorcycle</button>
            </form>
        </div>
    </div>
@endsection
