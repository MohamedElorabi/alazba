@extends('layouts.admin.master')

@section('title')
    Show Flat
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Show Flat</h3>
        @endslot
        <li class="breadcrumb-item">Flats</li>
        <li class="breadcrumb-item active">Show Flat</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form">
                                    <div class="mb-3">
                                        <label class="col-form-label">Name</label>
                                        <input class="form-control" disabled type="text" name="name"
                                            value="{{ $flat->name }}" placeholder="Enter Name" />

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">property</label>
                                        <select class="form-select digits" disabled name="property_id"
                                            id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($properties as $property)
                                                <option value="{{ $property->id }}"
                                                    {{ $property->id == $flat->property_id ? 'selected' : '' }}>
                                                    {{ $property->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Floor Number</label>
                                        <input class="form-control" disabled type="number" name="floor_number"
                                            value="{{ $flat->floor_number }}" placeholder="Floor Number" />

                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Distance</label>
                                        <input class="form-control" disabled type="text" name="distance"
                                            value="{{ $flat->distance }}" placeholder="Enter Distance" />

                                    </div>



                                    <div class="mb-3">
                                        <label class="col-form-label">Rent Amount</label>
                                        <input class="form-control" disabled type="Number" name="rent_amount"
                                            value="{{ $flat->rent_amount }}" placeholder="Enter Rent Amount" />
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
