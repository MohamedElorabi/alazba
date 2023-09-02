@extends('layouts.admin.master')

@section('title')
    Services
    {{-- {{ $title }} --}}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush


@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Services</h3>
        @endslot
        <li class="breadcrumb-item active">Services</li>
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
                                        <th>Name Ar</th>
                                        <th>Name En</th>
                                        <th>Image</th>

                                        <th width='250px'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->name_ar }}</td>
                                            <td>{{ $service->name_en }}</td>
                                            <td>
                                                <img src="{{asset('storage/services/'.$service->image)}}" width="150px" class="image_thumbnail image-preview" alt="">
                                            </td>

                                            <td>
                                                <a href="{{ route('edit.service', $service->id) }}" class="btn btn-primary"><i
                                                        class="fa fa-edit"></i>Edit</a>
                                                        <form method="post" action="{{ route('delete.service', $service->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger  show_confirm btn-xs"><i class="fa fa-trash"></i></button>
                                                        </form>
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
