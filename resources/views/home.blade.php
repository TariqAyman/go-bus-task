@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('flush-message')

                        {!! Form::open(['route' => 'search', 'id' => 'search-form' , 'class' => 'container']) !!}
                        <div class="row mb-4">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="from_area_id">Select From</label>
                                    {{ Form::select('from_area_id', $areas, request()->get('from_area_id'), [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select...', 'required']) }}
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="to_area_id">Select To</label>
                                    {{ Form::select('to_area_id', $areas, request()->get('to_area_id'), [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select...', 'required']) }}
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group mt-4">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}

                        <div class="list-group">
                            @foreach($trips as $trip)
                                <a href="{{ route('reservation.trip', $trip->id) }}" class="list-group-item list-group-item-action flex-column align-items-start mb-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Trip Name : {{ $trip->name }}</h5>
                                        <small>{{ $trip->availableSeatsCount() }} available seats</small>
                                    </div>
                                    <p class="mb-1">From : {{ $trip->fromArea->full_name }}</p>
                                    <p class="mb-1">To : {{ $trip->toArea->full_name }}</p>
                                    <small>Status : {{ $trip->status }}</small>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {!! $trips->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
