@extends('layouts.admin.master')

@section('title')
    Edit Flat
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Edit Flat</h3>
        @endslot
        <li class="breadcrumb-item">Flats</li>
        <li class="breadcrumb-item active">Edit Flat</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form" action="{{ route('update.flat', $flat->id) }}"
                                    method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">property</label>
                                        <select class="form-select digits" name="property_id"
                                            id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($properties as $property)
                                                <option value="{{ $property->id }}"
                                                    {{ $property->id == $flat->property_id ? 'selected' : '' }}>
                                                    {{ $property->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('property_id')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Floor Number</label>
                                        <input class="form-control" type="number" name="floor_number"
                                            value="{{ $flat->floor_number }}" placeholder="Floor Number" />
                                        @error('floor_number')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Distance</label>
                                        <input class="form-control" type="text" name="distance"
                                            value="{{ $flat->distance }}" placeholder="Enter Distance" />
                                        @error('distance')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="mb-3">
                                        <label class="col-form-label">Rent Amount</label>
                                        <input class="form-control" type="Number" name="rent_amount"
                                            value="{{ $flat->rent_amount }}" placeholder="Enter Rent Amount" />
                                        @error('rent_amount')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
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
