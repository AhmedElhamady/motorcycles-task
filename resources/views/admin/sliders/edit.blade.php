@extends('layouts.dashboard.master')
@section('css')
@endsection
@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Edit Slider</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}" class="text-primary">Sliders</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <!-- Sidebar - Media Section -->
                    <div class="col-lg-3 col-md-4">
                        <div class="media-sidebar">
                            <!-- Image Upload -->
                            <div class="form-group mb-3">
                                @if ($slider->image)
                                    <div class="mb-2">
                                        <img src="{{ asset($slider->image) }}"
                                            style="width:100%; height:auto; object-fit:cover; border-radius: 8px; border: 2px solid #e9ecef;"
                                            alt="Current Image">
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" id="image" accept="image/*" />
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- CV Upload -->
                            <div class="form-group">
                                <label for="cv" class="form-label">CV Document</label>
                                @if ($slider->cv)
                                    <div class="mb-2">
                                        <a href="{{ asset($slider->cv) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary w-100">
                                            <i class="mdi mdi-file-document"></i> View CV
                                        </a>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv"
                                    id="cv" accept=".pdf,.doc,.docx,.txt" />
                                @error('cv')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Main Content Area -->
                    <div class="col-lg-9 col-md-8">
                        <!-- Tag (Translatable) -->
                        <div class="row">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tag_{{ $localeCode }}">Tag {{ strtoupper($localeCode) }} <span
                                                class="text-danger">*</span></label>
                                        <input
                                            value="{{ old('tag.' . $localeCode, $slider->getTranslation('tag', $localeCode)) }}"
                                            class="form-control @error('tag.' . $localeCode) is-invalid @enderror"
                                            placeholder="Enter Tag" name="tag[{{ $localeCode }}]"
                                            id="tag_{{ $localeCode }}" />
                                        @error('tag.' . $localeCode)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bio_{{ $localeCode }}">Bio {{ strtoupper($localeCode) }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea id="bio_{{ $localeCode }}" class="form-control @error('bio.' . $localeCode) is-invalid @enderror" required
                                            placeholder="Enter bio" rows="4" name="bio[{{ $localeCode }}]">{{ old('bio.' . $localeCode, $slider->getTranslation('bio', $localeCode)) }}</textarea>
                                        @error('bio.' . $localeCode)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type_text_{{ $localeCode }}">Type Text
                                            {{ strtoupper($localeCode) }}</label>
                                        @php
                                            // Extract values for this locale from the stored JSON
                                            $typeTextValue = '';
                                            if (
                                                is_array($slider->type_text) &&
                                                isset($slider->type_text[$localeCode])
                                            ) {
                                                $items = $slider->type_text[$localeCode];
                                                // Extract values from the array of objects
                                                $values = [];
                                                if (is_array($items)) {
                                                    foreach ($items as $item) {
                                                        if (is_array($item) && isset($item['value'])) {
                                                            $values[] = $item['value'];
                                                        } elseif (is_string($item)) {
                                                            $values[] = $item;
                                                        }
                                                    }
                                                }
                                                $typeTextValue = implode(',', $values);
                                            }
                                        @endphp
                                        <input
                                            class="form-control tagify-input @error('type_text.' . $localeCode) is-invalid @enderror"
                                            name="type_text[{{ $localeCode }}]" id="type_text_{{ $localeCode }}"
                                            value="{{ old('type_text.' . $localeCode, $typeTextValue) }}"
                                            placeholder="Type text and press enter" />
                                        <small class="text-muted">Enter multiple values separated by commas</small>
                                        @error('type_text.' . $localeCode)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-outline-primary w-100 mt-4">
                            <i class="mdi mdi-content-save"></i> Update Slider
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Tagify for all type_text inputs
            const tagifyInputs = document.querySelectorAll('.tagify-input');

            tagifyInputs.forEach(input => {
                const locale = input.id.replace('type_text_', '');
                const isRTL = locale === 'ar'; // Arabic is RTL

                new Tagify(input, {
                    delimiters: ",|،", // comma or Arabic comma
                    maxTags: 20,
                    dropdown: {
                        maxItems: 20,
                        classname: "tags-look",
                        enabled: 0,
                        closeOnSelect: false
                    },
                    ...(isRTL && {
                        direction: 'rtl'
                    }) // Set RTL for Arabic
                });
            });

            // Preview image before upload
            const imageInput = document.getElementById('image');
            if (imageInput) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const currentImage = document.querySelector('img[alt="Current Image"]');
                            if (currentImage) {
                                currentImage.src = e.target.result;
                            }
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>

    <style>
        .tagify {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 4px;
            height: auto;
            min-height: 38px;
        }

        .tagify__input {
            min-height: 30px;
        }

        .media-sidebar {
            background: #f8f9fa;
            padding: 1.25rem;
            border-radius: 8px;
            height: 100%;
            border: 1px solid #e9ecef;
        }

        .media-sidebar .form-group {
            margin-bottom: 1.5rem;
        }

        .media-sidebar .form-group:last-child {
            margin-bottom: 0;
        }

        .form-group label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .text-truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection
