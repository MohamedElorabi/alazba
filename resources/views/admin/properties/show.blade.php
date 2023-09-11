@extends('layouts.admin.master')

@section('title')
    Show Property
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Show Property</h3>
        @endslot
        <li class="breadcrumb-item">Properties</li>
        <li class="breadcrumb-item active">Show Property</li>
    @endcomponent

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h3>Property :</h3>
                <div class="card">
                    <div class="card-body">
                        <form class="theme-form mega-form">

                            <div class="mb-3">
                                <label class="col-form-label">Name</label>
                                <input class="form-control" disabled type="text" name="name"
                                    value="{{ $property->name }}" />

                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Address</label>
                                <input class="form-control" disabled type="text" name="address"
                                    value="{{ $property->address }}" />

                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Floors Count</label>
                                <input class="form-control" disabled type="Number" name="floors_count"
                                    value="{{ $property->floors_count }}" />
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">User</label>
                                <select class="form-select digits" name="user_id" id="exampleFormControlSelect9">
                                    <option value="">------</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $user->id == $property->user_id ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Company</label>
                                <select class="form-select digits" name="company_id" id="exampleFormControlSelect9">
                                    <option value="">------</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ $company->id == $property->company_id ? 'selected' : '' }}>
                                            {{ $company->name }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <h3>Property Documents :</h3>
            @if ($property->property_document)
                @foreach ($property->property_document as $item)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <form class="theme-form mega-form">

                                    <div class="mb-3">
                                        <label class="col-form-label">Name</label>
                                        <input class="form-control" disabled type="text" value="{{ $item->name }}" />

                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Expiry Date</label>
                                        <input class="form-control" disabled type="text"
                                            value="{{ $item->expiry_date }}" />

                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Property</label>
                                        <input class="form-control" disabled type="text"
                                            value="{{ $item->property->name }}" />

                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">File</label>
                                        <img src="{{ asset('storage/property_documents/' . $item->file) }}" width="150px"
                                            class="image_thumbnail image-preview" alt="">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No Property Documents Related By This Property</p>
            @endif

        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    @endpush
@endsection
