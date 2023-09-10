@extends('layouts.admin.master')

@section('title')
    Notifications
    {{-- {{ $title }} --}}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush


@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Notifications</h3>
        @endslot
        <li class="breadcrumb-item active">Notifications</li>
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
                                        <th>User</th>
                                        <th>Object</th>
                                        <th>type</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th width='250px'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $notification)
                                        <tr>
                                            <td>{{ $notification->user->name }}</td>
                                            <td>{{ $notification->object_id }}</td>
                                            <td>{{ $notification->type }}</td>
                                            <td>{{ $notification->title }}</td>
                                            <td>{{ $notification->description }}</td>
                                            <td>
                                                <div class="d-flex align-notifications-center gap-3">
                                                    <form method="post"
                                                        action="{{ route('delete.notification', $notification->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit"
                                                            class="btn btn-danger  show_confirm btn-xs"><i
                                                                class="fa fa-trash" data-toggle="tooltip"
                                                                title='Delete'></i>Delete</button>
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
