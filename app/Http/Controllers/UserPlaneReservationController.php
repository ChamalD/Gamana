<?php

namespace App\Http\Controllers;

use App\UserPlaneReservation;
use Illuminate\Http\Request;
use App\Card;
use Carbon\Carbon;
class UserPlaneReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    public function review(Request $request)
    {
        return view('plane_schedules.review',['data'=> $request]);     //view the plane view
    }

    public function checker(Request $request)
    {
        $data = Card::WHERE('number', $request->input('code'))->get();          //get the number of the card

        if ($data){
            $today = Carbon::today();
            return redirect()->route('plane_schedule.index', ['today'=>$today])     //return to the next view with data
                ->with('success' , 'Project created successfully');
        }
    }

    /*
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserPlaneReservation  $userPlaneReservation
     * @return \Illuminate\Http\Response
     */
    public function show(UserPlaneReservation $userPlaneReservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserPlaneReservation  $userPlaneReservation
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPlaneReservation $userPlaneReservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserPlaneReservation  $userPlaneReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPlaneReservation $userPlaneReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserPlaneReservation  $userPlaneReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPlaneReservation $userPlaneReservation)
    {
        //
    }
}
