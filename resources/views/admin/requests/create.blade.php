@extends('layouts.admin.master')

@section('title')
    Create Request
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Create Request</h3>
        @endslot
        <li class="breadcrumb-item">Requests</li>
        <li class="breadcrumb-item active">Create Request</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form" action="{{ route('store.request') }}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">User</label>
                                        <select class="form-select digits" name="user_id" id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Flat</label>
                                        <select class="form-select digits" name="flat_id" id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($flats as $flat)
                                                <option value="{{ $flat->id }}">{{ $flat->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('flat_id')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">service</label>
                                        <select class="form-select digits" name="service_id" id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name_ar }}</option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Date</label>
                                        <input class="form-control" type="date" name="date" />
                                        @error('date')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Status</label>
                                        <select class="form-select digits" name="status" id="exampleFormControlSelect9">
                                            <option value="">-- choose status ----</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">InActive</option>
                                        </select>
                                        @error('status')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Company</label>
                                        <select class="form-select digits" name="company_id" id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button class="btn btn-secondary">Cancel</button>
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
