@extends('layouts.admin.master')

@section('title')
    Show Invoice
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Show Invoice</h3>
        @endslot
        <li class="breadcrumb-item">Invoices</li>
        <li class="breadcrumb-item active">Show Invoice</li>
    @endcomponent


    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h3>Invoice :</h3>
                <div class="card">

                    <div class="card-body">
                        <form class="theme-form mega-form">


                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">User</label>
                                <input class="form-control" disabled value="{{ $invoice->user->name }}" type="text" />
                                </select>
                            </div>


                            <div class="mb-3">
                                <label class="col-form-label">Total</label>
                                <input class="form-control" disabled value="{{ $invoice->total }}" type="number"
                                    name="total" placeholder="Enter Total" />
                            </div>


                            <div class="mb-3">
                                <label class="col-form-label">Paid</label>
                                <input class="form-control" disabled value="{{ $invoice->paid }}" type="number"
                                    name="paid" placeholder="Enter Paid" />
                            </div>


                            <div class="mb-3">
                                <label class="col-form-label">Debit</label>
                                <input class="form-control" disabled type="number" value="{{ $invoice->debit }}"
                                    name="debit" placeholder="Enter Debit" />
                            </div>



                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Status</label>
                                <select class="form-select digits" disabled name="status" id="exampleFormControlSelect9">
                                    <option value="">-- choose status ----</option>
                                    <option value="active" @if ($invoice->status == 'active') selected @endif>Active</option>
                                    <option value="inactive" @if ($invoice->status == 'inactive') selected @endif>InActive
                                    </option>
                                </select>
                            </div>



                            <div class="mb-3">
                                <label class="col-form-label">Date</label>
                                <input class="form-control" disabled type="date" value="{{ $invoice->date }}"
                                    name="date" placeholder="Enter Date" />
                            </div>


                            <div class="mb-3">
                                <label class="col-form-label">ExpiryDate</label>
                                <input class="form-control" disabled type="date" value="{{ $invoice->expiry_date }}"
                                    name="expiry_date" placeholder="Enter ExpiryDate" />
                            </div>


                            <div class="mb-3">
                                <label class="col-form-label">Payment Method</label>
                                <input class="form-control" disabled type="string"
                                    value="{{ $invoice->payment_method->name_en }}" name="method" />
                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <h3>Invoice Items :</h3>
            @foreach ($invoice->invoice_items as $item)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <form class="theme-form mega-form">

                                <div class="mb-3">
                                    <label class="col-form-label">Invoice</label>
                                    <input class="form-control" disabled type="text"
                                        value="{{ $item->invoice->user->name }}" />

                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Object</label>
                                    <input class="form-control" disabled type="text" value="{{ $item->object_id }}" />
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Object Type</label>
                                    <input class="form-control" disabled type="text" value="{{ $item->type }}" />
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">price</label>
                                    <input class="form-control" disabled type="text" value="{{ $item->price }}" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    @endpush
@endsection
