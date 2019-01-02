<?php
namespace App\Http\Controllers;

use App\Hotel;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class SearchHotelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hotel_search.index');             //return the index page
    }
    public function results(Request $request)
    {
        $hotels = Hotel::where('city', $request->input('location'))->get();     //sql query to fetch the data from hotel table

        return view('hotel_search.results', ['hotels' => $hotels], ['search_detail' => $request]); //return view with data
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    

    public function view(Request $request)
    {

        $room_details = DB::table('hotels')                                             //sql query to fetch the data from hotel table
            ->join('rooms', 'hotels.id', '=', 'rooms.hotel_id')
            ->where('hotels.id', $request->input('hotel_id'))
            ->get();

        return view('hotel_saerch.view', ['room_details' => $room_details], ['resultHotels' => $request]);
    }

   

    public function search(Request $request)
    {

        $hotels = Hotel::where('city', $request->input('location'))->get();         //sql query to fetch the data from hotel table

        return view('hotel_search.show', ['hotels' => $hotels], ['search_detail' => $request]);       //view the results of the hotel search

    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        $hotel=Hotel::Find($hotel);
        $room=Room::Find($hotel);                                           //get all the hotels and rooms in the database

        return view('hotel_search.show',['hotel'=>$hotel],['room'=>$room]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
    }
}
