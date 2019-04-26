<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class HotelBookingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hotel_booking.index');             //return the index page
    }
    public function results(Request $request)
    {
        $hotels = Hotel::where('city', $request->input('location'))->get();     //sql query to fetch the data from hotel table

        return view('hotel_booking.results', ['hotels' => $hotels], ['search_detail' => $request]); //return view with data
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function review(Request $request)
    {
        return view('hotel_booking.review',['data'=>$request]);    //return view with requested data
    }

    public function view(Request $request)
    {

        $room_details = DB::table('hotels')                                             //sql query to fetch the data from hotel table
            ->join('rooms', 'hotels.id', '=', 'rooms.hotel_id')
            ->where('hotels.id', $request->input('hotel_id'))
            ->get();

        return view('hotel_booking.view', ['room_details' => $room_details], ['resultHotels' => $request]);
    }

    public function checker(Request $request)
    {
        $exists = DB::table('cards')->where('card_number',$request->input('cardNumber'))->first();  //sql query to fetch the data from card table


        return redirect()->route('hotel_booking.index')         //display and redirect after the process happen
            ->with('success' , 'Payment Done Successfully');
    }

    public function search(Request $request)
    {

        $hotels = Hotel::where('city', $request->input('location'))->get();         //sql query to fetch the data from hotel table

        return view('hotel_booking.show', ['hotels' => $hotels], ['search_detail' => $request]);       //view the results of the hotel search

    }

    public function create()
    {
        return view('hotel_booking.create');        //return the create page
    }

    public function addRoom(Request $request)
    {
        $id= $request->input('hotel_id');
        $photo_room = "";
       if($request->hasFile('photo')){                  //create a photo destination path and store it
           $destinationPath="images/hotel";
           $file=$request->photo;
           $extension=$file->getClientOriginalExtension();
           $fileName=rand(10000,99999).".".$extension;
           $file->move($destinationPath,$fileName);
           $photo_room =$fileName;
        }

        $room1 = Room::create([                                      //add data to the Room table
            'hotel_id' => $id,
            'room_img' => $photo_room,
            'room_name' => $request->input('name1'),
            'room_type' => $request->input('type1'),
            'no_rooms_available' => $request->input('rooms1'),
            'capacity' =>$request->input('capacity1'),
            'price' => $request->input('amount1')
        ]);
        
        if ($room1){
            return view('hotel_booking.addRoom',['hotelID'=>$id])
                ->with('success' , 'Room Added Successfully');             //check the validate and return to next view

        }
        return back()->withInput()->with('errors', 'Error Creating Adding Rooms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = "";
        if($request->hasFile('photo')){                         //create a photo destination path and store it
            $destinationPath="images/hotel";
            $file=$request->photo;
            $extension=$file->getClientOriginalExtension();
            $fileName=rand(1111,9999).".".$extension;
            $file->move($destinationPath,$fileName);
            $photo =$fileName;
        }

      $hotel = Hotel::create([                                      //add data to the Hotel table
          'name' => $request->input('hotel_name'),
          'img' => $photo,
          'country' => $request->input('country'),
          'address' =>$request->input('address'),
          'city' => $request->input('city'),
          'room_price' => $request->input('hotel_price')
      ]);
        //$hotel_search=Hotel::where('name', $request->input('hotel_name'))->first();
        $hotelID=$hotel->id;
       if($hotel){
           return view('hotel_booking.addRoom',['hotelID'=>$hotelID]);              //return to the addRoom view
        }
        return back()->withInput()->with('errors', 'Error Creating Adding Hotels');
    }

    public function allHotel()
    {
        $hotels =  Hotel::all();                                                //get all the hotels in the database

        return view('hotel_booking.allHotel',['hotels' => $hotels]);

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

        return view('hotel_booking.show',['hotel'=>$hotel],['room'=>$room]);

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
