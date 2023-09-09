@extends('layouts.admin.master')

@section('title')
    Create Payment Method
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Create Payment Method</h3>
        @endslot
        <li class="breadcrumb-item">Payment Methods</li>
        <li class="breadcrumb-item active">Create Payment Method</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form" action="{{ route('store.payment_method') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="col-form-label">Name Ar</label>
                                        <input class="form-control" type="text" name="name_ar"
                                            placeholder="Enter Name Ar" />
                                        @error('name_ar')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Name En</label>
                                        <input class="form-control" type="text" name="name_en"
                                            placeholder="Enter Name En" />
                                        @error('name_en')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Image</label>
                                        <input class="form-control" type="file" name="image"/>
                                        @error('image')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Available	</label>
                                        <select class="form-select digits" name="available" id="exampleFormControlSelect9">
                                            <option value="">-- choose status ----</option>
                                            <option value="true">Available</option>
                                            <option value="false">Unavailable</option>
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
