@extends('layouts.admin.master')

@section('title')
    Show Contract
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Show Contract</h3>
        @endslot
        <li class="breadcrumb-item">Contracts</li>
        <li class="breadcrumb-item active">Show Contract</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">User</label>
                                        <select class="form-select digits" name="user_id" id="exampleFormControlSelect9"
                                            disabled>
                                            <option value="">------</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->id == $contract->user_id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Flat</label>
                                        <select class="form-select digits" name="flat_id" id="exampleFormControlSelect9"
                                            disabled>
                                            <option value="">------</option>
                                            @foreach ($flats as $flat)
                                                <option value="{{ $flat->id }}"
                                                    {{ $flat->id == $contract->flat_id ? 'selected' : '' }}>
                                                    {{ $flat->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">property</label>
                                        <select class="form-select digits" name="property_id" id="exampleFormControlSelect9"
                                            disabled>
                                            <option value="">------</option>
                                            @foreach ($properties as $property)
                                                <option value="{{ $property->id }}"
                                                    {{ $property->id == $contract->property_id ? 'selected' : '' }}>
                                                    {{ $property->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Start Date</label>
                                        <input class="form-control" type="date" name="start_date"
                                            value="{{ $contract->start_date }}" disabled placeholder="Enter Start Date" />
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">End Date</label>
                                        <input class="form-control" type="date" name="end_date"
                                            value="{{ $contract->end_date }}" disabled placeholder="Enter End Date" />
                                        @error('end_date')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Status</label>
                                        <select class="form-select digits" name="status" id="exampleFormControlSelect9"
                                            disabled>
                                            <option value="">-- choose status ----</option>
                                            <option value="active" @if ($contract->status == 'active') selected @endif>Active
                                            </option>
                                            <option value="inactive" @if ($contract->stuts == 'inactive') selected @endif>
                                                InActive</option>
                                        </select>
                                    </div>



                                    <div class="mb-3">
                                        <label class="col-form-label">Amount</label>
                                        <input class="form-control" disabled type="Number" name="amount"
                                            value="{{ $contract->amount }}" placeholder="Enter Amount" />
                                    </div>



                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Company</label>
                                        <select class="form-select digits" name="company_id" id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ $company->id == $contract->company_id ? 'selected' : '' }}>
                                                    {{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
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
