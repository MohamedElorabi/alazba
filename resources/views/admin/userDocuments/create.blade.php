@extends('layouts.admin.master')

@section('title')
    Create User Documents
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Create User</h3>
        @endslot
        <li class="breadcrumb-item">Users Documents</li>
        <li class="breadcrumb-item active">Create User Documents</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form" action="{{ route('store.user_document') }}" method="post" enctype="multipart/form-data">
                                    @csrf


                                    <div id="documentFields">
                                        <div class="document">

                                        <div class="mb-3">
                                            <label class="col-form-label">Document Name:</label>
                                            <input class="form-control" type="text" name="name[]" placeholder="Document Name" />
                                        </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Document File:</label>
                                        <input class="form-control" type="file" name="file[]" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Document Type:</label>
                                        <input class="form-control" type="type" name="type[]" placeholder="" />
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Expiry Date:</label>
                                        <input class="form-control" type="date" name="expiry_date[]" />
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">User</label>
                                        <select class="form-select digits" name="user_id" id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>


                                    <div class="card-footer">
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

        <script>
            $(document).ready(function () {
                $('#addDocument').click(function () {
                    $('#documentFields').append($('.document').first().clone());
                });
            });
        </script>
    @endpush
@endsection
