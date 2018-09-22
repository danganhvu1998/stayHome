<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $this->middleware(['auth', 'checkAdmin']);
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
            'file' => 'required|image'
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

    public function editBuildingSite($buildingID){
        $building = building::where("id", $buildingID)->first();
        return view("adminBuildingCtrl.edit")->with("building", $building);
    }

    public function editBuilding(request $request){
        $request->validate([
            'building_name' => 'required',
            'building_address' => 'required',
            'building_postal_code' => 'required',
            'file' => 'image'
        ]);

        building::where("id", $request->buildingID)
            ->update([
                "name" => $request->building_name,
                "address" => $request->building_address,
                "postal_code" => $request->building_postal_code
            ]);
        if($request->hasFile('file')){
            //DELETE EXISTED FILE
            $deleteImage = building::where("id", $request->buildingID)->first()->image;
            Storage::delete('public/file/'.$deleteImage);

            //ADD NEW FILE
            $fileNameToStore = 'building_'.time().'_'.$request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('public/file', $fileNameToStore);
            building::where("id", $request->buildingID)
                ->update(["image" => $fileNameToStore]);
        }
        return redirect('admin/building');
    }

    public function deleteBuilding($buildingID){
        building::where("id", $buildingID)->delete();
        return redirect('admin/building');
    }
}
