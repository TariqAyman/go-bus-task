<?php

namespace App\Http\Controllers;

use App\Repositories\ReservationRepository;
use App\Repositories\TripRepository;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * @var ReservationRepository
     */
    private ReservationRepository $reservationRepository;

    /**
     * @var TripRepository
     */
    private TripRepository $tripRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReservationRepository $reservationRepository, TripRepository $tripRepository)
    {
        $this->middleware('auth');
        $this->reservationRepository = $reservationRepository;
        $this->tripRepository = $tripRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $reservations = $this->reservationRepository->getUserReservation();

        return view('reservation.list-reservation')->with([
            'reservations' => $reservations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request, $tripId)
    {
        $trip = $this->tripRepository->getById($tripId);

        if (!$trip) {
            return redirect()->route('home')->withError('Trip not found');
        }

        $paymentMethods = [
            'cash' => 'cash',
            'visa' => 'visa',
        ];

        return view('reservation.create-reservation')->with([
            'trip' => $trip,
            'paymentMethods' => $paymentMethods,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "trip_id" => "required|exists:trips,id",
            "username" => "required",
            "phone_number" => "required",
            "payment_method" => "required|in:visa,cash",
            "seat_number" => "required",
        ]);

        if ($this->reservationRepository->checkSeat($request->get('seat_number'), $request->get('trip_id'))) {
            return redirect()->route('reservation.trip', $request->get('trip_id'))->withError('Can\'t reservation for this seat');
        }

        $this->reservationRepository->create($request->all());

        return redirect()->route('reservation.index')->withSuccess('Success Create Reservation');
    }
}
