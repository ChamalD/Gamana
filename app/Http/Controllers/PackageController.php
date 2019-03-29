<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Packages;
use App\Categories;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('travel_packages.index');
    }

    public function search(Request $request) {

        $WildLife = $request->input('WildLife');
        $HistoricalPlaces = $request->input('HistoricalPlaces');
        $ReligiousPlaces = $request->input('ReligiousPlaces');
        $Cultural = $request->input('Cultural');
        $City = $request->input('City');

        $Adventure = $request->input('Adventure');
        $Scenery = $request->input('Scenery');
        $Beach = $request->input('Beach');

        $displayResult= [];
        $searchResult = DB::table('packages')
            ->join('category', 'packages.id', '=', 'category.package_id')  
            ->orderBy('package_id')      
            ->get();
        
        $displayResultWildLife = $searchResult->where('category', $WildLife);
        $displayResultHistoricalPlaces = $searchResult->where('category', $HistoricalPlaces);
        $displayResultReligiousPlaces = $searchResult->where('category', $ReligiousPlaces);
        $displayResultCultural = $searchResult->where('category', $Cultural);

        $displayResultCity = $searchResult->where('category', $City);
        $displayResultAdventure = $searchResult->where('category', $Adventure);
        $displayResultScenery = $searchResult->where('category', $Scenery);
        $displayResultBeach = $searchResult->where('category', $Beach);

        if ($WildLife){
           array_push($displayResult, $displayResultWildLife);
        } else {
            array_push($displayResult, null);
        }

        if ($HistoricalPlaces){
           array_push($displayResult, $displayResultHistoricalPlaces);
        } else {
            array_push($displayResult, null);
        }

        if ($ReligiousPlaces){
           array_push($displayResult, $displayResultReligiousPlaces);
        } else {
            array_push($displayResult, null);
        }

        if ($Cultural){
           array_push($displayResult, $displayResultCultural);
        } else {
            array_push($displayResult, null);
        }

        if ($City){
           array_push($displayResult, $displayResultCity);
        } else {
            array_push($displayResult, null);
        }
        if ($Adventure){
           array_push($displayResult, $displayResultAdventure);
        } else {
            array_push($displayResult, null);
        }
        if ($Scenery){
           array_push($displayResult, $displayResultScenery);
        } else {
            array_push($displayResult, null);
        }
        if ($Beach){
           array_push($displayResult, $displayResultBeach);
        } else {
            array_push($displayResult, null);
        }
      
        return view('travel_packages.show', ['searchResult' => $displayResult, 'searchDetails' => $request]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
