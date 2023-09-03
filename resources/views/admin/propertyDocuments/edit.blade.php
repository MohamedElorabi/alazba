@extends('layouts.admin.master')

@section('title')
    Edit Property Document
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Edit Property Document</h3>
        @endslot
        <li class="breadcrumb-item">Property Documents</li>
        <li class="breadcrumb-item active">Edit Property Document</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form" action="{{ route('update.user', $user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div id="documentFields">
                                        <div class="card document">
                                            <div class="card-head p-4 pb-0 text-end">
                                                <button class="btn text-danger p-0">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            <div class="card-body px-4 py-2">



                                                <div>
                                                    <div class="">

                                                        <div class="mb-3">
                                                            <label class="col-form-label">Document Name:</label>
                                                            <input class="form-control" type="text" name="name[]"
                                                                placeholder="Document Name" />
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="col-form-label">Document File:</label>
                                                            <input class="form-control" type="file" name="file[]" />
                                                        </div>


                                                        <div class="mb-3">
                                                            <label class="col-form-label">Expiry Date:</label>
                                                            <input class="form-control" type="date" name="expiry_date[]" />
                                                        </div>


                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleFormControlSelect9">Property</label>
                                                            <select class="form-select digits" name="property_id"
                                                                id="exampleFormControlSelect9">
                                                                <option value="">------</option>
                                                                @foreach ($properties as $property)
                                                                    <option value="{{ $property->id }}">{{ $property->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>




                                            </div>

                                        </div>
                                    </div>

                                    <div class="d-flex gap-3
                                    mb-4">
                                        {{-- <button type="submit" class="btn btn-primary">Submit</button>
                                                <button class="btn btn-secondary">Cancel</button> --}}

                                        <button class="btn btn-secondary" type="button" id="addDocument">Add Document</button>
                                        <button class="btn btn-primary" type="submit">Upload Documents</button>
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
