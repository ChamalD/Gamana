<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Packages;
use App\Categories;
use App\SelectedPackage;
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
        $selectDates = $request->input('selectedDates');
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
            ->where('package_days', $selectDates) 
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
        $selectedPackages=[];
        $selectedPackageIds=[];
        foreach ($displayResult as $keyElement) {
            if ($keyElement !== null){
                foreach ($keyElement as $packages) {
                    if (!(in_array($packages->package_id, $selectedPackageIds))){
                        array_push($selectedPackages, $packages);
                        array_push($selectedPackageIds, $packages->package_id);
                    }
                }
            }
        }
        return view('travel_packages.show', ['searchResult' => json_encode($selectedPackages) , 'searchDetails' => $request ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('travel_packages.details');

    }
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function addPackage(Request $request)
    {
        //
    }

    public function detail()
    {
        return view('travel_packages.details');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package_id = $request->input('package_id');
        $searchResult = $request->input('searchResult');

        $dataGetter = DB::table('selected_packages')
            ->where('user_id', Auth::user()->id) 
            ->where('package_id', $package_id) 
            ->get();
        
        if(sizeof($dataGetter) === 0){
            $selectPackage = SelectedPackage::create([                                //store comment data in the comment table
                'user_id' => Auth::user()->id,
                'package_id' => $request->input('package_id')
            ]);
            if($selectPackage){
                 return view('travel_packages.show', ['searchResult' => $searchResult, 'searchDetails' => $request]);  
                
            }
        }
        return view('travel_packages.show', ['searchResult' => $searchResult, 'searchDetails' => $request]);

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
