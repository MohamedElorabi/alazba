@extends('layouts.admin.master')

@section('title')
    Show Request
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Show Request</h3>
        @endslot
        <li class="breadcrumb-item">Requests</li>
        <li class="breadcrumb-item active">Show Request</li>
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
                                        <select class="form-select digits" disabled name="user_id"
                                            id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->id == $item->user_id ? 'selected' : '' }}>{{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Flat</label>
                                        <select class="form-select digits" disabled name="flat_id"
                                            id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($flats as $flat)
                                                <option value="{{ $flat->id }}"
                                                    {{ $flat->id == $item->flat_id ? 'selected' : '' }}>{{ $flat->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">service</label>
                                        <select class="form-select digits" disabled name="service_id"
                                            id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}"
                                                    {{ $service->id == $item->service_id ? 'selected' : '' }}>
                                                    {{ $service->name_ar }}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Date</label>
                                        <input class="form-control" disabled type="date" name="date"
                                            value="{{ $item->date }}" placeholder="Enter Start Date" />

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Status</label>
                                        <select class="form-select digits" disabled name="status"
                                            id="exampleFormControlSelect9">
                                            <option value="">-- choose status ----</option>
                                            <option value="active" @if ($item->status == 'active') selected @endif>Active
                                            </option>
                                            <option value="inactive" @if ($item->stuts == 'inactive') selected @endif>
                                                InActive</option>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Company</label>
                                        <select class="form-select digits" name="company_id" id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ $company->id == $item->company_id ? 'selected' : '' }}>
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
