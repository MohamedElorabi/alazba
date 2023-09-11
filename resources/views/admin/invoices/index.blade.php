@extends('layouts.admin.master')

@section('title')
    Invoices
    {{-- {{ $title }} --}}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush


@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Invoices</h3>
        @endslot
        <li class="breadcrumb-item active">Invoices</li>
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
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Debit</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Expiry Date</th>
                                        <th>Payment Method</th>
                                        <th>Company</th>
                                        <th width='250px'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>{{ $invoice->user->name }}</td>
                                            <td>{{ $invoice->total }}</td>
                                            <td>{{ $invoice->paid }}</td>
                                            <td>{{ $invoice->debit }}</td>
                                            <td>{{ $invoice->status }}</td>
                                            <td>{{ $invoice->date }}</td>
                                            <td>{{ $invoice->expiry_date }}</td>
                                            <td>{{ $invoice->payment_method->name_en }}</td>
                                            <td>{{ $invoice->company->name }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('show.invoice', $invoice->id) }}"
                                                        class="btn btn-success"><i class="fa fa-eye"></i> Show</a>

                                                    <a href="{{ route('edit.invoice', $invoice->id) }}"
                                                        class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    <form method="post"
                                                        action="{{ route('delete.invoice', $invoice->id) }}">
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
