@extends('layouts.admin.master')

@section('title')
    Property Documents
    {{-- {{ $title }} --}}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush


@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Property Documents</h3>
        @endslot
        <li class="breadcrumb-item active">Property Documents</li>
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
                                        <th width='250px'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($property_documents as $property_document)
                                        <tr>
                                            <td>{{ $property_document->name }}</td>
                                            <td>
                                                <img src="{{ asset('storage/property_documents/' . $property_document->file) }}"
                                                    width="150px" class="image_thumbnail image-preview" alt="">
                                            </td>
                                            <td>{{ $property_document->expiry_date }}</td>
                                            <td>{{ $property_document->property_id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('edit.property_document', $property_document->id) }}"
                                                        class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    <form method="post"
                                                        action="{{ route('delete.property_document', $property_document->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger show_confirm btn-xs"><i
                                                                class="fa fa-trash"></i>Delete</button>
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
