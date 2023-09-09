@extends('layouts.admin.master')

@section('title')
    Show Payment Method
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Show Payment Method</h3>
        @endslot
        <li class="breadcrumb-item">Payment Methods</li>
        <li class="breadcrumb-item active">Show Payment Method</li>
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
                                        <label class="col-form-label">Name Ar</label>
                                        <input class="form-control" disabled type="text" value="{{$payment_method->name_ar}}" name="name_ar" />

                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Name En</label>
                                        <input class="form-control" disabled type="text" name="name_en" value="{{$payment_method->name_en}}"/>

                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Image</label>
                                        <input class="form-control" type="file" disabled name="image" />
                                        <img src="{{ asset('storage/payment_methods/' . $payment_method->image) }}" width="150px"
                                            class="image_thumbnail image-preview" alt="">

                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Available	</label>
                                        <select class="form-select digits" disabled name="available" id="exampleFormControlSelect9">
                                            <option value="">-- choose status ----</option>
                                            <option value="true" @if ($payment_method->status == 'true') selected @endif>Available</option>
                                            <option value="false" @if ($payment_method->status == 'false') selected @endif>Unavailable</option>
                                        </select>

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
