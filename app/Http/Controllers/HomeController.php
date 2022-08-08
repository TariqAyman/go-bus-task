<?php

namespace App\Http\Controllers;

use App\Repositories\AreaRepository;
use App\Repositories\TripRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var TripRepository
     */
    private TripRepository $tripRepository;
    private AreaRepository $areaRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TripRepository $tripRepository, AreaRepository $areaRepository)
    {
        $this->middleware('auth');
        $this->tripRepository = $tripRepository;
        $this->areaRepository = $areaRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->has('from_area_id') && $request->has('to_area_id')) {
            $from_area_id = $request->get('from_area_id');
            $to_area_id = $request->get('to_area_id');

            if ($from_area_id != null && $to_area_id != null && $from_area_id == $to_area_id) {
                return redirect()
                    ->back()
                    ->withInput($request->all())
                    ->withError('Can\'t Select From Area and To Area same value !');
            }
        }

        $trips = $this->tripRepository->getActiveTrip(10, $request->all());
        $areas = $this->areaRepository->getPluck('full_name');

        return view('home')->with([
            'areas' => $areas,
            'trips' => $trips
        ]);
    }
}
