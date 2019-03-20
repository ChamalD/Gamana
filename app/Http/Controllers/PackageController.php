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
        $Citylife = $request->input('Citylife');
        
        $displayResult = [];

        $searchResult = DB::table('packages')
            ->join('category', 'packages.id', '=', 'category.package_id')  
            ->orderBy('package_id')      
            ->get();
        
        if ($HistoricalPlaces){
            array_push($displayResult, $searchResult->where('category', $HistoricalPlaces));
        } 
        if ($ReligiousPlaces) {
            array_push($displayResult, $searchResult->where('category', $ReligiousPlaces));
        }




        $displayResult = json_encode($displayResult);
        return view('travel_packages.index', ['searchResult' => $displayResult, 'searchDetails' => $request]);
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
