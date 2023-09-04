@extends('layouts.admin.master')

@section('title')
    Edit Request
    {{-- {{ $title }} --}}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Edit Request</h3>
        @endslot
        <li class="breadcrumb-item">Requests</li>
        <li class="breadcrumb-item active">Edit Request</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="theme-form mega-form" action="{{ route('update.request', $item->id) }}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">User</label>
                                        <select class="form-select digits" name="user_id" id="exampleFormControlSelect9">
                                            <option value="">------</option>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id }}" {{ $user->id == $item->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
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
                                                <option value="{{$flat->id }}" {{ $flat->id == $item->flat_id ? 'selected' : '' }}>{{ $flat->name }}</option>
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
                                            <option value="{{$service->id }}" {{ $service->id == $item->service_id ? 'selected' : '' }}>{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label">Date</label>
                                        <input class="form-control" type="date" name="date" value="{{$item->date}}" placeholder="Enter Start Date" />
                                        @error('date')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect9">Status</label>
                                        <select class="form-select digits" name="status" id="exampleFormControlSelect9">
                                            <option value="">-- choose status ----</option>
                                            <option value="active" @if ($item->status == 'active') selected @endif>Active</option>
                                            <option value="inactive" @if ($item->stuts == 'inactive') selected @endif>InActive</option>
                                        </select>
                                        @error('status')
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
