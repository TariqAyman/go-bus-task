@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Reservation') }}</div>

                    <div class="card-body">
                        @include('flush-message')

                        <div class="list-group">
                            @foreach($reservations as $reservation)
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start mb-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Trip Name : {{ $reservation->trip->name }}</h5>
                                        <small>Booked at {{ $reservation->created_at }}</small>
                                    </div>
                                    <p class="mb-1">From : {{ $reservation->trip->fromArea->full_name }}</p>
                                    <p class="mb-1">To : {{ $reservation->trip->toArea->full_name }}</p>
                                    <p class="mb-1">Seat Number : {{ $reservation->seat_number }}</p>
                                    <small>Status : {{ $reservation->trip->status }}</small>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {!! $reservations->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
