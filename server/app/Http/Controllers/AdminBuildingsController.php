<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\building;

class AdminBuildingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allBuildingsSite(){
        $buildings = building::all();
        return view("adminBuildingCtrl.viewAll")->with("buildings", $buildings);
    }

    public function addBuildingSite(){
        return view("adminBuildingCtrl.add");
    }

    public function addBuilding(request $request){
        $request->validate([
            'building_name' => 'required',
            'building_address' => 'required',
            'building_postal_code' => 'required',
            'file' => 'required'
        ]);
        $building = new building;
        $building->name = $request->building_name;
        $building->address = $request->building_address;
        $building->postal_code = $request->building_postal_code;

        // Add Cover Image
        $fileNameToStore = 'building_'.time().'_'.$request->file('file')->getClientOriginalName();
        // Upload File
        $path = $request->file('file')->storeAs('public/file', $fileNameToStore);
        $building->image =  $fileNameToStore;
        $building->save();
        return redirect('admin/building');
    }
}
