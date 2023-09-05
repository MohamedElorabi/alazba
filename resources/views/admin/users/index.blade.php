@extends('layouts.admin.master')

@section('title')
    Users
    {{-- {{ $title }} --}}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush


@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Users</h3>
        @endslot
        <li class="breadcrumb-item active">Users</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <!-- Feature Unable /Disable Order Starts-->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Passport Id</th>
                                        <th>Nationalty</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Type</th>
                                        <th width='250px'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name}}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->passport_id }}</td>
                                            <td>{{ $user->nationalty }}</td>
                                            <td>
                                                <img src="{{ asset('storage/users/' . $user->image) }}" width="150px"
                                                    class="image_thumbnail image-preview" alt="">
                                            </td>
                                            <td>{{ $user->status }}</td>
                                            <td>{{ $user->type }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('edit.user', $user->id) }}" class="btn btn-primary"><i
                                                            class="fa fa-edit"></i> Edit</a>
                                                    <form method="post" action="{{ route('delete.user', $user->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit"
                                                            class="btn btn-danger  show_confirm btn-xs"><i
                                                                class="fa fa-trash" data-toggle="tooltip" title='Delete'></i>Delete</button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Feature Unable /Disable Ends-->
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    @endpush
@endsection
