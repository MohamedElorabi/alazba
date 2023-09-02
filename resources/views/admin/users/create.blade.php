@extends('layouts.admin.master')

@section('title')
    Create User
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Create User</h3>
        @endslot
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Create User</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form" action="{{ route('store.user') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="col-form-label">Phone</label>
                                        <input class="form-control" type="number" name="phone" placeholder="Phone" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Password</label>
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Enter Password" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Passport Id</label>
                                        <input class="form-control" type="number" name="passport_id" placeholder="Passport Id" />
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Nationalty</label>
                                        <input class="form-control" type="text" name="nationalty"
                                            placeholder="Enter Nationalty" />
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Image</label>
                                        <input class="form-control" type="file" name="image"/>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Status</label>
                                        <select class="form-select digits" name="status" id="exampleFormControlSelect9">
                                            <option value="">-- choose status ----</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">InActive</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Type</label>
                                        <input class="form-control" type="text" name="type"
                                            placeholder="Enter Type" />
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
