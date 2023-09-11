@extends('layouts.admin.master')

@section('title')
    Show Company
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Show Company</h3>
        @endslot
        <li class="breadcrumb-item">Companies</li>
        <li class="breadcrumb-item active">Show Company</li>
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
                                        <label class="col-form-label">Name</label>
                                        <input class="form-control" disabled type="text" name="name"
                                            value="{{ $company->name }}" placeholder="Enter Name" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Slug</label>
                                        <input class="form-control" disabled type="text" name="name"
                                            value="{{ $company->slug }}" placeholder="Enter Name" />
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Logo</label>
                                        <input class="form-control" disabled type="file" name="logo" />
                                        <img src="{{ asset('storage/companies/' . $company->logo) }}" width="150px"
                                            class="image_thumbnail image-preview" alt="">
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
