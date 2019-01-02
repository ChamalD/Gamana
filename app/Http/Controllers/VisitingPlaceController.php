<?php

namespace App\Http\Controllers;

use App\VisitingPlace;
use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;


class VisitingPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $place="Sri Lanka";
        return view('visiting_place.index',['place'=>$place]);              //return to the index page
    }

    /**
     * Show the form for creating a new resource.
     *SS
     * @return \Illuminate\Http\Response
     */

    public function check($place_name,$index_id, $name){
       $place=VisitingPlace::where('index_id', $index_id)->first();                 //fetch the relavent data from table
        if ($place === null){
            $this->store($index_id, $name);                                         //check whether its exist and if not store in the table
        }
        $locPlace=VisitingPlace::where('index_id', $index_id)->first();

        return view('visiting_place.check', ['name' => $name, "place_name"=>$place_name, 'place'=>$locPlace]);  //return to check view
    }


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
    public function store($index_id, $name)
    {
        VisitingPlace::create([                                 //create new visiting place in the table
            'index_id' => $index_id,
            'location' => $name
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VisitingPlace  $visitingPlace
     * @return \Illuminate\Http\Response
     */
    public function show(VisitingPlace $visitingPlace)
    {
        //$place=VisitingPlace::Find($visitingPlace->index_id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VisitingPlace  $visitingPlace
     * @return \Illuminate\Http\Response
     */
    public function edit(VisitingPlace $visitingPlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VisitingPlace  $visitingPlace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisitingPlace $visitingPlace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VisitingPlace  $visitingPlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitingPlace $visitingPlace)
    {
        //
    }
}
