<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\goods;
use App\market;
use App\singleRequire;

class userRequiresController extends Controller
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

    public function pointInfoTaker(){
        if(Auth::user()->point == null){
            User::where("id", Auth::user()->id)
                ->update(["point" => 3]);
        }
    }

    public function userRequireConfirmSite(){
        $this->pointInfoTaker();
        $userRequires = singleRequire::where("userID", Auth::user()->id)
            ->where("status", 0)
            ->join("goods", "single_requires.goodsID", "=", "goods.id")
            ->select("goods.*", "single_requires.*")
            ->get();

        $confirmedUserRequires = singleRequire::where("userID", Auth::user()->id)
            ->where("status", 1)
            ->join("goods", "single_requires.goodsID", "=", "goods.id")
            ->select("goods.*", "single_requires.*")
            ->get();
        $data = array(
            "userRequires" => $userRequires,
            "confirmedUserRequires" => $confirmedUserRequires
        );
        #return $data;
        return view("userRequiresCtrl.confirm")->with($data);
    }

    public function requireDelete($singleRequireID){
        $singleRequire = singleRequire::where("id", $singleRequireID)->first();
        if($singleRequire->status>1) {
            return back()->withError('Order already being taken. Cannot remove!');
        } else if($singleRequire->userID != Auth::user()->id){
            return back()->withError('No Permission!');
        }
        singleRequire::where("id", $singleRequireID)->delete();
        return redirect("/user_require/confirm");
    }
    
    public function requireConfirm($singleRequireID){
        $singleRequire = singleRequire::where("id", $singleRequireID)->first();
        if($singleRequire->status>0) {
            return back()->withError('Cannot do it!');
        } else if($singleRequire->userID != Auth::user()->id){
            return back()->withError('No Permission!');
        }
        singleRequire::where("id", $singleRequireID)
            ->update(["status" => 1]);
        return redirect("/user_require/confirm");
    }

    public function requiresConfirmAll(){
        singleRequire::where("userID", Auth::user()->id)
            ->where("status", 0)
            ->update([
                "status" => 1
            ]);
        return redirect("/user_require/confirm");
    }

}
