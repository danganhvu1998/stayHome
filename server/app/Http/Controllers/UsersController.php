<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\User;
use App\building;

class UsersController extends Controller
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

    public function userViewingSite(){
        $userID = Auth::user()->id;
        $user = User::where("users.id", $userID)
            ->join('buildings', 'users.building_id', '=', 'buildings.id')
            ->select("users.*", 'buildings.name as building_name', 'buildings.address', 'buildings.postal_code')
            ->first();
        if($user==null){
            return redirect("/user/setting");
        }
        return view("userCtrl.view")->with("user", $user);
    }

    public function userSettingSite(){
        $userID = Auth::user()->id;
        $user = User::where("id", $userID)->first();
        $buildings = building::all();
        $data = array("user" => $user, "buildings" => $buildings);
        #return $user;
        return view("userCtrl.setting")->with($data);
    }

    public function userSettingNameChange(request $request){
        $request->validate([
            'user_name' => 'required|min:3',
        ]);
        $userID = Auth::user()->id;
        User::where("id", $userID)
            ->update([
                "name" => $request->user_name
            ]);
        return redirect('/user/view');
    }

    public function userSettingPasswordChange(request $request){
        $request->validate([
            'user_password' => 'required|min:6',
        ]);
        $userID = Auth::user()->id;
        User::where("id", $userID)
            ->update([
                "password" => Hash::make($request->user_password)
            ]);
        return redirect('/user/view');
    }

    public function userSettingImageChange(request $request){
        $request->validate([
            'file' => 'required|image',
        ]);
        $userID = Auth::user()->id;
        //Delete Cover Image
        $file = user::where('id', $userID)->first();
        Storage::delete('public/file/'.$file->image);

        // Add Cover Image
        $this->validate($request, [
            'file' => 'max:1999'
        ]);

        if($request->hasFile('file')){
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            if($extension!="jpg" && $extension!="png" && $extension!="gif") return redirect('/user/setting');
            // Filename to store
            $fileNameToStore = 'cover_'.time().'_'.$request->file('file')->getClientOriginalName();
            // Upload File
            $path = $request->file('file')->storeAs('public/file', $fileNameToStore);

            $user = User::where("id", $userID)
                ->update(["image" => $fileNameToStore]);
            return redirect('/user/view');
        } else {
            return redirect('/user/setting');
        }
    }

    public function userSettingAddressChange(request $request){
        $request->validate([
            'room_number' => 'required|max:10|min:1',
            'buildingID' => 'required'
        ]);
        $userID = Auth::user()->id;
        User::where("id", $userID)
            ->update([
                "room_number" => $request->room_number,
                "building_id" => $request->buildingID
            ]);
        return redirect('/user/view');
    }
}
