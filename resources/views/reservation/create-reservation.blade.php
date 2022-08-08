@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reservation') }}</div>

                    <div class="card-body">
                        @include('flush-message')

                        {!! Form::open(['route' => 'reservation.store', 'id' => 'create-form' , 'class' => 'container']) !!}

                        {!! Form::hidden('trip_id', $trip->id) !!}

                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    {{ Form::text('username', old('username'), ['class' => 'form-control','required' , 'placeholder' => 'Enter name']) }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Phone Number</label>
                                    {{ Form::text('phone_number', old('phone_number'), ['class' => 'form-control','required' , 'placeholder' => 'Enter Phone Number']) }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Payment Method</label>
                                    {{ Form::select('payment_method', $paymentMethods, request()->get('payment_method'), [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select...', 'required']) }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Seat Number</label>
                                    {{ Form::select('seat_number', $trip->availableSeats(), request()->get('seat_number'), [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select...', 'required']) }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
