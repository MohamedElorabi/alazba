@extends('layouts.admin.master')

@section('title')
    Show User
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Show User</h3>
        @endslot
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Show User</li>
    @endcomponent

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h3>User :</h3>
                <div class="card">

                    <div class="card-body">
                        <form class="theme-form mega-form">

                            <div class="mb-3">
                                <label class="col-form-label">Name</label>
                                <input class="form-control" type="text" name="name" disabled
                                    value="{{ $user->name }}" placeholder="Enter Name" />

                            </div>


                            <div class="mb-3">
                                <label class="col-form-label">Phone</label>
                                <input class="form-control" type="number" disabled name="phone"
                                    value="{{ $user->phone }}" placeholder="Phone" />
                            </div>


                            <div class="mb-3">
                                <label class="col-form-label">Passport Id</label>
                                <input class="form-control" type="number" disabled name="passport_id"
                                    value="{{ $user->passport_id }}" placeholder="Passport Id" />
                            </div>


                            <div class="mb-3">
                                <label class="col-form-label">Nationalty</label>
                                <input class="form-control" type="text" name="nationalty" disabled
                                    value="{{ $user->nationalty }}" placeholder="Enter Nationalty" />
                            </div>


                            <div class="mb-3">
                                <label class="col-form-label">Image</label>
                                <input class="form-control" type="file" disabled name="image" />
                                <img src="{{ asset('storage/users/' . $user->image) }}" width="150px"
                                    class="image_thumbnail image-preview" alt="">

                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Status</label>
                                <select class="form-select digits" name="status" id="exampleFormControlSelect9" disabled>
                                    <option value="">-- choose status ----</option>
                                    <option value="active" @if ($user->status == 'active') selected @endif>Active
                                    </option>
                                    <option value="inactive" @if ($user->stuts == 'inactive') selected @endif>
                                        InActive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Type</label>
                                <input class="form-control" type="text" name="type" disabled
                                    value="{{ $user->type }}" placeholder="Enter Type" />
                            </div>



                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Company</label>
                                <select class="form-select digits" name="company_id" id="exampleFormControlSelect9">
                                    <option value="">------</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ $company->id == $user->company_id ? 'selected' : '' }}>
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
            <h3>User Documents :</h3>
            @if ($user->user_document)
                @foreach ($user->user_document as $item)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <form class="theme-form mega-form">

                                    <div class="mb-3">
                                        <label class="col-form-label">Name</label>
                                        <input class="form-control" disabled type="text" value="{{ $item->name }}" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">File</label>
                                        <img src="{{ asset('storage/user_documents/' . $item->file) }}" width="150px"
                                            class="image_thumbnail image-preview" alt="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Type</label>
                                        <input class="form-control" disabled type="text" value="{{ $item->type }}" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Expiry Date</label>
                                        <input class="form-control" disabled type="text"
                                            value="{{ $item->expiry_date }}" />

                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">User</label>
                                        <input class="form-control" disabled type="text"
                                            value="{{ $item->user->name }}" />
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
