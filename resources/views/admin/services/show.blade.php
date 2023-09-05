@extends('layouts.admin.master')

@section('title')
    Show Contract
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Show Service</h3>
        @endslot
        <li class="breadcrumb-item">Services</li>
        <li class="breadcrumb-item active">Show Service</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="col-form-label">Name Ar</label>
                                        <input class="form-control disabled" type="text" name="name_ar" value="{{service->name_ar}}" placeholder="Enter Name Ar" />

                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Name En</label>
                                        <input class="form-control disabled" type="text" name="name_en" value="{{service->name_en}}" placeholder="Enter Name En" />

                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Image</label>
                                        <input class="form-control disabled" type="file" name="image" />
                                        <img src="{{asset('storage/services/'.$service->image)}}" width="150px" class="image_thumbnail image-preview" alt="">
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    @endpush
@endsection
