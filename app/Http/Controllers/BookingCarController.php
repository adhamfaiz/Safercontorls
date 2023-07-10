<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking_car;
use Illuminate\Http\Request;

class BookingCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Booking = Booking_car::all();
        return view('Booking.Bookingcar',compact('Booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = new Booking_car();
        $booking->name_car = $request->input('name_car');
        $booking->user_name = $request->input('user_name');
        $booking->email = $request->input('email');
        $booking->name_comp = $request->input('name_comp');
        $booking->model = $request->input('model');
        $booking->price = $request->input('price');
        $booking->stayDuration = $request->input('stayDuration');
        $booking->num_Booking = $request->input('num_Booking');
        $booking->allpr = $request->input('allpr');
        $booking->save();
        $user = User::get();
        $Booking_car = Booking_car::latest()->first();
        Notification::send($user, new \App\Notifications\Add_Booking($Booking_car));
        return response()->json(['message' => 'تم إضافة الحجز بنجاح'], 201);
    }
 
    

 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking_car  $booking_car
     * @return \Illuminate\Http\Response
     */
    public function show(Booking_car $booking_car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking_car  $booking_car
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking_car $booking_car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking_car  $booking_car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking_car $booking_car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking_car  $booking_car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking_car $booking_car)
    {
        //
    }
}
