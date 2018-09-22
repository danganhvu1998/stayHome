<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\goods;
use App\singleRequire;
use App\assignRequireUser;

class RequireTakerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function requireTakerViewingSite(){
        if(!isset(Auth::user()->building_id)){
            return redirect("/user/setting");
        }
        $requesters = User::where("building_id", Auth::user()->building_id)->get();
        
        // All Free Request
        $usersRequests = array();
        foreach ($requesters as $requester) {
            $userSingleRequires = $this->singleUserRequireTaker($requester->id);
            if(count($userSingleRequires)>0){
                $usersRequests[$requester->id] = $userSingleRequires;
            }
        }

        // All Taken Request
        $usersTakenRequests = array();
        foreach ($requesters as $requester) {
            $userSingleTakenRequires = $this->singleUserRequireTakenTaker($requester->id);
            if(count($userSingleTakenRequires)>0){
                $usersTakenRequests[$requester->id] = $userSingleTakenRequires;
            }
        }

        $data = array(
            "requesters" => $requesters,
            "usersRequests" => $usersRequests,
            "usersTakenRequests" => $usersTakenRequests
        );
        #return $data;
        return view("requireTakerCtrl.view")->with($data);
    }

    public function requireTakerAdding($requesterID){
        singleRequire::where("userID", $requesterID)
            ->where("status", 1)
            ->update([
                "status" => 2,
                "takerID" => Auth::user()->id
            ]);
        return redirect("/require/all");
    }

    public function requireTakerDeleting($requesterID){
        singleRequire::where("userID", $requesterID)
            ->where("status", 2)
            ->where("takerID", Auth::user()->id)
            ->update([
                "status" => 1,
            ]);
        return redirect("/require/all");
    }

    public function requireTakerConfirmFinish(){
        singleRequire::where("takerID", Auth::user()->id)
            ->where("status", 2)
            ->update([
                "status" => 3
            ]);
        return redirect("/require/all");
    }

    public function singleUserRequireTaker($userID){
        return singleRequire::where("userID", $userID)
            ->where("status", 1)
            ->join("goods", "single_requires.goodsID", "=", "goods.id")
            ->select("goods.*", "single_requires.*")
            ->get();
    }

    public function singleUserRequireTakenTaker($userID){
        return singleRequire::where("userID", $userID)
            ->where("status", 2)
            ->where("takerID", Auth::user()->id)
            ->join("goods", "single_requires.goodsID", "=", "goods.id")
            ->select("goods.*", "single_requires.*")
            ->get();
    }
}
