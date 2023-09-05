@extends('layouts.admin.master')

@section('title')
    User Documents
    {{-- {{ $title }} --}}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush


@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>User Documents</h3>
        @endslot
        <li class="breadcrumb-item active">User Documents</li>
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
                                        <th>Files</th>
                                        <th>Type</th>
                                        <th>Expiry Date</th>
                                        <th>User</th>
                                        {{-- <th width='250px'>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_documents as $user_document)
                                        <tr>
                                            <td>{{ $user_document->name }}</td>
                                            <td>
                                                <img src="{{ asset('storage/user_documents/' . $user_document->file) }}"
                                                    width="150px" class="image_thumbnail image-preview" alt="">
                                            </td>
                                            <td>{{ $user_document->type }}</td>
                                            <td>{{ $user_document->expiry_date }}</td>
                                            <td>{{ $user_document->user->name }}</td>
                                            {{-- <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('edit.user_document', $user_document->id) }}"
                                                        class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    <form method="post"
                                                        action="{{ route('delete.user_document', $user_document->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit"
                                                            class="btn btn-danger  show_confirm btn-xs"><i
                                                                class="fa fa-trash" data-toggle="tooltip" title='Delete'></i>Delete</button>
                                                    </form>
                                                </div>
                                            </td> --}}
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
