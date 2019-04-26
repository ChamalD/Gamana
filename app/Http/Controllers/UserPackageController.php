<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Packages;
use App\Categories;
use App\SelectedPackage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserPackageController extends Controller
{
    public function index()
    {
        //
    $packageGetter = DB::table('selected_packages')
                    ->join('packages', 'packages.id', '=', 'selected_packages.package_id')
			        ->where('user_id', Auth::user()->id) 
			        ->get();
    
    

    return view('user_packages.index', ['searchResult' => $packageGetter]);
    }

    public function removeElement(Request $request)
    {
    	DB::delete('delete from selected_packages where select_id = ?',[$request->input('package_id')]);
                // Delete selected Packages.
		$packageGetter = DB::table('selected_packages')
                    ->join('packages', 'packages.id', '=', 'selected_packages.package_id')
			        ->where('user_id', Auth::user()->id) 
			        ->get();
 
	    return redirect()->route('user_packages.index', ['searchResult' => $packageGetter])       
            ->with('success', 'Removed Package Successfully');  
    }

}
