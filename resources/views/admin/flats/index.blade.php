@extends('layouts.admin.master')

@section('title')
    Flats
    {{-- {{ $title }} --}}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush


@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Flats</h3>
        @endslot
        <li class="breadcrumb-item active">Flats</li>
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
                                        <th>Property</th>
                                        <th>Floor Number</th>
                                        <th>Distance</th>
                                        <th>Rent Amount</th>
                                        <th width='250px'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($flats as $flat)
                                        <tr>
                                            <td>{{ $flat->property->name }}</td>
                                            <td>{{ $flat->floor_number }}</td>
                                            <td>{{ $flat->distance }}</td>
                                            <td>{{ $flat->rent_amount }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('edit.flat', $flat->id) }}" class="btn btn-primary"><i
                                                            class="fa fa-edit"></i> Edit</a>
                                                    <form method="post" action="{{ route('delete.flat', $flat->id) }}">
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
