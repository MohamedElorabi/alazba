@extends('layouts.admin.master')

@section('title')
    Edit Contract
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Edit Service</h3>
        @endslot
        <li class="breadcrumb-item">Services</li>
        <li class="breadcrumb-item active">Edit Service</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form" action="{{ route('update.service', $service->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="col-form-label">Name Ar</label>
                                        <input class="form-control" type="text" name="name_ar" value="{{service->name_ar}}" placeholder="Enter Name Ar" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Name En</label>
                                        <input class="form-control" type="text" name="name_en" value="{{service->name_en}}" placeholder="Enter Name En" />
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Image</label>
                                        <input class="form-control" type="file" name="image" />
                                        <img src="{{asset('storage/services/'.$service->image)}}" width="150px" class="image_thumbnail image-preview" alt="">
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button class="btn btn-secondary">Cancel</button>
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
