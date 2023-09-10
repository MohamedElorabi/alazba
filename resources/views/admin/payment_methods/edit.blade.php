@extends('layouts.admin.master')

@section('title')
    Edit Payment Method
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Edit Payment Method</h3>
        @endslot
        <li class="breadcrumb-item">Payment Methods</li>
        <li class="breadcrumb-item active">Edit Payment Method</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form"
                                    action="{{ route('update.payment_method', $payment_method->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="col-form-label">Name Ar</label>
                                        <input class="form-control" type="text" value="{{ $payment_method->name_ar }}"
                                            name="name_ar" />
                                        @error('name_ar')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Name En</label>
                                        <input class="form-control" type="text" name="name_en"
                                            value="{{ $payment_method->name_en }}" />
                                        @error('paid')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Image</label>
                                        <input class="form-control" type="file" name="image" />
                                        <img src="{{ asset('storage/payment_methods/' . $payment_method->image) }}"
                                            width="150px" class="image_thumbnail image-preview" alt="">

                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Available </label>
                                        <select class="form-select digits" name="available" id="exampleFormControlSelect9">
                                            <option value="">-- choose status ----</option>
                                            <option value="true" @if ($payment_method->available == 'true') selected @endif>
                                                Available</option>
                                            <option value="false" @if ($payment_method->available == 'false') selected @endif>
                                                Unavailable</option>
                                        </select>
                                        @error('status')
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
