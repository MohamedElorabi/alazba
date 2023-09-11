@extends('layouts.admin.master')

@section('title')
    Edit Company
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Edit Company</h3>
        @endslot
        <li class="breadcrumb-item">Companies</li>
        <li class="breadcrumb-item active">Edit Company</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form" action="{{ route('update.company', $company->id) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="col-form-label">Name</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $company->name }}" placeholder="Enter Name Ar" />
                                        @error('name')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="mb-3">
                                        <label class="col-form-label">Logo</label>
                                        <input class="form-control" type="file" name="logo" />
                                        <img src="{{ asset('storage/companies/' . $company->logo) }}" width="150px"
                                            class="image_thumbnail image-preview" alt="">
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
