@extends('layouts.admin.master')

@section('title')
    Edit User
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Edit User</h3>
        @endslot
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Edit User</li>
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

                                    <div class="mb-3">
                                        <label class="col-form-label">Phone</label>
                                        <input class="form-control" type="number" name="phone" value="{{$user->phone}}" placeholder="Phone" />
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Passport Id</label>
                                        <input class="form-control" type="number" name="passport_id" value="{{$user->passport_id}}"    placeholder="Passport Id" />
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Nationalty</label>
                                        <input class="form-control" type="text" name="nationalty" value="{{$user->nationalty}}"
                                            placeholder="Enter Nationalty" />
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Image</label>
                                        <input class="form-control" type="file" name="image"/>
                                        <img src="{{asset('storage/users/'.$user->image)}}" width="150px" class="image_thumbnail image-preview" alt="">

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Status</label>
                                        <select class="form-select digits" name="status" id="exampleFormControlSelect9">
                                            <option value="">-- choose status ----</option>
                                            <option value="active" @if ($user->status == 'active') selected @endif>Active</option>
                                            <option value="inactive" @if ($user->stuts == 'inactive') selected @endif>InActive</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Type</label>
                                        <input class="form-control" type="text" name="type" value="{{$user->type}}"
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
