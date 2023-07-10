<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\Models\Booking_hotel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class BookingHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Booking = booking_hotel::all();
        return view('Booking.Booking',compact('Booking'));

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
   
        $booking = new booking_hotel();
        $booking->username = $request->input('username');
        $booking->email = $request->input('email');
        $booking->phone = $request->input('phone');
        $booking->roomNumber = $request->input('roomNumber');
        $booking->pricePerNight = $request->input('pricePerNight');
        $booking->stayDuration = $request->input('stayDuration');
        $booking->num_Booking = $request->input('num_Booking');
        $booking->allpr = $request->input('allpr');
        $booking->save();
        
        $user = User::get();
        $booking_hotel = booking_hotel::latest()->first();
        Notification::send($user, new \App\Notifications\Add_Booking_new($booking_hotel));
        return response()->json(['message' => 'تم إضافة الحجز بنجاح'], 201);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking_hotel  $booking_hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Booking_hotel $booking_hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking_hotel  $booking_hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking_hotel $booking_hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking_hotel  $booking_hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking_hotel $booking_hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking_hotel  $booking_hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking_hotel $booking_hotel)
    {
        //
    }
}
