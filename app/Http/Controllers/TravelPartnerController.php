<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\SelectedPackage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TravelPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataGetter = DB::table('selected_packages')
            ->where('user_id', Auth::user()->id) 
            ->get();

        $travelPartner = [];
        $travelPartnerId= [];    
        foreach ($dataGetter as $keyElement) {
            $selectPackagePartners = DB::table('selected_packages')
                ->join('packages', 'packages.id', '=', 'selected_packages.package_id')
                ->join('users', 'users.id', '=', 'selected_packages.user_id')
                ->where('package_id', $keyElement->package_id) 
                ->get();

            foreach ($selectPackagePartners as $elementPartner) {
                if ($elementPartner->user_id !== Auth::user()->id && (!(in_array($elementPartner->user_id, $travelPartnerId))) ) {
                    array_push($travelPartnerId, $elementPartner->user_id);
                    if (!(in_array($elementPartner, $travelPartner))){
                        array_push($travelPartner, $elementPartner);
                    }
                }
            }
            
        }
        $userPackages = DB::table('selected_packages')
                ->where('user_id', Auth::user()->id)
                ->join('packages', 'packages.id', '=', 'selected_packages.package_id')
                ->get();
       

        return view('travel_partner.index', ['searchDetails' => json_encode($travelPartner), 'packages' => $userPackages ]);
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
