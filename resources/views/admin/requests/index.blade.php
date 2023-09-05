@extends('layouts.admin.master')

@section('title')
    Requests
    {{-- {{ $title }} --}}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush


@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Requests</h3>
        @endslot
        <li class="breadcrumb-item active">Requests</li>
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
                                        <th>Flat</th>
                                        <th>Service</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th width='250px'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $item)
                                        <tr>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->flat->name }}</td>
                                            <td>{{ $item->service->name_ar }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('edit.request', $item->id) }}"
                                                        class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    <form method="post" action="{{ route('delete.request', $item->id) }}">
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
