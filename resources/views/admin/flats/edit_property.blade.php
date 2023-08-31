@extends('layouts.admin.master')

@section('title')
    Edit Property
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Edit Property</h3>
        @endslot
        <li class="breadcrumb-item">Properties</li>
        <li class="breadcrumb-item active">Edit Property</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form" action="{{ route('update.property', $property->id) }}"
                                    method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="col-form-label">Name</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $property->name }}" placeholder="Name" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Address</label>
                                        <input class="form-control" type="text" name="address"
                                            value="{{ $property->address }}" placeholder="Enter Address" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Floors Count</label>
                                        <input class="form-control" type="Number" name="floors_count"
                                            value="{{ $property->floors_count }}" placeholder="Enter Floors Count" />
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
