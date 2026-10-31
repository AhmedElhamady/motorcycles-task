@extends('layouts.dashboard.master')
@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Sliders</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active">Sliders</li>
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
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-25p border-bottom-0">Image</th>
                                    <th class="wd-15p border-bottom-0">Tag</th>
                                    <th class="wd-15p border-bottom-0">CV</th>
                                    <th class="wd-25p border-bottom-0">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $index => $slider)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>
                                            <img src="{{ asset($slider->image) }}" class="preview-img" alt="image">
                                        </td>
                                        <td style="width: 400px">{{ $slider->tag }}</td>
                                        <td>
                                            <a href="{{ asset($slider->cv) }}" target="_blank">
                                                <i class="mdi mdi-file-document-outline fs-14"></i>
                                                Download CV
                                            </a>
                                        </td>
                                        <td class="text-start d-flex flex-nowrap">
                                            <a class="btn btn-sm bg-primary-subtle me-1"
                                                href="{{ route('sliders.edit', $slider->id) }}">
                                                <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                            </a>
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
@section('js')
@endsection
